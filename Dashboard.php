<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not, redirect to the login page
    header('Location: Index.php');
    exit();
}

require 'LRDatabaseAdmin.php'; // Ensure this is the correct path to your database connection

// Fetch users from the database
$sql = "SELECT id, username, created_at FROM users"; // Adjusted to exclude email
$stmt = $pdo->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 8px; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>This is your dashboard.</p>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Created At</th>
        </tr>
        <?php while ($row = $stmt->fetch()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['username']); ?></td>
            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <form action="Logout.php" method="post">
    <button type="submit">Logout</button>
    </form>
</body>
</html>
