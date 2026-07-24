<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id = trim($_POST['id'] ?? '');

if (empty($id)) {

    echo json_encode([
        "status" => "error",
        "message" => "Education ID is required."
    ]);
    exit;

}

// Check if education exists
$stmt = $conn->prepare("
    SELECT id
    FROM educations
    WHERE id = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {

    echo json_encode([
        "status" => "error",
        "message" => "Education not found."
    ]);
    exit;

}

// Delete education
$stmt = $conn->prepare("
    DELETE FROM educations
    WHERE id = ?
");

$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    echo json_encode([
        "status" => "success",
        "message" => "Education deleted successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to delete education."
    ]);

}