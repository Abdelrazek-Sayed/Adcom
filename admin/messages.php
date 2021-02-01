<?php include("inc/header.php");?>
<?php include("inc/conn.php");?>
<?php
$sql = "SELECT *  FROM users ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $msgs = mysqli_fetch_all($result,MYSQLI_ASSOC);
} else {
  $msgs = [];
}
    
   ?>


    <div class="container my-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($msgs as $key => $msg){?>
                      <tr>
                        <!-- <th scope="row">1</th> -->
                        <td><?= $key +1;?></td>
                        <td><?=$msg['name'];?></td>
                        <td><?=$msg['email'];?></td>
                        <td><?=$msg['subject'];?></td>
                        <td><?=$msg['message'];?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php");?>