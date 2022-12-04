<?php
session_start();
$parent_id = $_SESSION['parent_id'];
$onlineUsers = ("DELETE FROM `users_online` WHERE `online_parent_username`='$parent_id'");
sleep(1);
unset($_SESSION['parent_username']);
unset($_SESSION['parent_id']);
session_destroy();
header('location: login.php');
?>