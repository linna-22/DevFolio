<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id = trim($_POST['id'] ?? '');

if (empty($id)) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid user."
    ]);
    exit;
}

// Prevent deleting yourself
if ($_SESSION['user']['id'] == $id) {
    echo json_encode([
        "status" => "error",
        "message" => "You cannot delete your own account."
    ]);
    exit;
}

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$success = $stmt->execute([$id]);

if ($success) {

    echo json_encode([
        "status" => "success",
        "message" => "User deleted successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to delete user."
    ]);

}