<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
session_start(); // Start the session at the beginning

// Check for an error message in the session
$errorMessage = '';
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']); // Clear the error message from the session
}
?>

<div class="form-container">
    <img src="./images/Logo.png" alt="Profile Image" class="profile-pic">

    <?php if (!empty($errorMessage)): ?>
        <p class="error-message" style="color: red;"><?php echo htmlspecialchars($errorMessage); ?></p>
    <?php endif; ?>

    <!-- Login Form -->
    <form id="loginForm" method="POST" action="login.php" style="display: none;">
        <div class="input-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="input-group">
            <button type="submit">Continue</button>
        </div>
        <button type="button" onclick="showRegisterForm()">Register</button>
    </form>

    <!-- Registration Form -->
    <form id="registrationForm" method="POST" action="register.php" style="display: none;">
        <div class="input-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="input-group">
            <input type="password" name="confirm_password" placeholder="Repeat Password" required>
        </div>
        <div class="input-group">
            <button type="submit">Register</button>
        </div>
        <button type="button" onclick="showLoginForm()">Login</button>
    </form>

    <!-- Initial Buttons -->
    <div id="initialButtons" class="input-group">
        <button type="button" onclick="showLoginForm()">Login</button>
        <button type="button" onclick="showRegisterForm()">Register</button>
    </div>
</div>

<script>
    // Functions to show the login and registration forms
    function showLoginForm() {
        document.getElementById('loginForm').style.display = 'block';
        document.getElementById('registrationForm').style.display = 'none';
        document.getElementById('initialButtons').style.display = 'none';
    }

    function showRegisterForm() {
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('registrationForm').style.display = 'block';
        document.getElementById('initialButtons').style.display = 'none';
    }
</script>

</body>
</html>
