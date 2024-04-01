<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'LRDatabaseAdmin.php'; // Ensure this path is correct

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Adjusted SQL statement with placeholders for username and password only
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$username, $password])) {
        header('Location: Dashboard.php'); // Redirect to the dashboard after successful registration
        exit();
    } else {
        // It's better to use $stmt->errorInfo() to get error details in PDO
        $errorInfo = $stmt->errorInfo();
        echo "Error: " . $errorInfo[2]; // This displays the actual error message from the database
    }
}
