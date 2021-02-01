
<?php include("inc/header.php");?>
<title>index</title>
  <!-- ======= Intro Section ======= -->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(assets/img/carousel.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">We are professional</h2>
                <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="#" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/carousel.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">At vero eos et accusamus</h2>
                <p class="animate__animated animate__fadeInUp">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>
                <a href="#" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/carousel.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Temporibus autem quibusdam</h2>
                <p class="animate__animated animate__fadeInUp">Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste natus error sit voluptatem accusantium.</p>
                <a href="#" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/carousel.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Nam libero tempore</h2>
                <p class="animate__animated animate__fadeInUp">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum.</p>
                <a href="#" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/carousel.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Magnam aliquam quaerat</h2>
                <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="#" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Intro Section -->

  <main id="main">


    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">

        <header class="section-header wow fadeInUp mb-5">
          <h3>Services</h3>
        </header>
        <?php include("db/conn.php");?>

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


        <div class="row">
<?php foreach($services as $service){?>
          <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="ion-ios-paper-outline"></i></div>
            <h4 class="title"><a href=""><?=$service['name'];?></a></h4>
            <p class="description"><?=$service['desc'];?></p>
          </div>

         <?php }?>
          

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

      


        <div class="form">
          <form method="POST" action="handlers/handle-index.php">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
            </div>
            <div class="form-group">
              <textarea class="form-control" name="msg" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
            </div>
            <div class="text-center"><button type="submit" name="submit" >Send Message</button></div>
          </form>
        </div>

        <?php if (isset($_SESSION['errors']))  { ?>
                <div class ="alert alert-danger">
                <?php foreach ($_SESSION['errors'] as $error) { ?>
                      <p class= "mb-0"> <?= $error;?> </p>
                <?php }?>
                </div>
                <?php unset( $_SESSION['errors']);?>
                <?php } ?>

                <?php if (isset($_SESSION['queryError']))  { ?>
                <div class ="alert alert-danger">
                <p class= "mb-0"><?= $_SESSION['queryError'];?></p>
                </div>
                <?php unset( $_SESSION['queryError']);?>
                <?php } ?>
                
                <?php if (isset($_SESSION['success']))  { ?>
                <div class ="alert alert-success">
                <p class= "mb-0"><?= $_SESSION['success'];?></p>
                </div>
                <?php unset( $_SESSION['success']);?>
                <?php } ?>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <?php include("inc/footer.php");?>
