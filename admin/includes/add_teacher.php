<?php

if(isset($_POST['add_teacher'])) {

  $firstname = escpae($_POST['firstname']);
  $lastname  = escape($_POST['lastname']);
  $email     = escape($_POST['email']);
  $username  = escape($_POST['username']);
  $password  = escape($_POST['password']);
  $address   = escape($_POST['address']);
  $city      = escape($_POST['city']);
  $zip       = escape($_POST['zip']);


    if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) ) {

    $firstname = mysqli_real_escape_string($connection, $firstname);
    $lastname  = mysqli_real_escape_string($connection, $lastname);
    $email     = mysqli_real_escape_string($connection, $email);
    $username  = mysqli_real_escape_string($connection, $username);
    $password  = mysqli_real_escape_string($connection, $password);
    $address   = mysqli_real_escape_string($connection, $address);
    $city      = mysqli_real_escape_string($connection, $city);
    $zip       = mysqli_real_escape_string($connection, $zip);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12) );

    $query  = "INSERT INTO users(firstname, lastname, email, username, password, address, city, zip, teacher_id, user_role) ";
    $query .= "VALUES('{$firstname}', '{$lastname}', '{$email}', '{$username}', '{$password}', '{$address}', '{$city}', '{$zip}', RAND()*(999-1)+5, 'teacher' ) ";
    $register_teacher_query = mysqli_query($connection, $query);

    if(!$register_teacher_query) {
        die("QUERY FAILED" . mysqli_error($connection) . '' . mysqli_errno($connection));
    }
    update_kids_count();
    update_kids_count_byteacher();
    $message = "Your registration was successful";

  } else {

    $message = "Fields cannot be empty";

  }

  header("refresh:2;url=teachers.php?source=all_teachers");

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
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 pr-md-1">
                <div class="form-group">
                <label class="input-modal">Username</label>
                <input type="text" class="form-control input-modal" placeholder="Username" name="username">
                </div>
            </div>
            <div class="col-md-6 px-md-1">
                <div class="form-group">
                <label class="input-modal">Password</label>
                <input type="password" class="form-control input-modal" placeholder="Password" name="password">
                </div>
            </div>
            </div>
            <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label class="input-modal">Email</label>
                        <input type="email" class="form-control input-modal" placeholder="Email" name="email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label class="input-modal">First Name</label>
                        <input type="text" class="form-control input-modal" placeholder="First Name" name="firstname">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label class="input-modal">Last Name</label>
                        <input type="text" class="form-control input-modal" placeholder="Last Name" name="lastname">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="input-modal">Address</label>
                        <input type="text" class="form-control input-modal" placeholder="Address" name="address">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label class="input-modal">City</label>
                        <input type="text" class="form-control input-modal" placeholder="City" name="city">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label class="input-modal">Postal Code</label>
                        <input type="number" class="form-control input-modal" placeholder="ZIP Code" name="zip">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                    <input type="submit" name="add_teacher" class="btn btn-primary" value="Add Teacher">
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>

