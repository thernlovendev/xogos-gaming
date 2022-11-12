<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/navbar.php" ?>
<?php include "functions.php" ?>

<?php

if(isset($_SESSION['parent_username'])) {

    $parent_username = $_SESSION['parent_username'];

    $query = "SELECT * FROM parents WHERE parent_username = '{$parent_username}' ";

    $select_parent_profile_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_parent_profile_query)) {

      $parent_id        = $row['parent_id'];
      $parent_firstname = $row['parent_firstname'];
      $parent_lastname  = $row['parent_lastname'];
      $parent_email     = $row['parent_email'];
      $parent_phone     = $row['parent_phone'];
      $parent_username  = $row['parent_username'];
      $parent_password  = $row['parent_password'];
      $parent_address   = $row['parent_address'];
      $parent_city      = $row['parent_city'];
      $parent_zip       = $row['parent_zip'];


    }

    
}

if(isset($_POST['edit_parent'])) {
    
  $parent_firstname = $_POST['parent_firstname'];
  $parent_lastname  = $_POST['parent_lastname'];
  $parent_email     = $_POST['parent_email'];
  $parent_phone     = $_POST['parent_phone'];
  $parent_username  = $_POST['parent_username'];
  $parent_password  = $_POST['parent_password'];
  $parent_address   = $_POST['parent_address'];
  $parent_city      = $_POST['parent_city'];
  $parent_zip       = $_POST['parent_zip'];
    

        $query = "UPDATE parents SET ";
        $query .= "parent_firstname      = '{$parent_firstname}', ";
        $query .= "parent_lastname       = '{$parent_lastname}', ";
        $query .= "parent_email          = '{$parent_email}', ";
        $query .= "parent_phone          = '{$parent_phone}', ";
        $query .= "parent_username       = '{$parent_username}', ";
        $query .= "parent_password       = '{$parent_password}', ";
        $query .= "parent_address        = '{$parent_address}', ";
        $query .= "parent_city           = '{$parent_city}', ";
        $query .= "parent_zip            = '{$parent_zip}' ";
        $query .= "WHERE parent_username = {$parent_username} ";
    
        $edit_parent_query = mysqli_query($connection, $query);
    
        confirm($edit_parent_query);
        

}




?>

      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">

                <!-- ADD KID MODAL -->
                <?php include "includes/add_kid.php" ?>

                <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add Kid</button>
                  </div>

                  <!-- ----------------- -->

                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="parent_username" value="<?php echo $parent_username; ?>">
                      </div>
                    </div>
                    <div class="col-md-6 px-md-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="parent_password" value="<?php echo $parent_password; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="parent_email" value="<?php echo $parent_email; ?>">
                      </div>
                    </div>
                    <div class="col-md-6 px-md-1">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" placeholder="Number" name="parent_phone" value="<?php echo $parent_phone; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="parent_firstname" value="<?php echo $parent_firstname; ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="parent_lastname" value="<?php echo $parent_lastname; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="parent_address" value="<?php echo $parent_address; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" name="parent_city" value="<?php echo $parent_city; ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code" name="parent_zip" value="<?php echo $parent_zip; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="edit_parent" value="Update Profile">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> My Kids</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        
                        $query = "SELECT * FROM students ORDER BY student_id ASC";
                        $select_student = mysqli_query($connection, $query);
                
                        while ($row = mysqli_fetch_assoc($select_student)) {
                        $student_id        = $row['student_id'];
                        $student_firstname = $row['student_firstname'];
                        $student_lastname  = $row['student_lastname'];

                        echo "<tr>";
                            echo "<td>$student_id</td>";
                            echo "<td>$student_firstname $student_lastname</td>";
                            echo "<td><a href='cams.php?source=edit_widget&c_id={$student_id}'>Edit</a></td>";  
                            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \"href='cams.php?delete={$student_id}'>Delete</a></td>";  
                            echo "</tr>";
                        }
                        
                        ?>
                   </tbody>
                   </table>
                </div>
              </div>
            </div>
          </div>
</div>

      <?php include "includes/footer.php" ?>
      