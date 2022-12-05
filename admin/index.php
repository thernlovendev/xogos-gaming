<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/navbar.php" ?>
  
    
      <!-- End Navbar -->
      <div class="content">
      <div class="row">
      <?php include "includes/profile.php" ?>

      <?php include "includes/performance.php" ?>
      <div class="row">
      <?php if(is_student()): ?>
      <?php include "includes/friends_online.php" ?>
      <?php endif ?>

      <?php if(is_teacher()): ?>
      <?php include "includes/students_online.php" ?>
      <?php endif ?>

      <?php if(is_parent()): ?>
      <?php include "includes/kids_online.php" ?>
      <?php endif ?>

      <?php include "includes/top_players.php" ?>

      <?php include "includes/top_games.php" ?>
          
        </div>
      </div>
      <?php include "includes/footer.php" ?>