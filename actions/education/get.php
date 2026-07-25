<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id = $_GET['id'] ?? '';

if (empty($id)) {
    echo json_encode([
        "status" => "error",
        "message" => "Education ID is required."
    ]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM educations WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$education = $result->fetch_assoc();

if ($education) {

    echo json_encode([
        "status" => "success",
        "data" => $education
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Education not found."
    ]);

}