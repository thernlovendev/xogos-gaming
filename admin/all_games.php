<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/navbar.php"; ?>

<?php 
$kids_count = count_records(get_all_user_kids());
?>

<div class="content">
<div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> All Games</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                      <td>123</td>
                      <td>Historical Conquest</td>
                      <td class='text-right'><a href=''>Play</a></td>
                      </tr>
                
                   </tbody>
                   </table>

                   <?php 
                   
                   if(isset($_GET['delete'])) {

                    $client_id = $_GET['delete'];

                    $query = "DELETE FROM users WHERE user_id = {$user_id}";
                    $delete_query = mysqli_query($connection, $query);
                     
        update_kids_count();
        update_kids_count_byteacher();
                    header("Location: my_kids.php");


                   }
                   
                   
                   ?>

                </div>
              </div>
            </div>
          </div>
</div>