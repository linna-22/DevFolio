<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id = trim($_POST['id'] ?? '');

if (empty($id)) {

    echo json_encode([
        "status" => "error",
        "message" => "Social ID is required."
    ]);
    exit;

}

$stmt = $conn->prepare("
    SELECT id
    FROM socials
    WHERE id = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->get_result()->num_rows == 0) {

    echo json_encode([
        "status" => "error",
        "message" => "Social not found."
    ]);
    exit;

}

$stmt = $conn->prepare("
    DELETE FROM socials
    WHERE id = ?
");

$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    echo json_encode([
        "status" => "success",
        "message" => "Social deleted successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to delete social."
    ]);

}