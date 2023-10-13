<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
  <h1 class="mt-4 mb-4"><?php echo $data['title']; ?></h1>
  <div class="card mt-4">
    <div class="card-header">
      <h4 class="mb-0">My Courses</h4>
    </div>
    <div class="card-body">
      <?php if (!empty($data['courses'])) : ?>
        <ul class="list-group">
          <?php foreach ($data['courses'] as $course) : ?>
            <li class="list-group-item"><?php echo $course->CourseName; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else : ?>
        <p>You are not enrolled in any courses.</p>
      <?php endif; ?>
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