<?php
// This is the continuation after the login verification logic
if ($loginSuccessful) { // Replace $loginSuccessful with your actual login success condition
    $_SESSION['loggedin'] = true; // Set a session variable indicating the user is logged in

    // Assuming you want to display the users table from your database
    require 'LRDatabase.php'; // Include your database connection
    
    $stmt = $pdo->query("SELECT * FROM users"); // Replace 'users' with your actual table name
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // HTML to display the table
    echo '<table border="1">';
    echo '<tr>';
    foreach ($rows[0] as $key => $value) {
        echo "<th>$key</th>";
    }
    echo '</tr>';
    foreach ($rows as $row) {
        echo '<tr>';
        foreach ($row as $column) {
            echo "<td>$column</td>";
        }
        echo '</tr>';
    }
    echo '</table>';
} else {
    // Redirect back to the login page or show an error
    header('Location: index.php');
    exit;
}
?>
