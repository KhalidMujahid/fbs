<?php

$host = "sql310.infinityfree.com";
$dbUser = "if0_39034753";
$dbPass = "mZMNtE0P36";
$dbName = "if0_39034753_fbs";

$conn = mysqli_connect($host, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}