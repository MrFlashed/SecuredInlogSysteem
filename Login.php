<?php
session_start();
require 'LRDatabaseAdmin.php'; // Make sure this path is correct for your database connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: Dashboard.php');
        exit();
    } else {
        // Login failed
        $_SESSION['error'] = 'Invalid username or password.';
        header('Location: Index.php'); // Redirect back to the login page with an error
        exit;
    }
}
?>
