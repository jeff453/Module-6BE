<?php
// Database configuration
$dbHost = '127.0.0.1';
$dbUser = 'jefffman453';
$dbPass = 'Cacaman369?';
$dbName = 'module_6';

// Establish database connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
