<?php include "header.php" ?>

<?php

if(isset($_POST['add_parent'])) {

    $parent_firstname = $_POST['parent_firstname'];
    $parent_lastname  = $_POST['parent_lastname'];
    $parent_email     = $_POST['parent_email'];
    $parent_phone     = $_POST['parent_phone'];
    $username  = $_POST['parent_username'];
    $password  = $_POST['parent_password'];
    $parent_address   = $_POST['parent_address'];
    $parent_city      = $_POST['parent_city'];
    $parent_zip       = $_POST['parent_zip'];
    $parent_kids      = $_POST['parent_kids'];


    if(!empty($username) && !empty($parent_firstname) && !empty($parent_lastname) && !empty($parent_email) && !empty($password) ) {

    $parent_firstname = mysqli_real_escape_string($connection, $parent_firstname);
    $parent_lastname  = mysqli_real_escape_string($connection, $parent_lastname);
    $parent_email     = mysqli_real_escape_string($connection, $parent_email);
    $parent_phone     = mysqli_real_escape_string($connection, $parent_phone);
    $username  = mysqli_real_escape_string($connection, $username);
    $password  = mysqli_real_escape_string($connection, $password);
    $parent_address   = mysqli_real_escape_string($connection, $parent_address);
    $parent_city      = mysqli_real_escape_string($connection, $parent_city);
    $parent_zip       = mysqli_real_escape_string($connection, $parent_zip);
    $parent_kids      = mysqli_real_escape_string($connection, $parent_kids);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12) );

    $query  = "INSERT INTO parents(parent_firstname, parent_lastname, parent_email, parent_phone, parent_username, parent_password, parent_address, parent_city, parent_zip, parent_kids, user_role) ";
    $query .= "VALUES('{$parent_firstname}', '{$parent_lastname}', '{$parent_email}', '{$parent_phone}', '{$username}', '{$password}', '{$parent_address}', '{$parent_city}', '{$parent_zip}', '{$parent_kids}', 'parent' ) ";
    $register_parent_query = mysqli_query($connection, $query);

    if(!$register_parent_query) {
        die("QUERY FAILED" . mysqli_error($connection) . '' . mysqli_errno($connection));
    }
    
    $message = "Your registration was successful";

  } else {

    $message = "Fields cannot be empty";

  }

  header("refresh:2;url=login.php");

} else {
   $message = "";
}

?>

<style>
  body {
    background-color: #1E1E2E;
    font-family: "Poppins";
    color:white;
  }

  h3, h5 {
    font-weight: 300 !important;
  }

  input {
    background-color: #27293D !important;
    border: 1px solid #C153ED !important;
    color: white !important;
  }

  label {
    color: #e5e5e5 !important;
  }

  .form-label {
    margin-top:0.5rem !important;
  }

</style>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7" style="padding-bottom: 50px;">
        <div class="card shadow-5-strong card-registration" style="border-radius: 15px; border:solid 1px; border-color: #C153ED; background-color: #27293D">
          <div class="card-body p-4 p-md-5">
          <h6 class="text-center" style="color:green";> <?php echo $message ?> </h6>
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Register</h3>
            <h5 class="mb-4 pb-2 pb-md-0 mb-md-5">Personal Information</h5>
            <form method="post" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="parent_firstname" id="firstName" class="form-control form-control-lg" />
                    <label class="form-label shadow-5-strong" for="firstName">First Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="parent_lastname" id="lastName" class="form-control form-control-lg" />
                    <label class="form-label" for="lastName">Last Name</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="parent_email" id="firstName" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">Email</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="parent_phone" id="lastName" class="form-control form-control-lg" />
                    <label class="form-label" for="lastName">Phone Number</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-12 mb-4">

                  <div class="form-outline">
                    <input type="text" name="parent_address" id="firstName" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">Address</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="parent_city" id="firstName" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">City</label>
                  </div>

                </div>

                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="parent_zip" id="firstName" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">ZIP</label>
                  </div>

                </div>
              </div>

              <h5 class="mb-4 pb-2 pb-md-0 mb-md-5">Login Information</h5>

              <div class="row">
                <div class="col-md-4 mb-5">

                  <div class="form-outline">
                    <input type="text" name="parent_username" id="firstName" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">Username</label>
                  </div>

                </div>

                <div class="col-md-4 mb-5">

                  <div class="form-outline">
                    <input type="password" name="parent_password" id="firstName" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">Password</label>
                  </div>

                </div>

                <div class="col-md-4 mb-4">

                  <div class="form-outline">
                    <input type="number" name="parent_kids" id="firstName" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">How many kids?</label>
                  </div>

                </div>
              </div>

              <div class="mt-4 pt-2">
                <input style="background: rgb(223,78,204);
                background: linear-gradient(90deg, rgba(223,78,204,1) 0%, rgba(223,78,204,1) 35%, rgba(192,83,237,1) 62%); border:none;" class="btn btn-primary btn-lg" type="submit" name="add_parent" value="Register" />
              </div>

              <div class="row">
                <div class="ml-auto mr-auto" style="margin-top: 0.5rem";>
                  <a href="login.php">Or Login</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>