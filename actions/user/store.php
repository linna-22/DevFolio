<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header('Content-Type: application/json');

$full_name = trim($_POST['full_name']);
$gender = trim($_POST['gender']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$job_title = trim($_POST['job_title']);
$address = trim($_POST['address']);
$role = trim($_POST['role'] ?? 'user');
$username = strtolower($full_name);
$username = preg_replace('/\s+/', '', $username);

if (
    empty($full_name) ||
    empty($gender) ||
    empty($email) ||
    empty($password)
) {

    echo json_encode([
        "status" => "error",
        "message" => "Please fill all required fields."
    ]);

    exit;
}

$stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
$stmt->execute([$email]);

if ($stmt->get_result()->num_rows > 0) {

    echo json_encode([
        "status" => "error",
        "message" => "Email already exists."
    ]);

    exit;
}

$password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("
INSERT INTO users
(
fullname,
gender,
username,
email,
password,
job_title,
address,
role
)
VALUES
(
?,
?,
?,
?,
?,
?,
?,
?
)
");

$stmt->execute([
    $full_name,
    $gender,
    $username,
    $email,
    $password,
    $job_title,
    $address,
    $role
]);

echo json_encode([
    "status" => "success",
    "message" => "User created successfully."
]);