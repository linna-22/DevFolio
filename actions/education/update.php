<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id            = trim($_POST['education_id'] ?? '');
$school_name   = trim($_POST['school_name'] ?? '');
$major         = trim($_POST['major'] ?? '');
$major_detail  = trim($_POST['major_detail'] ?? '');
$start_year    = trim($_POST['start_year'] ?? '');
$end_year      = trim($_POST['end_year'] ?? '');

if (empty($id)) {

    echo json_encode([
        "status" => "error",
        "message" => "Education ID is required."
    ]);
    exit;

}

if (
    empty($school_name) ||
    empty($major) ||
    empty($major_detail) ||
    empty($start_year)  === ''
) {

    echo json_encode([
        "status" => "error",
        "message" => "Please fill all required fields."
    ]);
    exit;

}

// Check duplicate (exclude current record)
$check = $conn->prepare("
    SELECT id
    FROM educations
    WHERE school_name = ?
      AND major = ?
      AND start_year = ?
      AND id != ?
");

$check->bind_param(
    "ssii",
    $school_name,
    $major,
    $start_year,
    $id
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

$stmt = $conn->prepare("
    UPDATE educations
    SET
        school_name = ?,
        major = ?,
        major_detail = ?,
        start_year = ?,
        end_year = ?,
    WHERE id = ?
");

$stmt->bind_param(
    "sssiiii",
    $school_name,
    $major,
    $major_detail,
    $start_year,
    $end_year,
    $id
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