<?php
$servername = "localhost";
$username = "nishi";
$password = "nishi@admin";
$database="task4";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>