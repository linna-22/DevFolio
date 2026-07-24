<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id                 = trim($_POST['id'] ?? '');
$position           = trim($_POST['position'] ?? '');
$position_desc      = trim($_POST['position_desc'] ?? '');
$skills             = trim($_POST['skills'] ?? '');
$aboutme_title      = trim($_POST['aboutme_title'] ?? '');
$aboutme_desc       = trim($_POST['aboutme_desc'] ?? '');
$experience         = trim($_POST['experience'] ?? '');
$completed_project  = trim($_POST['completed_project'] ?? '');

// Validate ID
if (empty($id)) {
    echo json_encode([
        "status" => "error",
        "message" => "About ID is required."
    ]);
    exit;
}

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

// Update About
$stmt = $conn->prepare("
    UPDATE abouts
    SET
        position = ?,
        position_desc = ?,
        skills = ?,
        aboutme_title = ?,
        aboutme_desc = ?,
        experience = ?,
        completed_project = ?
    WHERE id = ?
");

$success = $stmt->execute([
    $position,
    $position_desc,
    $skills,
    $aboutme_title,
    $aboutme_desc,
    $experience,
    $completed_project,
    $id
]);

if ($success) {

    echo json_encode([
        "status" => "success",
        "message" => "About section updated successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to update About section."
    ]);

}