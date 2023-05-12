<?php

if(isset($_POST['add_students'])) {

    // Get the class ID and array of student IDs from the form
    $class_id   = $_POST['class_id'];
    $student_id = $_POST['student_id'];

    // Check if class_id is not empty
    if(!empty($class_id)) {

        // Loop through the array of student IDs and insert a new enrollment for each one
        foreach ($student_id as $student_id) {

          // Get the firstname of the student from the users table
          $query = "SELECT firstname, lastname FROM users WHERE user_id = $student_id";
          $result = mysqli_query($connection, $query);
          $row = mysqli_fetch_assoc($result);
          $firstname = $row['firstname'];
          $lastname = $row['lastname'];

            $query = "INSERT INTO enrollments (student_id, firstname, lastname, class_id) VALUES ('$student_id', '$firstname', '$lastname', '$class_id')";
            $add_enrollment_query = mysqli_query($connection, $query);

            if (!$add_enrollment_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }

        // Redirect the user to a different page
        header("Location: my_classes.php?source=edit_class&edit_class=" . $_GET['edit_class']);
        exit();
    } else {
        echo "Class ID cannot be empty.";
    }
}
?>




<style>
    .content {
        padding:50px;
    }
    .input-modal{
        color:black !important;
    }
</style>


<!-- Modal -->
<div class="modal fade" id="newStudentsEditClass" tabindex="-1" role="dialog" aria-labelledby="newStudentsEditClass" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newStudentsEditClass">Add Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="tim-icons icon-simple-remove"></i>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                      <input type="hidden" name="class_id" id="class_id" value="<?php echo $class_id ?>">
                      <label for="users">Select Students</label>
                    <select multiple name="student_id[]" class="form-control" id="student_id">
                    <?php 
            
                    $query = "SELECT * FROM users WHERE t_student_id =".loggedInUserIdTeacher()." ORDER BY student_id DESC";
                    $select_user = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_user)) {
                    $user_id = $row['user_id'];
                    $firstname = $row['firstname'];
                
                    echo "<option class='input-modal' value='{$user_id}'>{$firstname}</option>";

                      }
                
                    ?>
                    </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" id="add-students-btn" class="btn btn-primary" name="add_students" value="Add Student">
      </div>
                </form>
      </div>
    </div>
  </div>

</div>