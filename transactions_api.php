<?php
require 'dashboard_auth.php';
require 'db.php';

header('Content-Type: application/json');

$query = "SELECT * FROM transactions ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Database query failed: ' . mysqli_error($conn)]);
    exit;
}

$transactions = [];
while ($row = mysqli_fetch_assoc($result)) {
    $transactions[] = $row;
}

echo json_encode($transactions);
