<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$position          = trim($_POST['position'] ?? '');
$position_desc     = trim($_POST['position_desc'] ?? '');
$skills            = trim($_POST['skills'] ?? '');
$aboutme_title     = trim($_POST['aboutme_title'] ?? '');
$aboutme_desc      = trim($_POST['aboutme_desc'] ?? '');
$experience        = trim($_POST['experience'] ?? '');
$completed_project = trim($_POST['completed_project'] ?? '');

$created_by = $_SESSION['user']['id'];

// Validate required fields
if (
    empty($position) ||
    empty($position_desc) ||
    empty($skills) ||
    empty($aboutme_title) ||
    empty($aboutme_desc) ||
    empty($experience) ||
    empty($completed_project)
) {

    echo json_encode([
        "status" => "error",
        "message" => "Please fill all required fields."
    ]);
    exit;
}

// Check if the current user already has an About section
$checkStmt = $conn->prepare("
    SELECT COUNT(*) AS total
    FROM abouts
    WHERE created_by = ?
");

$checkStmt->bind_param("i", $created_by);
$checkStmt->execute();

$checkResult = $checkStmt->get_result();
$total = $checkResult->fetch_assoc()['total'];

if ($total >= 1) {

    echo json_encode([
        "status" => "error",
        "message" => "You already have an About section."
    ]);
    exit;
}

// Insert About
$stmt = $conn->prepare("
    INSERT INTO abouts
    (
        position,
        position_desc,
        skills,
        aboutme_title,
        aboutme_desc,
        experience,
        completed_project,
        created_by
    )
    VALUES
    (
        ?, ?, ?, ?, ?, ?, ?, ?
    )
");

$stmt->bind_param(
    "sssssssi",
    $position,
    $position_desc,
    $skills,
    $aboutme_title,
    $aboutme_desc,
    $experience,
    $completed_project,
    $created_by
);

if ($stmt->execute()) {

    echo json_encode([
        "status" => "success",
        "message" => "About section created successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to create About section."
    ]);

}

$stmt->close();
$checkStmt->close();
$conn->close();