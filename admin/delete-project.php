<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adcom";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



if (isset($_GET['id'])){

    $id = $_GET['id'];
    $imgOldName = $_GET['imgOldName'];

    unlink("uploads/$imgOldName");

    $sql = "DELETE FROM projects WHERE id = $id";

    if (mysqli_query($conn,$sql) == true ){

        $_SESSION['success'] = "you deleted project successfully";
         

    }

    header("location:projects.php");
}


header("location:projects.php");

?>