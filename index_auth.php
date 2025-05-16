<?php
session_start();

$host = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "fbs";

$conn = new mysqli($host, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email and password are required.";
        header("Location: index.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT email, password FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_email'] = $admin['email'];
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid credentials.";
        }
    } else {
        $_SESSION['error'] = "Admin not found.";
    }

    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
