<?php include "../admin/includes/db.php"; ?>
<?php session_start(); ?>


<?php 

if(isset($_POST['login'])) {

  $parent_username = $_POST['parent_username'];
  $parent_password = $_POST['parent_password'];

  $parent_username = mysqli_real_escape_string($connection, $parent_username);
  $parent_password = mysqli_real_escape_string($connection, $parent_password);

  $query = "SELECT * FROM parents WHERE parent_username = '{$parent_username}' ";
  $select_parent_query = mysqli_query($connection, $query);

  if(!$select_parent_query) {
      die("QUERY FAILED" . mysqli_error($connection));
  }

  while($row = mysqli_fetch_array($select_parent_query)) {

    $db_parent_id        = $row['parent_id'];
    $db_parent_username  = $row['parent_username'];
    $db_parent_password  = $row['parent_password'];
    $db_parent_firstname = $row['parent_firstname'];
    $db_parent_lastname  = $row['parent_lastname'];
    $db_user_role        = $row['user_role'];
  }

//   $password = crypt($password, $db_user_password);

if (password_verify($parent_password,$db_parent_password)) {

  $_SESSION['parent_id']        = $db_parent_id;
  $_SESSION['parent_username']  = $db_parent_username;
  $_SESSION['parent_firstname'] = $db_parent_firstname;
  $_SESSION['parent_lastname']  = $db_parent_lastname;
  $_SESSION['user_role']        = $db_user_role;

  
    header("Location: ../admin/index.php");

} else {
    header("Location: login.php");
}


}







?>