

<?php session_start();?>
<?php
  
  
  if( isset($_SESSION['islogin']) == false){
  
      header("location:login.php");
      $errors [] = "please register first";
      $_SESSION['errors'] = $errors;
  }
    
    ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Adcom</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="projects.php">Projects</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="messages.php">Messages</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>