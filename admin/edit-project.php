<?php include("inc/header.php");?>
<?php include("inc/conn.php");?>

<?php

//session_start();

if (isset($_GET['id'])){

$id = $_GET['id'];
$sql = "SELECT * FROM projects WHERE id = $id";

$result = mysqli_query($conn,$sql);
   
   if (mysqli_num_rows($result) > 0 ){
       $project = mysqli_fetch_assoc($result);

   }else {
    $project = [];
           }

}

 
$sql = "SELECT * FROM services";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $services = mysqli_fetch_all($result,MYSQLI_ASSOC);
} else {
  $services = [];
}


?>
 <?php if (isset($_SESSION['errors']))  { ?>
                            <div class ="alert alert-danger">
                                <?php foreach ($_SESSION['errors'] as $error) { ?>
                                    <p class= "mb-0"><?= $error;?></p>
                                <?php }?>
                            </div>
                            
                            <?php unset( $_SESSION['errors']);?>
                            <?php } ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="handlers/handle-edit-project.php?id=<?=$project['id'];?>&imgOldName=<?=$project['img'];?>" enctype="multipart/form-data">
                            <div class="mb-3">
                              <input type="text" name = "projectname" class="form-control" placeholder="Name" value="<?=$project['projectname'];?>">
                            </div>
                            <div class="mb-3">
                              <input type="text" name = "clientname" class="form-control" placeholder="Client" value="<?=$project['clienttname'];?>">
                            </div>
                            <div class="mb-3">
                            <select class="form-select" name ="serv_id" aria-label="Default select example">
                                    <?php foreach($services as $service){?>
                                    <option <?php if ($service['id'] == $project['service_id']){echo "selected";} ?> value="<?= $service['id']; ?>"><?= $service['name']; ?></option>
                                    <?php } ?>
                                </select>
                                
                            </div>
                            <div class="mb-3">
                                <input type="text"  name = "date" class="form-control" placeholder="Date (Ex: 2020-12-25)"value="<?=$project['date'];?>">
                            </div>  
                            <div class="mb-3">
                                <textarea class="form-control" name = "desc" placeholder="Description" rows="3"><?=$project['desc'];?></textarea>
                            </div>
                            <div>
                                <img src="../uploads/<?=$project['img'];?>" height="50px">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="file" name="img">
                            </div>
                              
                            <button type="submit" name = "submit" class="btn btn-primary">Edit project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php");?>>