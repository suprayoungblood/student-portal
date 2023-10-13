<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
  <h1 class="mt-4 mb-4"><?php echo $data['title']; ?></h1>
  <div class="card">
    <div class="card-header">
      <h4 class="mb-0"><?php echo $data['user']->Name; ?></h4>
    </div>
    <div class="card-body">
      <p class="card-text"><strong>Email:</strong> <?php echo $data['user']->Email; ?></p>
      <p class="card-text"><strong>Phone:</strong> <?php echo $data['user']->Phone; ?></p>

      <a href="<?php echo URLROOT; ?>/users/edit" class="btn btn-primary">Edit Profile</a>

      <form action="<?php echo URLROOT; ?>/users/delete" method="post" class="d-inline">
        <input type="submit" value="Delete Profile" class="btn btn-danger" id="delete-profile-btn">
      </form>
    </div>
  </div>
</div>

<script>
document.getElementById('delete-profile-btn').addEventListener('click', function(e) {
  e.preventDefault();
  Swal.fire({
    icon: 'error',
    title: 'Are you sure you want to delete your profile?',
    text: 'Once the profile is deleted, it cannot be recovered.',
    footer: '<a href="<?php echo URLROOT; ?>/pages/contact">Need Assistance</a>',
    showCancelButton: true,
    confirmButtonText: 'Delete Profile',
    cancelButtonText: 'Cancel',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      e.target.form.submit();
    }
  });
});
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>