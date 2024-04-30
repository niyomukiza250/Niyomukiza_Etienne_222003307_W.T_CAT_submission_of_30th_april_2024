<?php
// Database connection parameters
$servername = "localhost";
$username = "niyomukizaetienne";
$password = "222003307"; // Your database password
$dbname = "huyesportsdb"; // Replace "your_database_name" with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>