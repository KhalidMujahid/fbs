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

$query = "UPDATE users SET status = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "si", $newStatus, $id);
mysqli_stmt_execute($stmt);

header("Location: users.php");
exit;
