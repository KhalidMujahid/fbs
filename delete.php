<?php
if (!isset($_GET['id'])) {
  http_response_code(400);
  echo "Missing ticket ID";
  exit;
}

require "db.php";

$id = (int) $_GET['id'];

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare("DELETE FROM support_tickets WHERE id = ?");
  $stmt->execute([$id]);

  echo "Ticket deleted.";
} catch (PDOException $e) {
  http_response_code(500);
  echo "Error: " . $e->getMessage();
}
