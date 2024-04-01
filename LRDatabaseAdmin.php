<?php
// Set up your database connection info
$host = '127.0.0.1'; // The location of your database (like a street address for your data)
$db   = 'lrdatabaseadmin'; // The name of your specific database (like the name of your house)
$user = 'LRDatabase'; // Username to log into your database
$pass = 'LRDatabase'; // Password to log into your database
$charset = 'utf8mb4'; // The language format for your database, utf8mb4 supports more characters

// Options to make our database connection work well and safely
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Tells the database to report any problems loudly and clearly
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Gets data as a simple list (makes it easy to understand)
    PDO::ATTR_EMULATE_PREPARES   => false, // Makes sure our database talks directly with our website for extra security
];

// Putting together our connection info
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    // Try to connect to the database
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // If connection fails, show an error message
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
