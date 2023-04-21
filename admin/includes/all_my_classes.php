<?php include "includes/sidebar.php" ?>
<?php include "includes/navbar.php"; ?>
<?php include "add_class_students.php" ?>
<div class="content">
<div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> My Classes</h4>
                <!-- ADD CLASS MODAL -->
                <?php if(is_teacher()): ?>
                  <?php include "add_class.php" ?>
                  <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newClass">Add Class</button>
                  </div>
                  <?php endif ?>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th class="text-right">Add Students</th>
                                <th class="text-right">Edit</th>
                                <th class="text-right">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        
                        $query = "SELECT * FROM classes WHERE class_teacher_id =".loggedInUserIdTeacher()." ORDER BY class_id DESC";
                        $select_student = mysqli_query($connection, $query);
                
                        while ($row = mysqli_fetch_assoc($select_student)) {
                        $class_id  = $row['class_id'];
                        $class_subject = $row['class_subject'];

                        echo "<tr>";
                            echo "<td>$class_id</td>";
                            echo "<td>$class_subject</td>";
                            echo "<td class='text-right'><a href='#' class='add-students-btn' data-toggle='modal' data-target='#newStudents' data-class-id='$class_id'>Add</a></td>";                              echo "<td class='text-right'><a href='my_classes.php?source=edit_class&edit_class={$class_id}'>Edit</a></td>";  
                            echo "<td class='text-right'><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \"href='my_classes.php?delete={$class_id}'>Delete</a></td>";  
                            echo "</tr>";
                        }
                        
                        ?>
                   </tbody>
                   </table>

                   <?php 
                   
                   if(isset($_GET['delete'])) {

                    $class_id = $_GET['delete'];

                    $query = "DELETE FROM classes WHERE class_id = {$class_id}";
                    $delete_query = mysqli_query($connection, $query);
                    header("Location: my_classes.php");


                   }
                   
                   
                   ?>

                </div>
              </div>
            </div>
          </div>
</div>







