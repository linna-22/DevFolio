<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id = trim($_POST['id'] ?? '');
$title = trim($_POST['title'] ?? '');
$desc = trim($_POST['desc'] ?? '');
$freelance_status = trim($_POST['freelance_status'] ?? '');

if (empty($id)) {
    echo json_encode([
        "status" => "error",
        "message" => "Hero ID is required."
    ]);
    exit;
}

if (
    empty($title) ||
    empty($desc) ||
    empty($freelance_status)
) {
    echo json_encode([
        "status" => "error",
        "message" => "Please fill all required fields."
    ]);
    exit;
}

// Check duplicate title (except current hero)
$check = $conn->prepare("
    SELECT id
    FROM heroes
    WHERE title = ? AND id != ?
");

$check->execute([$title, $id]);

if ($check->get_result()->num_rows > 0) {

    echo json_encode([
        "status" => "error",
        "message" => "Hero title already exists."
    ]);

    exit;
}

$stmt = $conn->prepare("
    UPDATE heroes
    SET
        title = ?,
        `desc` = ?,
        freelance_status = ?
    WHERE id = ?
");

$success = $stmt->execute([
    $title,
    $desc,
    $freelance_status,
    $id
]);

if ($success) {

    echo json_encode([
        "status" => "success",
        "message" => "Hero updated successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to update hero."
    ]);

}