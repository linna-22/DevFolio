<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$title = trim($_POST['title'] ?? '');
$desc = trim($_POST['desc'] ?? '');
$freelance_status = trim($_POST['freelance_status'] ?? '');

$created_by = $_SESSION['user']['id'];

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

// Optional: Prevent duplicate hero title
$stmt = $conn->prepare("SELECT id FROM heroes WHERE title = ?");
$stmt->execute([$title]);

if ($stmt->get_result()->num_rows > 0) {

    echo json_encode([
        "status" => "error",
        "message" => "Hero title already exists."
    ]);

    exit;
}

$stmt = $conn->prepare("
    INSERT INTO heroes
    (
        title,
        `desc`,
        freelance_status,
        created_by
    )
    VALUES
    (
        ?,
        ?,
        ?,
        ?
    )
");

$success = $stmt->execute([
    $title,
    $desc,
    $freelance_status,
    $created_by
]);

if ($success) {

    echo json_encode([
        "status" => "success",
        "message" => "Hero created successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to create hero."
    ]);

}