<?php include("inc/header.php");?>
<?php include("db/conn.php");?>

<title>show-project</title>
<?php

if (isset($_GET['id'])){
  $id = $_GET['id'];
}else{
    $id = 1;
}

  $sql = "SELECT projects.* , services.name  as serviceName  FROM projects JOIN services
  ON projects.service_id = services.id
  WHERE projects.id = $id ";
 // echo $sql;

  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $projects = mysqli_fetch_assoc($result);
  } else {
    $projects['projectname']= "No project Found";
  }
 


?>

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">

          <h2><?=$projects['projectname'];?></h2>

          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="project.php">Projects</a></li>

            <li><?=$projects['projectname'];?></li>

          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Projects Section ======= -->
    <section class="portfolio-details">
      <div class="container">

        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            <img src="uploads/<?=$projects['img'];?>" class="img-fluid" alt="">
          </div>

          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Service </strong><?=$projects['serviceName'];?></li>
              <li><strong>Client </strong><?=$projects['clienttname'];?></li>
              <li><strong>Project date </strong><?=$projects['date'];?></li>
            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          <h2><?=$projects['projectname'];?></h2>
          <p>
          <?=$projects['desc'];?> 
          </p>
        </div>
      </div>
    </section><!-- End Projects Section -->

  </main><!-- End #main -->
<?php include("inc/footer.php");?>
