<?php include("inc/header.php");?>
<?php include("db/conn.php");?>

<title>projects</title>
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Projects</h2>
          <ol>
            <li><a href="#">Home</a></li>
            <li>Projects</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <section id="portfolio" class="section-bg">
        <div class="container aos-init aos-animate" data-aos="fade-up">
  
          <header class="section-header">
            <h3 class="section-title">Our Projects</h3>
          </header>
          <?php

$sql = "SELECT projects.*,services.name as serviceName FROM projects JOIN services
ON projects.service_id= services.id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $projects = mysqli_fetch_all($result,MYSQLI_ASSOC);
} else {
  $projects = [];
}


?>

        <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 1080px;">
  <?php foreach ($projects as $project) {?>
    
    <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="position: absolute; left: 0px; top: 0px;">
      <div class="portfolio-wrap">
        <figure>
          <img src="uploads/<?=$project['img'];?>?id=<?=$project['id'];?>" class="img-fluid" alt="">
          <a href="uploads/<?=$project['img'];?>?id=<?=$project['id'];?>" data-lightbox="portfolio" class="link-preview"><i class="ion ion-eye"></i></a>
          <a href="show-project.php?id=<?=$project['id'];?>" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
        </figure>
        
        <div class="portfolio-info">
          <h4><a href="show-project.php?id=<?=$project['id'];?>"><?=$project['projectname'];?></a></h4>
          <p><?=$project['serviceName'];?></p>
        </div>
      </div>
    </div>
    <?php } ?>
        </div>
  
        </div>
    </section>

  </main><!-- End #main -->
  <?php include("inc/footer.php");?>