<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$userId = $_SESSION['user']['id'];

$id            = trim($_POST['education_id'] ?? '');
$school_name   = trim($_POST['school_name'] ?? '');
$major         = trim($_POST['major'] ?? '');
$major_detail  = trim($_POST['major_detail'] ?? '');
$start_year    = trim($_POST['start_year'] ?? '');
$end_year      = trim($_POST['end_year'] ?? '');

// Validate ID
if (empty($id)) {

    echo json_encode([
        "status" => "error",
        "message" => "Education ID is required."
    ]);
    exit;
}

// Validate required fields
if (
    empty($school_name) ||
    empty($major) ||
    empty($major_detail) ||
    empty($start_year)
) {

    echo json_encode([
        "status" => "error",
        "message" => "Please fill all required fields."
    ]);
    exit;
}

// Check duplicate (only for current user)
$check = $conn->prepare("
    SELECT id
    FROM educations
    WHERE school_name = ?
      AND major = ?
      AND start_year = ?
      AND id != ?
      AND created_by = ?
");

$check->bind_param(
    "ssiii",
    $school_name,
    $major,
    $start_year,
    $id,
    $userId
);

$check->execute();

$result = $check->get_result();

if ($result->num_rows > 0) {

    echo json_encode([
        "status" => "error",
        "message" => "This education already exists."
    ]);
    exit;
}

// Update Education
$stmt = $conn->prepare("
    UPDATE educations
    SET
        school_name = ?,
        major = ?,
        major_detail = ?,
        start_year = ?,
        end_year = ?
    WHERE id = ?
      AND created_by = ?
");

$stmt->bind_param(
    "sssssii",
    $school_name,
    $major,
    $major_detail,
    $start_year,
    $end_year,
    $id,
    $userId
);

if ($stmt->execute()) {

    echo json_encode([
        "status" => "success",
        "message" => "Education updated successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to update education."
    ]);

}

$stmt->close();
$check->close();
$conn->close();