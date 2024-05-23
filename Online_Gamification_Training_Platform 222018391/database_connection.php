<?php
// Database credentials
$hostname = "localhost";
$username = "kanyemera1"; // Replace with your actual database username
$password = "222018391"; // Replace with your actual database password
$database = "online_gamification_training_platform";

// Create connection
$connection = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    echo "Connected successfully";
}
?>
