<?php include "header.php" ?>

<?php

if(!isset($_GET['token'])){


    header('Location: ../index.php');


}

$message_suc = "Verification Successful";
$message_inv = "Invalid verification token!";

require '../classes/config.php';
require '../vendor/autoload.php';

$token = $_GET['token'];

// Check if the token exists in the database
$query = "SELECT * FROM users WHERE token = '{$token}'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    // Token is valid
    // Implement your verification logic here
    // For example, update the user's status to "verified" or perform any other necessary actions
} else {
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
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px; border:solid 1px; border-color: #C153ED; background-color: #27293D">
          <div class="card-body p-4 p-md-5">

          <?php if(!isset($emailSent)): ?>

          
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><?php echo $message_suc ?> </h3>
            <p class="mb-4 pb-2 pb-md-0 mb-md-5">Return to login and continue adding your kid.</p>
            <form method="post" action="">

              <div class="row">
                <div class="mt-4 pt-2">
                <a href="<?php echo $DOMAIN?>/xogos-gaming/includes/login.php" style="background: rgb(223,78,204);
                background: linear-gradient(90deg, rgba(223,78,204,1) 0%, rgba(223,78,204,1) 35%, rgba(192,83,237,1) 62%); border:none;" class="btn btn-primary btn">Continue</a>
              </div>
              <input type="hidden" class="hide" name="token" id="token" value="">
              </div>

            </form>

            <?php else: ?>

                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Check your inbox!</h3>

            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
