<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

$userId = $_SESSION['user']['id'];

$stmt = $conn->prepare("
    SELECT *
    FROM socials
    WHERE created_by = ?
    ORDER BY id DESC
");

$stmt->bind_param("i", $userId);
$stmt->execute();

$result = $stmt->get_result();
$output = "";

if ($result->num_rows > 0) {

    $no = 1;

    while ($row = $result->fetch_assoc()) {

        $target = $row['target'] == "_blank"
            ? '<span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">New Tab</span>'
            : '<span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-700">Same Tab</span>';

        $output .= '
        <tr class="border-b border-gray-100 hover:bg-gray-50">

            <td class="px-6 py-4">'.$no++.'</td>

            <td class="px-6 py-4">'.$row['name'].'</td>

            <td class="px-6 py-4">
                <i class="'.$row['logo'].' text-xl"></i>
            </td>

            <td class="px-6 py-4">
                <a href="'.$row['url'].'"
                   target="_blank"
                   class="text-indigo-600 hover:underline">
                    Visit
                </a>
            </td>

            <td class="px-6 py-4">'.$target.'</td>

            <td class="px-6 py-4">

                <div class="flex justify-center gap-2">

                    <button
                        class="editBtn bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded"
                        data-id="'.$row['id'].'">

                        <i class="fas fa-edit"></i>

                    </button>

                    <button
                        class="deleteBtn bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                        data-id="'.$row['id'].'">

                        <i class="fas fa-trash"></i>

                    </button>

                </div>

            </td>

        </tr>';
    }

} else {

    $output = '
    <tr>
        <td colspan="6" class="text-center py-10 text-gray-400">
            No social records found.
        </td>
    </tr>';
}

echo $output;