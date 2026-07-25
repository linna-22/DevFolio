<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";


$userId = $_SESSION['user']['id'];

$stmt = $conn->prepare("
    SELECT *
    FROM heroes
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

        $output .= '
            <tr class="border-b border-gray-100 hover:bg-gray-50">
                <td class="px-6 py-4">'.$no++.'</td>
                <td class="px-6 py-4">'.$row['title'].'</td>
                <td class="px-6 py-4">' .
                (
                    mb_strlen($row['desc'], 'UTF-8') > 50
                        ? mb_substr($row['desc'], 0, 50, 'UTF-8') . '...'
                        : $row['desc']
                ) .
                '</td>
                <td class="px-6 py-4">
                    '.(
                        strtolower($row['freelance_status']) == 'yes'
                        ? '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                Yes
                        </span>'
                        : '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                No
                        </span>'
                    ).'
                </td>

                <td class="px-6 py-4">
                        <div class="flex gap-2">

                            <button
                                class="editBtn bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded"
                                data-id="'.$row['id'].'">
                                <i class="fas fa-edit"></i>
                            </button>


                        </div>
                    </td>
                </tr>
        ';
    }

}else{

    $output='
        <tr>
            <td colspan="7" class="text-center py-10 text-gray-400">
                No Heros Data.
            </td>
        </tr>
    ';
}

header("Content-Type: application/json");

echo json_encode([
    "status" => "success",
    "html" => $output,
    "total" => $result->num_rows
]);