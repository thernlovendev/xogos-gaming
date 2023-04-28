<?php
include "includes/sidebar.php";
include "includes/navbar.php";
?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> My Classes</h4>
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
                                    <th>Attendees</th>
                                    <th class="text-right">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query = "SELECT classes.class_id, classes.class_subject, COUNT(enrollments.student_id) AS num_attendees
                                          FROM classes 
                                          LEFT JOIN enrollments 
                                          ON classes.class_id = enrollments.class_id 
                                          WHERE classes.class_teacher_id = ".loggedInUserIdTeacher()." 
                                          GROUP BY classes.class_id 
                                          ORDER BY classes.class_id DESC";
                                $select_student = mysqli_query($connection, $query);
                
                                while ($row = mysqli_fetch_assoc($select_student)) {
                                    $class_id  = $row['class_id'];
                                    $class_subject = $row['class_subject'];
                                    $num_attendees = $row['num_attendees'];

                                    echo "<tr>";
                                    echo "<td>$class_id</td>";
                                    echo "<td>$class_subject</td>";
                                    echo "<td>$num_attendees</td>";
                                    echo "<td class='text-right'><a href='my_classes.php?source=edit_class&edit_class={$class_id}'>Edit</a></td>";  
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php 
                        if(isset($_GET['delete'])) {
                            $class_id = $_GET['delete'];
                            $query = "DELETE FROM enrollments WHERE class_id = {$class_id}";
                            $delete_enrollments_query = mysqli_query($connection, $query);

                            $query = "DELETE FROM classes WHERE class_id = {$class_id}";
                            $delete_query = mysqli_query($connection, $query);
                    
                            if($delete_query) {
                                header("Location: my_classes.php");
                            } else {
                                echo "Error deleting class.";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
