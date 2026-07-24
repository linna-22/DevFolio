<?php

require_once "../../config/db.php";
require_once "../../includes/auth.php";

header("Content-Type: application/json");

$id = trim($_POST['social_id'] ?? '');
$name = trim($_POST['name'] ?? '');
$url = trim($_POST['url'] ?? '');
$logo = trim($_POST['logo'] ?? '');
$target = trim($_POST['target'] ?? '');

if (empty($id)) {

    echo json_encode([
        "status" => "error",
        "message" => "Social ID is required."
    ]);
    exit;

}

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

$check = $conn->prepare("
    SELECT id
    FROM socials
    WHERE name = ?
    AND id != ?
");

$check->bind_param("si", $name, $id);
$check->execute();

if ($check->get_result()->num_rows > 0) {

    echo json_encode([
        "status" => "error",
        "message" => "Social already exists."
    ]);
    exit;

}

$stmt = $conn->prepare("
    UPDATE socials
    SET
        name=?,
        url=?,
        logo=?,
        target=?
    WHERE id=?
");

$stmt->bind_param(
    "ssssi",
    $name,
    $url,
    $logo,
    $target,
    $id
);

if ($stmt->execute()) {

    echo json_encode([
        "status" => "success",
        "message" => "Social updated successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to update social."
    ]);

}