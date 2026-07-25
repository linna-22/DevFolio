<?php

require_once "../../config/db.php";

header("Content-Type: application/json");

$id = $_GET['id'] ?? '';

if (empty($id)) {
    echo json_encode([
        "status" => "error",
        "message" => "About ID is required."
    ]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM abouts WHERE id = ?");
$stmt->execute([$id]);

$about = $stmt->get_result()->fetch_assoc();

if ($about) {
    echo json_encode([
        "status" => "success",
        "data" => $about
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "About not found."
    ]);
}