<?php include("inc/header.php");?>

<?php include("inc/conn.php");?>

<?php
$sql = "SELECT *  FROM projects ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $projects = mysqli_fetch_all($result,MYSQLI_ASSOC);
} else {
  $projects = [];
}
    
   ?>




<?php if (isset($_SESSION['success'])) {?>
                <div class=" alert alert-success">
                 <?=$_SESSION['success'];?>
                </div>
                <?php } unset($_SESSION['success']);?>


    <div class="container my-5">
 <a class="btn btn-ms btn-success"  href="add-project.php?">Create</a>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <table class="table">
                    <thead>
                 
                         
                      
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Client</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    
                    </thead>
                    <tbody>

                    <?php foreach ($projects as $key => $project) {?>
                      <tr>
                      <td><?= $key +1;?></td>
                        <td><?=$project['projectname'];?></td>
                        <td><img src="../uploads/<?=$project['img'];?>" height="50px"></td>
                        <td><?=$project['clienttname'];?></td>
                        <td><?=$project['date'];?></td>
                        <td>
                        <a class="btn btn-ms btn-info"  href="edit-project.php?id=<?=$project['id'];?>">Edit</a>
                        <a  class="btn btn-ms btn-danger" href="delete-project.php?id=<?=$project['id'];?>&imgOldName=<?=$project['img'];?>">Delete</a>
                        </td> 
                      </tr>

                      <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php"); ?>