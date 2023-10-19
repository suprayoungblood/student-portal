<?php require APPROOT . '/views/inc/header.php'; ?>

 

<div class="card-header d-flex align-items-center">
  <h4 style="width: 100%;" class="card-title mb-0 flex-grow-1">My Class</h4> 
  &nbsp;<a style="float:right;" href="<?php echo URLROOT; ?>/pages/classadd" class="btn btn-sm btn-primary">Add New</a> 
</div>
<?php //echo '<pre>'; print_r($data['courses']); die; ?>
<table class="table">
  <thead>
    <tr>
      <th>Course Name</th>
      <th>Date</th>
      <th>Action</th> <!-- Added header for the "Register" button -->
    </tr>
  </thead>
  <tbody>
    <?php if (isset($data['courses']) && is_array($data['courses'])) : ?>
    <?php foreach ($data['courses'] as $course) : ?>
    <tr>
      <td><?php echo isset($course->course_name) ? $course->course_name : 'N/A'; ?></td>
      <td><?php echo isset($course->date) ? $course->date : 'N/A'; ?></td>
      <td>
          <a href="#remove_<?php echo $course->id; ?>" data-toggle='modal' title="Remove" class="btn btn-sm btn-danger">Delete</a>

          <div class="modal fade" id="remove_<?php echo $course->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header"> 
                  <h3 class="modal-title">Remove</h3>
                </div>
                <div class="modal-body">Are you sure, you want to remove this?</div>
                <div class="modal-footer">
                <a href="<?php echo URLROOT; ?>/pages/classdelete/<?php echo $course->id; ?>" class="btn btn-sm btn-danger">Confirm</a>
                  <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                </div>
              </div>
            </div>
          </div>

      </td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>
    <tr>
      <td colspan="3">No class available</td>
    </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>