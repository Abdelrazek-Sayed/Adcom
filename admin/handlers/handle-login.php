<?php
session_start();

require_once("../inc/conn.php");
 

 
if (isset($_POST['submit'])){

      $email = mysqli_real_escape_string($conn,htmlspecialchars(trim( $_POST['email'])));
      $password =  $_POST['password'];

      $errors =[];

      //validation 
// email :required - email -length
if (empty($email)){
    $errors [] = "email is required";
}elseif(! filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors [] = "email is not valid";
}elseif( strlen(($email) > 200)){
    $errors [] = "email max is 200 chars";

}

//pssword required - length
if (empty($password)){
    $errors [] = "password is required";
}elseif(strlen($password) < 3 or strlen($password) > 100){
    $errors [] = "password between 4 and 100 chars ";
}


   


 if (empty($errors)){
    $sql = "SELECT *FROM admins WHERE email = '$email' ";
   $result =  mysqli_query($conn,$sql);
   // check the email 
   if (mysqli_num_rows($result) > 0){
      $admin =  mysqli_fetch_assoc($result);
                // check the password 
                if (password_verify($password,$admin['password'])){
                    // save user data in sessions and redirct to admin/index page 
                    // $_SESSION['adminId'] = $admin['id'];
                    // $_SESSION['adminName'] = $admin['name'];
                    
                    $_SESSION['islogin'] = true;
                    header("location:../index.php");

                }else{
                    // password is not correct
                    $_SESSION['loginError'] = "password is not correct" ;
                    header("location:../login.php");
                }
        }else{
            // email is true but not registered
            $_SESSION['loginError'] = "email is not registered" ;
            header("location:../login.php");
        }
  mysqli_close($conn);
 }else{
    $_SESSION['errors'] = $errors ;
    header("location:../login.php");
}

}






?>