<?php
include 'dashboard_auth.php';
include 'db.php';

if (!isset($_GET['id']) || !isset($_GET['action'])) {
  die("Missing parameters.");
}

$id = intval($_GET['id']);
$action = $_GET['action'];

if ($action === 'suspend') {
  $newStatus = 'suspended';
} elseif ($action === 'reactivate') {
  $newStatus = 'active';
} else {
  die("Invalid action.");
}

$newStatusEscaped = mysqli_real_escape_string($conn, $newStatus);

$query = "UPDATE users SET status = '$newStatusEscaped' WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result) {
  die("Database error: " . mysqli_error($conn));
}

header("Location: users.php");
exit;
