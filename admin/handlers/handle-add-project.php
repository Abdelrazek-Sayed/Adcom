


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

if (isset($_POST['submit'])){

$projectname = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['projectname'])));
$clientname = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['clientname'])));
$serv_id = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['serv_id'])));
$date = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['date'])));
$desc = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['desc'])));

$img  = $_FILES['img'] ;

$imgName = $img['name'];
$imgTmpName = $img['tmp_name'];
$imgSize = $img['size'];
$imgType = $img['type'];
$imgError = $img['error'];

$errors =[];

// validation

//projectname
if (empty($projectname)){
    $errors [] = "projectname is required";
}elseif(! is_string($projectname)){
$errors[] = "projectname must be string ";
}elseif(strlen($projectname) > 200 ){
    $errors[] = "projectname max is 200 chars ";
    }


    //clientname
if (empty($clientname)){
    $errors [] = "clientname is required";
}elseif(! is_string($clientname)){
$errors[] = "clientname must be string ";
}elseif(strlen($clientname) > 200 ){
    $errors[] = "clientname max is 200 chars ";
    }

//desc
if (empty($desc)){
$errors [] = "descsription is required";
}
//date
if (empty($date)){
    $errors [] = "date is required";
}

// img -no errors -available extension - max size 2 mb 
$allowedExt = ['jpg','png','gif','jpeg'];
 $imgExt = pathinfo($imgName,PATHINFO_EXTENSION);
 $imgSizeMb = $imgSize/(1024 ** 2);

 // 
 if ($imgError != 0){
    $errors [] = "error while uploading image";
 }elseif ($imgSizeMb > 2){
    $errors [] = "size must be less than 2 mb";
 }elseif(! in_array($imgExt,$allowedExt)){
    $errors [] = "not valid extension allowed extensions are 'jpg','png','gif','jpeg' ";
 }

if (empty($errors)){

$randstr = uniqid();
// new name 
$imgNewName = "$randstr.$imgExt";
// save img with new img
move_uploaded_file($imgTmpName,"../../uploads/$imgNewName");


    $sql = "INSERT INTO projects (projectname,clienttname,`desc`,service_id,date, img )
     values ('$projectname','$clientname','$desc', $serv_id, $date,'$imgNewName')";
     $result = mysqli_query($conn, $sql);



    if ( $result) {
         $_SESSION['success'] = "added successfuly ";
         header("location:../projects.php");
        } else {
            $_SESSION['errors'] = " failed to add";
            header("location:../add-project.php");
         
        }

mysqli_close($conn);

}else{
    $_SESSION['errors'] = $errors;
    header("location:../add-project.php");
}
   
    
}



?>