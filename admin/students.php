<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/navbar.php" ?>

<div class="content">
<div class="row">
          <div class="col-md-12">
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
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        
                        $query = "SELECT * FROM students ORDER BY student_id DESC ";
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