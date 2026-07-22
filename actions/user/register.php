<?php

require_once __DIR__ . "/../../config/db.php";
 
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request.");
}

// Get form data
$full_name = trim($_POST['full_name']);
$gender    = trim($_POST['gender']);
$email     = trim($_POST['email']);
$password  = trim($_POST['password']);
$job_title = trim($_POST['job_title']);
$address   = trim($_POST['address']);

// Hash password
$password = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->execute([$email]);

if ($check->get_result()->num_rows > 0) {
    die("Email already exists.");
}

// Insert user
$stmt = $conn->prepare("
    INSERT INTO users (
        fullname,
        gender,
        email,
        password,
        job_title,
        address
    ) VALUES (?, ?, ?, ?, ?, ?)
");

$success = $stmt->execute([
    $full_name,
    $gender,
    $email,
    $password,
    $job_title,
    $address
]);

if ($success) {
    header("Location: ../../auth/login.php");
    exit;
}

die("Failed to register user.");