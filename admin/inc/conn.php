<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "adcom";

// Create connection
$conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>