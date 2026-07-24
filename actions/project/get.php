<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id = $_GET['id'] ?? '';

if (empty($id)) {
    echo json_encode([
        "status" => "error",
        "message" => "Project ID is required."
    ]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$project = $result->fetch_assoc();

if ($project) {

    echo json_encode([
        "status" => "success",
        "data" => $project
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Project not found."
    ]);

}