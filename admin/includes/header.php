<?php include "db.php" ?>
<?php include "functions.php" ?>

<?php ob_start(); ?>
<?php session_start(); ?>
<?php $DOMAIN = "https://myxogos.com/admin/"; ?>

<?php 

if(isset($_SESSION['user_role'])) {


} else {

header("location: ../includes/login.php");


}

if($_SESSION['kids_count'] >= 1 OR $_SESSION['user_role'] == 'student' OR $_SESSION['user_role'] == 'admin') {


} else {

header("location: ../stripe-one/checkout.php");


}



?>
<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <!-- <link rel="icon" type="image/png" href="assets/img/favicon.png"> -->
  <title>
    XOGOS GAMING
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/styles.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">