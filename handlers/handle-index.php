<?php

 
include("../db/conn.php");
session_start();

if (isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn,trim(htmlspecialchars($_POST['name'])));
    $email = mysqli_real_escape_string($conn,trim(htmlspecialchars($_POST['email'])));
    $subject = mysqli_real_escape_string($conn,trim(htmlspecialchars($_POST['subject'])));
    $msg =mysqli_real_escape_string($conn,trim(htmlspecialchars($_POST['msg'])));
     

    $errors = [];

    // name required - string -length
    if (empty($name)){
        $errors [] ="sorry, name is required";
    }elseif (! is_string($name)){
        $errors [] ="sorry, name must be string";
    }elseif(strlen($name) > 255){
        $errors [] ="sorry, name max 255 chatacter";
    
    }
    // email required - email -length
    if (empty($email)){
        $errors [] ="sorry, email is required";
    }elseif (! filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors [] ="sorry, email is not valid";
    }elseif(strlen($email) > 255){
        $errors [] ="sorry, email max 255 chatacter";
    }
    
    
    // subject required - string -length
    if (empty($subject)){
        $errors [] ="sorry, subject is required";
    }elseif (!is_string($subject)){
        $errors [] ="sorry, subject must be string";
    }elseif(strlen($subject) > 255){
        $errors [] ="sorry, subject max 255 chatacter";
    }
     
    // msg required - string -length
    if (empty($msg)){

        $errors [] ="sorry, message is required";
    }
    
    //
    
    if (empty($errors)){
    
        $sql = "INSERT INTO users(name, email, `subject`, `message`)
        VALUES  ('$name','$email','$subject','$msg')";
        if ( mysqli_query($conn,$sql)){
            $_SESSION['success'] = "successful process";
    
        }else {
            $_SESSION['queryError'] = "queryError";
        }
        
        mysqli_close($conn);
     
        
    }else {
    
        $_SESSION['errors'] = $errors;
        
// echo "<pre>";
// var_dump($errors);
// echo "</pre>";


    }
   header("location:../index.php");
    }
    
    
      
?>