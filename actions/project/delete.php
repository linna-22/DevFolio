<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id = trim($_POST['id'] ?? '');

if (empty($id)) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid project."
    ]);
    exit;
}

// Get project image first
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

// Delete database record
$stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    // Delete image file
    if (!empty($project['image'])) {

        $imagePath = "../../public/uploads/projects/" . $project['image'];

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    echo json_encode([
        "status" => "success",
        "message" => "Project deleted successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to delete project."
    ]);

}