<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id     = trim($_POST['project_id'] ?? '');
$title  = trim($_POST['title'] ?? '');
$desc   = trim($_POST['desc'] ?? '');
$url    = trim($_POST['url'] ?? '');
$target = trim($_POST['target'] ?? '');

if (
    empty($id) ||
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

// Get current project
$stmt = $conn->prepare("SELECT image FROM projects WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo json_encode([
        "status" => "error",
        "message" => "Project not found."
    ]);
    exit;
}

$project = $result->fetch_assoc();
$imageName = $project['image'];

$uploadDir = "../../public/uploads/projects/";

// Check if a new image is uploaded
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    if (!in_array($extension, $allowed)) {
        echo json_encode([
            "status" => "error",
            "message" => "Only JPG, JPEG, PNG and WEBP images are allowed."
        ]);
        exit;
    }

    // Generate new filename
    $newImageName = time() . "_" . uniqid() . "." . $extension;

    if (move_uploaded_file(
        $_FILES['image']['tmp_name'],
        $uploadDir . $newImageName
    )) {

        // Delete old image
        if (!empty($imageName) && file_exists($uploadDir . $imageName)) {
            unlink($uploadDir . $imageName);
        }

        $imageName = $newImageName;

    } else {

        echo json_encode([
            "status" => "error",
            "message" => "Failed to upload image."
        ]);
        exit;
    }
}

// Update project
$stmt = $conn->prepare("
    UPDATE projects SET
        title = ?,
        `desc` = ?,
        image = ?,
        url = ?,
        target = ?
    WHERE id = ?
");

$stmt->bind_param(
    "sssssi",
    $title,
    $desc,
    $imageName,
    $url,
    $target,
    $id
);

if ($stmt->execute()) {

    echo json_encode([
        "status" => "success",
        "message" => "Project updated successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to update project."
    ]);

}