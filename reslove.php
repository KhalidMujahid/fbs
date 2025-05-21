<?php
if (!isset($_GET['id'])) {
  http_response_code(400);
  echo "Missing ticket ID";
  exit;
}

require "db.php";

$id = (int) $_GET['id'];

$stmt = mysqli_prepare($conn, "UPDATE support_tickets SET status = 'Resolved' WHERE id = ?");
if (!$stmt) {
  http_response_code(500);
  echo "Failed to prepare statement: " . mysqli_error($conn);
  exit;
}

mysqli_stmt_bind_param($stmt, "i", $id);
if (mysqli_stmt_execute($stmt)) {
  echo "Ticket resolved.";
} else {
  http_response_code(500);
  echo "Error resolving ticket: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
