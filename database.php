Get your own PHP Server
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "registerusers";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_errno) {
  die("Connection failed: " . $conn->connect_errno);
}

return $conn;
?>