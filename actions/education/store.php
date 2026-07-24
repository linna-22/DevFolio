<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$school_name = trim($_POST['school_name'] ?? '');
$major = trim($_POST['major'] ?? '');
$major_detail = trim($_POST['major_detail'] ?? '');
$start_year = trim($_POST['start_year'] ?? '');
$end_year = trim($_POST['end_year'] ?? '');

$created_by = $_SESSION['user']['id'];

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

// End Year must not be earlier than Start Year
if (!empty($end_year) && $end_year < $start_year) {

    echo json_encode([
        "status" => "error",
        "message" => "End Year cannot be earlier than Start Year."
    ]);
    exit;
}


// Prevent duplicate education
$stmt = $conn->prepare("
    SELECT id
    FROM educations
    WHERE school_name = ?
    AND major = ?
    AND start_year = ?
");

$stmt->bind_param("ssi", $school_name, $major, $start_year);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {

    echo json_encode([
        "status" => "error",
        "message" => "This education already exists."
    ]);
    exit;
}

$stmt = $conn->prepare("
    INSERT INTO educations
    (
        school_name,
        major,
        major_detail,
        start_year,
        end_year,
        created_by
    )
    VALUES
    (
        ?, ?, ?, ?, ?, ?
    )
");

$stmt->bind_param(
    "sssiii",
    $school_name,
    $major,
    $major_detail,
    $start_year,
    $end_year,
    $created_by
);

if ($stmt->execute()) {

    echo json_encode([
        "status" => "success",
        "message" => "Education created successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to create education."
    ]);

}