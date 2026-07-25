<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";
require_once "../../config/app.php";

$userId = $_SESSION['user']['id'];

$stmt = $conn->prepare("
    SELECT *
    FROM projects
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

        $uploadPath = "/DevFolio/public/uploads/projects/";

        $image = !empty($row['image'])
            ? $uploadPath . $row['image']
            : "/DevFolio/assets/images/no-image.png";
        $output .= '
            <tr class="border-b border-gray-100 hover:bg-gray-50">

                <td class="px-6 py-4">' . $no++ . '</td>

                <td class="px-6 py-4 font-medium">
                    ' . $row['title'] . '
                </td>

                <td class="px-6 py-4 max-w-xs">
                    ' . mb_strimwidth($row['desc'], 0, 60, "...", "UTF-8") . '
                </td>

                <td class="px-6 py-4">
                    <img
                        src="' . $image . '"
                        alt="Project Image"
                        class="w-20 h-14 object-cover rounded-lg border border-gray-200"
                    >
                </td>

                <td class="px-6 py-4">
                    <a href="' . $row['url'] . '"
                        target="_blank"
                        class="text-indigo-600 hover:underline">
                        Visit
                    </a>
                </td>

                <td class="px-6 py-4">
                    ' . (
    $row['target'] == '_blank'
        ? '<span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                New Tab
           </span>'
        : '<span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
                Same Tab
           </span>'
) . '
                </td>

                <td class="px-6 py-4">
                    <div class="flex gap-2">

                        <button
                            class="editBtn bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded"
                            data-id="' . $row['id'] . '">
                            <i class="fas fa-edit"></i>
                        </button>

                        <button
                            class="deleteBtn bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                            data-id="' . $row['id'] . '">
                            <i class="fas fa-trash"></i>
                        </button>

                    </div>
                </td>

            </tr>
        ';
    }

} else {

    $output = '
        <tr>
            <td colspan="7" class="text-center py-10 text-gray-400">
                No projects found.
            </td>
        </tr>
    ';
}

echo $output;