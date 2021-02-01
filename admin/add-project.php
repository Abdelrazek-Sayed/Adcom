<?php include("inc/header.php");?>
<?php include("inc/conn.php");?>

<?php

        $sql = "SELECT * FROM services";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          $services = mysqli_fetch_all($result,MYSQLI_ASSOC);
        } else {
          $services = [];
        }


?>


<title>add-project</title>

                <?php if (isset($_SESSION['errors']))  { ?>
                <div class ="alert alert-danger">
                <?php foreach ($_SESSION['errors'] as $error) { ?>
                      <p class= "mb-0"> <?= $error;?> </p>
                <?php }?>
                </div>
                <?php unset( $_SESSION['errors']);?>
                <?php } ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="handlers/handle-add-project.php" enctype="multipart/form-data">
                            <div class="mb-3">
                              <input type="text" name ="projectname" class="form-control" placeholder="Name">
                            </div>
                            <div class="mb-3">
                              <input type="text" name ="clientname" class="form-control" placeholder="Client">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name ="serv_id" aria-label="Default select example">
                                    <?php foreach($services as $service){?>
                                    <option value="<?= $service['id']; ?>"><?= $service['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="text" name ="date" class="form-control" >
                            </div>  
                            <div class="mb-3">
                                <textarea class="form-control"name ="desc" placeholder="Description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" name ="img" type="file">
                            </div>
                              
                            <button type="submit" name ="submit" class="btn btn-primary">Add project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("inc/footer.php");?>