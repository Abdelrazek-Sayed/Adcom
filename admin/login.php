

<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
    
<?php if (isset($_SESSION['errors']))  { ?>
                <div class ="alert alert-danger">
                <?php foreach ($_SESSION['errors'] as $error) { ?>
                      <p class= "mb-0"> <?= $error;?> </p>
                <?php }?>
                </div>
                <?php unset( $_SESSION['errors']);?>
                <?php } ?>

                <?php if (isset($_SESSION['loginError']))  { ?>
                <div class ="alert alert-danger">
                <p class= "mb-0"><?= $_SESSION['loginError'];?></p>
                </div>
                <?php unset( $_SESSION['loginError']);?>
                <?php } ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="handlers/handle-login.php">
                            <div class="mb-3">
                              <input type="email" name="email"class="form-control" placeholder="email">
                            </div>
                            <div class="mb-3">
                              <input type="password"name="password" class="form-control" placeholder="password">
                            </div>
                            <button type="submit"name="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>