<?php

require_once __DIR__ . "/../../config/db.php";
require_once __DIR__ . "/../../config/session.php";

$email = trim($_POST['email']);
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);

$user = $stmt->get_result()->fetch_assoc();

if (!$user) {
    die("Invalid email or password.");
}

if (!password_verify($password, $user['password'])) {
    die("Invalid email or password.");
}

// Store user in session
$_SESSION['user'] = [
    'id' => $user['id'],
    'name' => $user['fullname'],
    'email' => $user['email'],
    'role'  => $user['role']
];

header("Location: ../../admin/dashboard.php");
exit;