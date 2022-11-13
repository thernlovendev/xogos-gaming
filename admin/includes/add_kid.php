<?php

if(isset($_POST['add_student'])) {

    $student_firstname = $_POST['student_firstname'];
    $student_lastname  = $_POST['student_lastname'];
    $student_email     = $_POST['student_email'];
    $username          = $_POST['student_username'];
    $password          = $_POST['student_password'];
    $student_address   = $_POST['student_address'];
    $student_city      = $_POST['student_city'];
    $student_zip       = $_POST['student_zip'];


    if(!empty($username) && !empty($student_firstname) && !empty($student_lastname) && !empty($student_email) && !empty($password) ) {

    $student_firstname = mysqli_real_escape_string($connection, $student_firstname);
    $student_lastname  = mysqli_real_escape_string($connection, $student_lastname);
    $student_email     = mysqli_real_escape_string($connection, $student_email);
    $studentusername   = mysqli_real_escape_string($connection, $username);
    $password          = mysqli_real_escape_string($connection, $password);
    $student_address   = mysqli_real_escape_string($connection, $student_address);
    $student_city      = mysqli_real_escape_string($connection, $student_city);
    $student_zip       = mysqli_real_escape_string($connection, $student_zip);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12) );

    $query  = "INSERT INTO students(student_firstname, student_lastname, student_email, student_username, student_password, student_address, student_city, student_zip, user_role, student_parent) ";
    $query .= "VALUES('{$student_firstname}', '{$student_lastname}', '{$student_email}', '{$username}', '{$password}', '{$student_address}', '{$student_city}', '{$student_zip}', 'student', '{$_SESSION['parent_id']}'  ) ";
    $register_student_query = mysqli_query($connection, $query);

    if(!$register_student_query) {
        die("QUERY FAILED" . mysqli_error($connection) . '' . mysqli_errno($connection));
    }
    
    $message = "Your registration was successful";

  } else {

    $message = "Fields cannot be empty";

  }

  header("refresh:2;url=user.php");

} else {
   $message = "";
}

?>

<style>
    .input-modal{
        color:black !important;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Kid</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 pr-md-1">
                <div class="form-group">
                <label class="input-modal">Username</label>
                <input type="text" class="form-control input-modal" placeholder="Username" name="student_username">
                </div>
            </div>
            <div class="col-md-6 px-md-1">
                <div class="form-group">
                <label class="input-modal">Password</label>
                <input type="password" class="form-control input-modal" placeholder="Password" name="student_password">
                </div>
            </div>
            </div>
            <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label class="input-modal">Email</label>
                        <input type="email" class="form-control input-modal" placeholder="Email" name="student_email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label class="input-modal">First Name</label>
                        <input type="text" class="form-control input-modal" placeholder="First Name" name="student_firstname">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label class="input-modal">Last Name</label>
                        <input type="text" class="form-control input-modal" placeholder="Last Name" name="student_lastname">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="input-modal">Address</label>
                        <input type="text" class="form-control input-modal" placeholder="Address" name="student_address">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label class="input-modal">City</label>
                        <input type="text" class="form-control input-modal" placeholder="City" name="student_city">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label class="input-modal">Postal Code</label>
                        <input type="number" class="form-control input-modal" placeholder="ZIP Code" name="student_zip">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                    <input type="submit" name="add_student" class="btn btn-primary" value="Add Kid">
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>

