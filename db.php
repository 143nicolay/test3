<?php
$host = 'localhost'; // Database host
$user = 'nicole'; // Database username
$pass = '12345678'; // Database password
$dbname = 'nicole; // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
