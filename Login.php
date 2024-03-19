<?php
session_start();
require 'LRDatabase.php'; // Your database connection file

// Login logic...
// After successful login:
$_SESSION['login_success'] = 'Logged in successfully!';
header('Location: dashboard.php'); // Redirect to the dashboard
exit();
?>
