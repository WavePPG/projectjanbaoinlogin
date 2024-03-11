<?php
$servername = "localhost";
// REPLACE with your Database name
$dbname = "s65160143";
// REPLACE with Database user
$username = "s65160143";
// REPLACE with Database user password
$password = "UUXmNj2b";

// Establish connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// else { echo "Connected to mysql database. <br>"; }
?>