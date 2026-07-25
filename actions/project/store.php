<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$title  = trim($_POST['title'] ?? '');
$desc   = trim($_POST['desc'] ?? '');
$url    = trim($_POST['url'] ?? '');
$target = trim($_POST['target'] ?? '');
$created_by = $_SESSION['user']['id'];

if (
    empty($title) ||
    empty($desc) ||
    empty($url) ||
    empty($target)
) {
    echo json_encode([
        "status" => "error",
        "message" => "Please fill all required fields."
    ]);
    exit;
}

// Check image
if (!isset($_FILES['image']) || $_FILES['image']['error'] != 0) {

    echo json_encode([
        "status" => "error",
        "message" => "Please select an image."
    ]);

    exit;
}

$allowed = ['jpg', 'jpeg', 'png', 'webp'];

$extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

if (!in_array($extension, $allowed)) {

    echo json_encode([
        "status" => "error",
        "message" => "Only JPG, JPEG, PNG and WEBP images are allowed."
    ]);

    exit;
}

// Generate unique filename
$imageName = time() . "_" . uniqid() . "." . $extension;

$uploadDir = "../../public/uploads/projects/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$uploadPath = $uploadDir . $imageName;

if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to upload image."
    ]);

    exit;
}

$stmt = $conn->prepare("
    INSERT INTO projects
    (
        title,
        `desc`,
        image,
        url,
        target,
        created_by
    )
    VALUES
    (
        ?, ?, ?, ?, ?, ?
    )
");

$stmt->bind_param(
    "sssssi",
    $title,
    $desc,
    $imageName,
    $url,
    $target,
    $created_by
);

$stmt->execute();

echo json_encode([
    "status" => "success",
    "message" => "Project created successfully."
]);