<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$name = trim($_POST['name'] ?? '');
$url = trim($_POST['url'] ?? '');
$logo = trim($_POST['logo'] ?? '');
$target = trim($_POST['target'] ?? '');

$created_by = $_SESSION['user']['id'];

if (
    empty($name) ||
    empty($url) ||
    empty($logo) ||
    empty($target)
) {

    echo json_encode([
        "status" => "error",
        "message" => "Please fill all required fields."
    ]);
    exit;
}

$stmt = $conn->prepare("
    SELECT id
    FROM socials
    WHERE name = ?
");

$stmt->bind_param("s", $name);
$stmt->execute();

if ($stmt->get_result()->num_rows > 0) {

    echo json_encode([
        "status" => "error",
        "message" => "Social already exists."
    ]);
    exit;
}

$stmt = $conn->prepare("
    INSERT INTO socials
    (
        name,
        url,
        logo,
        target,
        created_by
    )
    VALUES
    (
        ?, ?, ?, ?, ?
    )
");

$stmt->bind_param(
    "ssssi",
    $name,
    $url,
    $logo,
    $target,
    $created_by
);

if ($stmt->execute()) {

    echo json_encode([
        "status" => "success",
        "message" => "Social created successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to create social."
    ]);

}