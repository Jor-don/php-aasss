<?php
$host = 'localhost';
$user = 'root';
$password = ''; // leave empty if using XAMPP default
$database = 'cataloguedb';

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>