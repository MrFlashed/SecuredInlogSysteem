<?php
session_start();
require 'LRDatabase.php'; // Your database connection file

// Registration logic...
// After successful registration:
$_SESSION['registration_success'] = 'Registration successful! You can now log in.';
header('Location: index.php'); // Redirect back to the index page
exit();
?>
