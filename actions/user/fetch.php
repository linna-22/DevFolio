<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);

$output = "";

if ($result->num_rows > 0) {

    $no = 1;

    while ($row = $result->fetch_assoc()) {

        $output .= '
            <tr class="border-b border-gray-100 hover:bg-gray-50">
                <td class="px-6 py-4">'.$no++.'</td>
                <td class="px-6 py-4">'.$row['fullname'].'</td>
                <td class="px-6 py-4">'.$row['gender'].'</td>
                <td class="px-6 py-4">'.$row['email'].'</td>
                <td class="px-6 py-4">'.$row['job_title'].'</td>
                <td class="px-6 py-4">'.$row['address'].'</td>
                <td class="px-6 py-4">
                    '.(
                        strtolower($row['role']) == 'admin'
                        ? '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                Admin
                        </span>'
                        : '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                User
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

                            <button
                                class="deleteBtn bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                data-id="'.$row['id'].'">
                                Delete
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
                No users found.
            </td>
        </tr>
    ';
}

echo $output;