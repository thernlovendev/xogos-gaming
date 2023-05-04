<?php include "includes/sidebar.php" ?>
<?php include "includes/navbar.php" ?>
<?php include "includes/add_class_students.php"?>
<?php

///EDIT THE CLASS NAME///

if(isset($_GET['edit_class'])) {

  $the_class_id = $_GET['edit_class'];

  $query = "SELECT * FROM classes WHERE class_id = '{$the_class_id}' ";
  $select_class_profile_query = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_class_profile_query)) {

    $class_id      = $row['class_id'];
    $class_subject = $row['class_subject'];


  }

}


if(isset($_POST['edit_class'])) {
  
    $class_subject    = $_POST['class_subject'];
    $the_class_id     = $_POST['class_id'];
  
    $query = "UPDATE classes SET ";
    $query .= "class_subject    = '{$class_subject}' ";
    $query .= "WHERE class_id   = '{$the_class_id}' ";
    
    $edit_user_query = mysqli_query($connection, $query);
        
    if (!$edit_user_query) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
  
    $message = "Class Updated!";
  
    header("Location: refresh:2;url=my_classes.php?source=edit_class&edit_class=" . $_GET['edit_class']);
    exit();  
  } else {
    $message = '';
  }

///END EDIT CLASS NAME///

///EDIT STUDENTS IN CLASS///

if(isset($_GET['edit_class'])) {

  $the_class_id = $_GET['edit_class'];

  $query = "SELECT classes.class_id, classes.class_subject, enrollments.student_id, enrollments.firstname, enrollments.lastname
            FROM classes
            INNER JOIN enrollments ON classes.class_id = enrollments.class_id
            INNER JOIN users ON enrollments.student_id = users.user_id
            WHERE classes.class_id = {$the_class_id}";

  $select_student = mysqli_query($connection, $query);

  // check for query error
  if(!$select_student) {
      die("QUERY FAILED" . mysqli_error($connection));
  }

}

///DELETE CLASS///
                   
if(isset($_GET['delete'])) {
  $class_id = $_GET['delete'];

  // Display a confirmation popup before deleting the data
  echo '<script>if(confirm("Are you sure you want to delete this class?")){';
  
  $query = "DELETE FROM enrollments WHERE class_id = {$class_id}";
  $delete_enrollments_query = mysqli_query($connection, $query);

  $query = "DELETE FROM classes WHERE class_id = {$class_id}";
  $delete_query = mysqli_query($connection, $query);

  // Check if the query executed successfully
  if($delete_query) {
    header("Location: my_classes.php");
  } else {
    echo "Error deleting class.";
  }

  echo '}</script>';
}
?>

      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
          <?php if(is_teacher()): ?>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Edit Class</h4>
                <h3 class="text-center" style="color:green";> <?php echo $message ?> </h3>
              </div>
              <div class="card-body">
                  <!-- ----------------- -->
                  <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                  <input type="hidden" name="class_id" value="<?php echo $class_id ?>">

                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Class Name</label>
                        <input type="text" class="form-control" placeholder="Class Subject" name="class_subject" value="<?php echo $class_subject; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="edit_class" value="Update Class">
                  </div>
                </form>
                <a class="text-danger" href="my_classes.php?delete=<?php echo $class_id; ?>" onclick="return confirm('Are you sure you want to delete this class?')">Delete Class</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> My Students</h4>
                <!-- ADD CLASS MODAL -->
                  <div class="form-group">
                  <?php include "add_student_to_class.php" ?>
                    <button type='button' class='btn btn-primary add-students-btn' data-toggle='modal' data-target='#newStudentsEditClass' data-class-id='$the_class_id'>Add Students</button>
                  </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th class="text-right">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        
                        while ($row = mysqli_fetch_assoc($select_student)) {
                        $student_id  = $row['student_id'];
                        $firstname  = $row['firstname'];
                        $lastname  = $row['lastname'];

                        echo "<tr>";
                            echo "<td>$student_id</td>";
                            echo "<td>$firstname $lastname</td>";
                            echo "<td class='text-right'><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \"href='my_classes.php?source=edit_class&edit_class={$class_id}&delete={$student_id}'>Delete</a></td>";
                            echo "</tr>";
                        }
                        
                        ?>
                   </tbody>
                   </table>

                   <?php 
                   
                   if(isset($_GET['delete'])) {

                    $student_id = $_GET['delete'];
                    $class_id = $_GET['edit_class'];
                
                    $query = "DELETE FROM enrollments WHERE student_id = $student_id AND class_id = $class_id";
                    $delete_enrollments_query = mysqli_query($connection, $query);
                
                    // Check if the query executed successfully
                    if($delete_enrollments_query) {
                        header("Location: my_classes.php?source=edit_class&edit_class=$class_id");
                    } else {
                        echo "Error deleting student from class.";
                    }
                }
                
                   
                   
                   ?>

                </div>
              </div>
            </div>
            <?php endif ?>
            <?php if(is_student()): ?>
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> All Students</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        
                        while ($row = mysqli_fetch_assoc($select_student)) {
                        $student_id  = $row['student_id'];
                        $firstname  = $row['firstname'];
                        $lastname  = $row['lastname'];

                        echo "<tr>";
                            echo "<td>$student_id</td>";
                            echo "<td>$firstname $lastname</td>";
                            echo "</tr>";
                        }
                        
                        ?>
                   </tbody>
                   </table>
                </div>
              </div>
            </div>
            <?php endif ?>
          </div>
                  </div>