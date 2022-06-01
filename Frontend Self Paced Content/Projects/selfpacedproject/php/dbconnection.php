<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "furniturezone";
global $conn;
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
//echo "DB Connected successfully";
?>