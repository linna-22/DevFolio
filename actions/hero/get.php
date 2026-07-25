<?php

require_once "../../config/db.php";

header("Content-Type: application/json");

$id = $_GET['id'] ?? '';

if (empty($id)) {
    echo json_encode([
        "status" => "error",
        "message" => "User ID is required."
    ]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM heroes WHERE id = ?");
$stmt->execute([$id]);

$user = $stmt->get_result()->fetch_assoc();

if ($user) {
    echo json_encode([
        "status" => "success",
        "data" => $user
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Hero not found."
    ]);
}