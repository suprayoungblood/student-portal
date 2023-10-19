<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-fluid text-center">
  <div class="container">
    <!-- <img src="<?php echo URLROOT; ?>/img/logo.svg" alt="School Logo" style="margin-bottom: 50px" width="300" height="100"> -->
    <h1 class="display-3">School Portal</h1>
    <p class="lead">Empowering Students for a Brighter Future</p>

    <!-- Slide-show for school environment -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo URLROOT; ?>/img/School 1.jpg" class="d-block w-100" alt="School Slide 1">
        </div>
        <div class="carousel-item">
          <img src="<?php echo URLROOT; ?>/img/School 2.jpg" class="d-block w-100" alt="School Slide 2">
        </div>
        <div class="carousel-item">
          <img src="<?php echo URLROOT; ?>/img/School 3.jpg" class="d-block w-100" alt="School Slide 3">
        </div>
        <div class="carousel-item">
          <img src="<?php echo URLROOT; ?>/img/School 4.jpg" class="d-block w-100" alt="School Slide 4">
        </div>
        <div class="carousel-item">
          <img src="<?php echo URLROOT; ?>/img/School 5.jpg" class="d-block w-100" alt="School Slide 5">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>

<!--Main layout-->
<main class="my-5">
  <div class="container">
    <!--Section: Content-->
    <section>
      <div class="row">
        <div class="col-md-6 gx-5 mb-4">
          <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
            <img src="<?php echo URLROOT; ?>/img/School 6.jpg" class="img-fluid" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
        </div>

        <div class="col-md-6 gx-5 mb-4">
          <h4><strong>Mission Statement</strong></h4>
          <p class="text-muted">
            Our school portal is dedicated to providing students with an immersive and collaborative educational
            environment. We are committed to nurturing the intellectual, physical, and emotional growth of our students,
            preparing them for a rapidly changing world.
          </p>
        </div>
      </div>
    </section>

    <hr class="my-5" />

    <!--Section: Content-->
    <section class="text-center">
      <h4 class="mb-5"><strong>Our Values</strong></h4>

      <!-- You can change the values and their description to better fit the school's ethos -->
      <div class="row">
        <!-- Value 1 -->
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="<?php echo URLROOT; ?>/img/School 1.jpg" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Knowledge</h5>
              <p class="card-text">
                We believe in the transformative power of knowledge and promote a culture of lifelong learning.
              </p>
            </div>
          </div>
        </div>

        <!-- Value 2 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="<?php echo URLROOT; ?>/img/School 2.jpg" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Integrity</h5>
              <p class="card-text">
                We adhere to the highest ethical standards, ensuring trust and transparency in all our actions.
              </p>
            </div>
          </div>
        </div>

        <!-- Value 3 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="<?php echo URLROOT; ?>/img/School 3.jpg" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Collaboration</h5>
              <p class="card-text">
                We foster a sense of community, valuing each individual's contribution and promoting teamwork.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Section: Content-->
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>