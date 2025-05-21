<?php
session_start();

$host = "sql310.infinityfree.com";
$dbUser = "if0_39034753";
$dbPass = "mZMNtE0P36";
$dbName = "if0_39034753_fbs";

$conn = new mysqli($host, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Email and password are required."]);
        exit();
    }

    $stmt = $conn->prepare("SELECT username FROM admins WHERE username = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['admin_email'] = $email;
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid credentials."]);
    }

    exit();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
    exit();
}
