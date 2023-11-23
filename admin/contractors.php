<?php include "includes/header.php"; ?>

<?php 

                    
                    if(isset($_GET ['source'])) {

                        $source = $_GET ['source'];
                    } else {
                        $source = ' ';
                    }

                    switch($source) {

                        case 'add_contractor';
                        include "includes/add_contractor.php";
                        break;

                        case 'edit_contractor';
                        include "includes/edit_contractor.php";
                        break;

                        default:
                        include "includes/all_contractors.php";
                        break;
                    }
                    
                    ?>
<?php include "includes/footer.php" ?>