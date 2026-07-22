<?php

require_once __DIR__ . "/../config/session.php";

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}