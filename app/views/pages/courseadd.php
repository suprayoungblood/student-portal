<?php require APPROOT . '/views/inc/header.php'; ?>

 

<div class="card-header d-flex align-items-center">
  <h4 style="width: 100%;" class="card-title mb-0 flex-grow-1">Add Course</h4> 
  &nbsp;<a style="float:right;" href="<?php echo URLROOT; ?>/pages/course" class="btn btn-sm btn-primary">Back</a> 
</div> 


<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
 
      
      <form action="<?php echo URLROOT; ?>/pages/courseadd" method="post">
       
      <div class="form-group">
          <label for="course_name">Course: <sup>*</sup></label>
          <select name="course_name" class="form-control form-control-lg <?php echo (!empty($data['course_name_err'])) ? 'is-invalid' : ''; ?>">
              <option value="">Select Course</option><?php
              foreach($data['courses'] as $val) { //echo '<pr>'; print_r($val->CourseName); die; ?>
               <option value="<?php echo $val->CourseName; ?>"><?php echo $val->CourseName; ?></option><?php
              } ?>
          </select> 
          <span class="invalid-feedback"><?php echo $data['course_name_err']; ?></span>
        </div>

        <div class="form-group">
          <label for="description">Description: <sup>*</sup></label>
          <textarea name="description" rows="5" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" value=""><?php echo $data['description']; ?></textarea>
          <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
        </div>
         
        <div class="row">
          <div class="col">
            <input type="submit" value="Save" class="btn btn-success btn-block">
          </div> 
        </div>
      </form>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>