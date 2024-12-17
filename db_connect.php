<?php
// db_connect.php
$servername = "localhost";  // or your server address
$username = "root";  // your database username (default is root for MySQL)
$password = "w";  // your database password (usually empty for XAMPP/WAMP)
$dbname = "project4";  // your database name

// Create connection
$conn = new mysqli('localhost', 'root', 'w', 'project4');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . " (" . $conn->connect_errno . ")");
} else {
    echo "Connected successfully!";
}
?>
