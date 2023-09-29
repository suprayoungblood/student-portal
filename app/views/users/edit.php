<?php require APPROOT . '/views/inc/header.php'; ?>

<h1><?php echo $data['title']; ?></h1>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Edit Profile</h2>
      <p>Update your profile information</p>

      <form action="<?php echo URLROOT; ?>/users/update" method="post">

        <div class="form-group">
          <label for="name">Name: <sup>*</sup></label>
          <input type="text" name="name"
            class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['user']->name; ?>">
          <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email"
            class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['user']->email; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>

        <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="text" name="phone" maxlength="14"
            class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['user']->phone; ?>" oninput="applyPhoneMask(this)">
          <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
        </div>

        <!-- You can add other fields here as needed -->

        <div class="row text-center">
          <div class="col">
            <input type="submit" value="Save Changes" class="btn btn-success btn-block">
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>