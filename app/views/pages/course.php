<?php require APPROOT . '/views/inc/header.php'; ?>

<h2>All Courses</h2>
<table class="table">
  <thead>
    <tr>
      <th>Course Name</th>
      <th>Description</th>
      <th>Action</th> <!-- Added header for the "Register" button -->
    </tr>
  </thead>
  <tbody>
    <?php if (isset($courses) && is_array($courses)) : ?>
    <?php foreach ($courses as $course) : ?>
    <tr>
      <td><?php echo isset($course->CourseName) ? $course->CourseName : 'N/A'; ?></td>
      <td><?php echo isset($course->Semester) ? $course->Semester : 'N/A'; ?></td>
      <td>
        <form action="<?php echo URLROOT; ?>/users/registerForCourse" method="post">
          <input type="hidden" name="course_id" value="<?php echo $course->CourseID; ?>">
          <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>
    <tr>
      <td colspan="3">No courses available</td>
    </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>