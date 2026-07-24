<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

$sql = "SELECT * FROM educations ORDER BY start_year DESC";
$result = $conn->query($sql);

$output = "";

if ($result->num_rows > 0) {

    $no = 1;

    while ($row = $result->fetch_assoc()) {

        // Duration

        $output .= '
            <tr class="border-b border-gray-100 hover:bg-gray-50">

                <td class="px-6 py-4">'.$no++.'</td>

                <td class="px-6 py-4 font-medium">
                    '.$row['school_name'].'
                </td>

                <td class="px-6 py-4">
                    '.$row['major'].'
                </td>

                <td class="px-6 py-4 max-w-xs">'.

                    (
                        mb_strlen($row['major_detail'], 'UTF-8') > 60
                        ? mb_substr($row['major_detail'], 0, 60, 'UTF-8').'...'
                        : $row['major_detail']
                    )

                .'</td>

                <td class="px-6 py-4">
                    '.$row['start_year'].'
                </td>

                <td class="px-6 py-4">
                    '.$row['end_year'].'
                </td>

                <td class="px-6 py-4">

                    <div class="flex gap-2">

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

            </tr>
        ';
    }

} else {

    $output = '
        <tr>
            <td colspan="7" class="text-center py-10 text-gray-400">
                No education records found.
            </td>
        </tr>
    ';
}

echo $output;