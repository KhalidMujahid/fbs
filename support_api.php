<?php
require 'dashboard_auth.php';
require 'db.php';

header('Content-Type: application/json');

$status = isset($_GET['status']) ? mysqli_real_escape_string($conn, $_GET['status']) : '';

$sql = "SELECT * FROM support_tickets";
if ($status === 'Open' || $status === 'Resolved') {
    $sql .= " WHERE status = '$status'";
}
$sql .= " ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);
if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Query failed: ' . mysqli_error($conn)]);
    exit;
}

$tickets = [];
while ($row = mysqli_fetch_assoc($result)) {
    $tickets[] = $row;
}

echo json_encode($tickets);
