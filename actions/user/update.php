<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id         = trim($_POST['id'] ?? '');
$full_name  = trim($_POST['full_name'] ?? '');
$gender     = trim($_POST['gender'] ?? '');
$email      = trim($_POST['email'] ?? '');
$password   = trim($_POST['password'] ?? '');
$job_title  = trim($_POST['job_title'] ?? '');
$address    = trim($_POST['address'] ?? '');
$role       = trim($_POST['role'] ?? 'user');

if (empty($id)) {
    echo json_encode([
        "status" => "error",
        "message" => "User ID is required."
    ]);
    exit;
}

// Check duplicate email (except current user)
$check = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
$check->execute([$email, $id]);

if ($check->get_result()->num_rows > 0) {
    echo json_encode([
        "status" => "error",
        "message" => "Email already exists."
    ]);
    exit;
}

if (!empty($password)) {

    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("
        UPDATE users
        SET
            fullname = ?,
            gender = ?,
            email = ?,
            password = ?,
            job_title = ?,
            address = ?,
            role = ?
        WHERE id = ?
    ");

    $success = $stmt->execute([
        $full_name,
        $gender,
        $email,
        $password,
        $job_title,
        $address,
        $role,
        $id
    ]);

} else {

    $stmt = $conn->prepare("
        UPDATE users
        SET
            fullname = ?,
            gender = ?,
            email = ?,
            job_title = ?,
            address = ?,
            role = ?
        WHERE id = ?
    ");

    $success = $stmt->execute([
        $full_name,
        $gender,
        $email,
        $job_title,
        $address,
        $role,
        $id
    ]);
}

if ($success) {

    echo json_encode([
        "status" => "success",
        "message" => "User updated successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to update user."
    ]);

}