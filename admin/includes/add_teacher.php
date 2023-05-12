<?php

$message = "";

if(isset($_POST['add_teacher'])) {

  $firstname       = escape($_POST['firstname']);
  $lastname        = escape($_POST['lastname']);
  $email           = escape($_POST['email']);
  $username        = escape($_POST['username']);
  $password        = escape($_POST['password']);
  $repeat_password = escape($_POST['repeat_password']);
  $address         = escape($_POST['address']);
  $city            = escape($_POST['city']);
  $state           = escape($_POST['state']);
  $zip             = escape($_POST['zip']);


  if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($repeat_password) ) {

    // check if passwords match
    if($password !== $repeat_password) {
      $message = "Passwords do not match";
    } else {

    $firstname = mysqli_real_escape_string($connection, $firstname);
    $lastname  = mysqli_real_escape_string($connection, $lastname);
    $email     = mysqli_real_escape_string($connection, $email);
    $username  = mysqli_real_escape_string($connection, $username);
    $password  = mysqli_real_escape_string($connection, $password);
    $address   = mysqli_real_escape_string($connection, $address);
    $city      = mysqli_real_escape_string($connection, $city);
    $state     = mysqli_real_escape_string($connection, $state);
    $zip       = mysqli_real_escape_string($connection, $zip);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12) );

    $query  = "INSERT INTO users(firstname, lastname, email, username, password, address, city, state, zip, teacher_id, user_role) ";
    $query .= "VALUES('{$firstname}', '{$lastname}', '{$email}', '{$username}', '{$password}', '{$address}', '{$city}', '{$state}', '{$zip}', RAND()*(999-1)+5, 'teacher' ) ";

    // execute query
    $register_teacher_query = mysqli_query($connection, $query);
    if(!$register_teacher_query) {
      die("QUERY FAILED" . mysqli_error($connection) . '' . mysqli_errno($connection));
    } else {
      $success = true;
    }

    if(!$register_teacher_query) {
        die("QUERY FAILED" . mysqli_error($connection) . '' . mysqli_errno($connection));
    }
    update_kids_count();
    update_kids_count_byteacher();
    $message = "Your registration was successful";

  }

  }
}

?>

<style>
    label, h5, input, select{
        color:black !important;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenterTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" enctype='multipart/form-data' class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationCustom01">First name</label>
                  <input type="text" name="firstname" class="form-control" id="validationCustom01" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationCustom02">Last name</label>
                  <input type="text" name="lastname" class="form-control" id="validationCustom02" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="validationCustom01">Email</label>
                  <input type="email" name="email" class="form-control" id="validationCustom01" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="validationCustom01">Address</label>
                  <input type="text" name="address" class="form-control" id="validationCustom01" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationCustom03">City</label>
                  <input type="text" name="city" class="form-control" id="validationCustom03" required>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="validationCustom03">ZIP</label>
                  <input type="text" name="zip" class="form-control" id="validationCustom03" required>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="validationCustom04">State</label>
                  <select name="state" class="custom-select form-control" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                  <?php 
                                    
                  $query = "SELECT * FROM state ";
                  $select_state = mysqli_query($connection, $query);

                  while ($row = mysqli_fetch_assoc($select_state)) {
                  $id   = $row['id'];
                  $code = $row['code'];

                  echo "<option>$code</option>";

                  }

                  ?>
                  </select>
                </div>
              </div>
              <h5 class="mb-4 pb-2 pb-md-0 mb-md-5">Login Information</h5>
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="validationCustom01">Username</label>
                  <input type="text" name="username" class="form-control" id="validationCustom01" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationCustom02">Password</label>
                  <input type="password" name="password" class="form-control" id="validationCustom02" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationCustom02">Repeat Password</label>
                  <input type="password" name="repeat_password" class="form-control" id="validationCustom02" required>
                  <label class="text-danger"><?php echo $message ?></label>
                </div>
              </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_teacher" class="btn btn-primary">Add Teacher</button>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>

