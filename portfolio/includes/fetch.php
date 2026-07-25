<?php

require_once "db.php";

/*
|--------------------------------------------------------------------------
| Get Username From URL
|--------------------------------------------------------------------------
*/

$username = trim($_GET['username'] ?? '');

if (empty($username)) {
    die("Username is required.");
}

/*
|--------------------------------------------------------------------------
| Find Portfolio Owner
|--------------------------------------------------------------------------
*/

$userStmt = $conn->prepare("
    SELECT id, fullname, username,email
    FROM users
    WHERE username = ?
    LIMIT 1
");

$userStmt->bind_param("s", $username);
$userStmt->execute();

$owner = $userStmt->get_result()->fetch_assoc();

if (!$owner) {
    die("Portfolio not found.");
}

$userId = $owner['id'];

/*
|--------------------------------------------------------------------------
| Hero
|--------------------------------------------------------------------------
*/

$heroStmt = $conn->prepare("
    SELECT *
    FROM heroes
    WHERE created_by = ?
    LIMIT 1
");

$heroStmt->bind_param("i", $userId);
$heroStmt->execute();

$hero = $heroStmt->get_result()->fetch_assoc();

/*
|--------------------------------------------------------------------------
| About
|--------------------------------------------------------------------------
*/

$aboutStmt = $conn->prepare("
    SELECT *
    FROM abouts
    WHERE created_by = ?
    LIMIT 1
");

$aboutStmt->bind_param("i", $userId);
$aboutStmt->execute();

$about = $aboutStmt->get_result()->fetch_assoc();

/*
|--------------------------------------------------------------------------
| Projects
|--------------------------------------------------------------------------
*/

$projectStmt = $conn->prepare("
    SELECT *
    FROM projects
    WHERE created_by = ?
    ORDER BY id DESC
");

$projectStmt->bind_param("i", $userId);
$projectStmt->execute();

$projects = $projectStmt->get_result();

/*
|--------------------------------------------------------------------------
| Education
|--------------------------------------------------------------------------
*/

$educationStmt = $conn->prepare("
    SELECT *
    FROM educations
    WHERE created_by = ?
    ORDER BY start_year DESC
");

$educationStmt->bind_param("i", $userId);
$educationStmt->execute();

$educations = $educationStmt->get_result();

/*
|--------------------------------------------------------------------------
| Socials
|--------------------------------------------------------------------------
*/

$socialStmt = $conn->prepare("
    SELECT *
    FROM socials
    WHERE created_by = ?
    ORDER BY id ASC
");

$socialStmt->bind_param("i", $userId);
$socialStmt->execute();

$socials = $socialStmt->get_result();