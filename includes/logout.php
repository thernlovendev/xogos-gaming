<?php session_start(); ?>

<?php 

$_SESSION['parent_username'] = null;
$_SESSION['parent_firstname'] = null;
$_SESSION['parent_lastname'] = null;

header("Location: login.php")

?>