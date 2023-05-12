<?php include "includes/reg_header.php"; ?>

<?php
// Add the list of avatar image files to an array
$avatar_images = glob("assets/img/avatars/*.png");
?>

<?php

$success = "";
$message = "";

if(isset($_POST['add_student'])) {

    $firstname       = $_POST['firstname'];
    $lastname        = $_POST['lastname'];
    $email           = $_POST['email'];
    $username        = $_POST['username'];
    $password        = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $city            = $_POST['city'];
    $state           = $_POST['state'];
    $img             = $_POST['img'];

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
    $city      = mysqli_real_escape_string($connection, $city);
    $state     = mysqli_real_escape_string($connection, $state);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12) );

    $query  = "INSERT INTO users(firstname, lastname, img, email, username, password, city, state, student_id, user_role) ";
    $query .= "VALUES('{$firstname}', '{$lastname}', '{$img}', '{$email}', '{$username}', '{$password}', '{$city}', '{$state}', '{$_SESSION['parent_id']}', 'student' ) ";

    // execute query
        $register_student_query = mysqli_query($connection, $query);
        if(!$register_student_query) {
          die("QUERY FAILED" . mysqli_error($connection) . '' . mysqli_errno($connection));
        } else {
          $success = true;
        }
    
    update_kids_count();
    update_kids_count_byteacher();
    $data_register_lightning_round = [
      'username'=>$username,
      'first_name'=>$firstname,
      'last_name'=>$lastname,
      'email'=>$email,
      'password'=>$_POST['password'],
      'password_confirmation'=>$_POST['password'],
      'country_id'=>1,
      'parent_id'=>$_SESSION['parent_id'] 
    ];
    $token = register_lighting_round($data_register_lightning_round);

    $query="UPDATE users SET token_lr='{$token}' WHERE username='{$username}'";
    $update= mysqli_query($connection, $query); 
   
    $message = "";

  }

}

}

// UPDATE KIDS COUNT

if(isset($_SESSION['add_student'])) {
  
  $the_user_id = $_SESSION['user_id'];
  $kids_count  = $_SESSION['kids_count'];
  
      $query = "UPDATE users SET kids_count = kids_count + 1 WHERE user_id = '{$the_user_id}' ";
  
      $edit_user_query = mysqli_query($connection, $query);
  
      confirm($edit_user_query);
      update_kids_count();
    update_kids_count_byteacher();

      }

?>

<style>
    .content {
        padding:50px;
    }
    .avatar-images {
        display: flex;
        flex-wrap: wrap;
    }
    .avatar-images label {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 10px 20px;
        cursor: pointer;
    }
    .avatar-images input[type="radio"] {
        display: none;
    }
    .avatar-images img {
        height: 100px;
        width: 100px;
        border: 2px solid transparent;
        border-radius: 50%;
        transition: border-color 0.2s ease-in-out;
    }
    .avatar-images input[type="radio"]:checked + img {
        border-color: #C153ED;
    }
</style>

      <!-- End Navbar -->
      <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7" style="padding-bottom: 50px;">
        <div class="card shadow-5-strong card-registration" style="border-radius: 15px; border:solid 1px; border-color: #C153ED; background-color: #27293D">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Register Kid</h3>
            <h5 class="mb-4 pb-2 pb-md-0 mb-md-5">Personal Information</h5>
            <form method="post" enctype='multipart/form-data' class="needs-validation" novalidate>
            <div class="row">
              <div class="">
                <div class="form-group">
                  <label>Select an avatars:</label>
                  <div class="avatar-images">
                      <?php foreach ($avatar_images as $img): ?>
                          <label>
                              <input type="radio" name="img" value="<?php echo basename($img); ?>">
                              <img src="<?php echo $img; ?>" alt="<?php echo basename($img); ?>">
                          </label>
                      <?php endforeach; ?>
                  </div>
              </div>

              </div>
          </div>
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
                <div class="col-md-8 mb-3">
                  <label for="validationCustom03">City</label>
                  <input type="text" name="city" class="form-control" id="validationCustom03" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationCustom04">State</label>
                  <select name="state" class="custom-select form-control" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                  <?php 
                                    
                  $query = "SELECT * FROM state ";
                  $select_state = mysqli_query($connection, $query);

                  while ($row = mysqli_fetch_assoc($select_state)) {
                  $id   = $row['id'];
                  $name = $row['name'];

                  echo "<option>$name</option>";

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
              <input style="background: rgb(223,78,204);
                background: linear-gradient(90deg, rgba(223,78,204,1) 0%, rgba(223,78,204,1) 35%, rgba(192,83,237,1) 62%); border:none;" class="btn btn-primary btn" type="submit" name="add_student" value="Register">
            </form>

            <?php include "success_modal.php" ?>



            <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
              'use strict';
              window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();
            </script>

<?php if ($success) { ?>
  <script>
    $(document).ready(function() {
      $('#successModal').modal('show');
    });
  </script>
<?php } ?>

          </div>
          <?php include "includes/footer.php" ?>
        </div>
      </div>
    </div>
  </div>
</section>
      