<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<p><?php echo $data['description']; ?></p>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Contact Form</h2>
      <p>Please fill out the form </p>
      <form action="<?php echo URLROOT; ?>/users/contact" method="post">
        <div class="form-group">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="row text-center">
            <div class="col">
              <input type="submit" value="Submit" class="btn btn-success btn-block">
            </div>
          </div>
      </form>
    </div>
  </div>
</div>

<p>Version: <strong><?php echo APPVERSION; ?></strong></p>
<?php require APPROOT . '/views/inc/footer.php'; ?>