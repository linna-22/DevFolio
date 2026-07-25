<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id = $_GET['id'] ?? '';

if (empty($id)) {

    echo json_encode([
        "status" => "error",
        "message" => "Social ID is required."
    ]);
    exit;

}

$stmt = $conn->prepare("
    SELECT *
    FROM socials
    WHERE id = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$social = $result->fetch_assoc();

if ($social) {

    echo json_encode([
        "status" => "success",
        "data" => $social
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Social not found."
    ]);

}