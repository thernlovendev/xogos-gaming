<?php 

function escape($string) {

    global $connection;

    return mysqli_real_escape_string($connection, trim($string));
}

function insert_categories() {

    global $connection;

    if (isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUES('{$cat_title}') ";

            $create_category_query = mysqli_query($connection, $query);

            if (!$create_category_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }


}

function find_all_categories() {
    global $connection;
    
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>EDIT</a></td>";
        echo "</tr>";

        }
    
}

function delete_categories() {
    global $connection;

        if (isset($_GET['delete'])) {
            $the_cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");
            }
}

function insert_menus() {

    global $connection;

    if (isset($_POST['submit'])) {

        $menu = $_POST['menu'];
        $link = $_POST['link'];

        if ($menu == "" || empty($menu)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO footer_menu(menu, link) ";
            $query .= "VALUES('{$menu}', '{$link}') ";

            $create_menu_query = mysqli_query($connection, $query);

            if (!$create_menu_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }


}

function find_all_menus() {
    global $connection;
    
        $query = "SELECT * FROM footer_menu ORDER BY footer_id ASC";
        $select_menus = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_menus)) {
        $footer_id = $row['footer_id'];
        $menu = $row['menu'];
        
        echo "<tr>";
        echo "<td>{$footer_id}</td>";
        echo "<td>{$menu}</td>";
        echo "<td><a href='footer_menu.php?delete={$footer_id}'>DELETE</a></td>";
        echo "<td><a href='footer_menu.php?edit={$footer_id}'>EDIT</a></td>";
        echo "</tr>";

        }
    
}

function delete_menus() {
    global $connection;

        if (isset($_GET['delete'])) {
            $the_footer_id = $_GET['delete'];
            $query = "DELETE FROM footer_menu WHERE footer_id = {$the_footer_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: footer_menu.php");
            }
}

function insert_menus_left() {

    global $connection;

    if (isset($_POST['submit_2'])) {

        $menu = $_POST['menu'];
        $link = $_POST['link'];

        if ($menu == "" || empty($menu)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO footer_menu_left(menu, link) ";
            $query .= "VALUES('{$menu}', '{$link}') ";

            $create_menu_query = mysqli_query($connection, $query);

            if (!$create_menu_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }


}

function find_all_menus_left() {
    global $connection;
    
        $query = "SELECT * FROM footer_menu_left ORDER BY footer_left_id ASC";
        $select_menus = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_menus)) {
        $footer_left_id = $row['footer_left_id'];
        $menu = $row['menu'];
        
        echo "<tr>";
        echo "<td>{$footer_left_id}</td>";
        echo "<td>{$menu}</td>";
        echo "<td><a href='footer_menu.php?delete={$footer_left_id}'>DELETE</a></td>";
        echo "<td><a href='footer_menu.php?edit_2={$footer_left_id}'>EDIT</a></td>";
        echo "</tr>";

        }
    
}

function delete_menus_left() {
    global $connection;

        if (isset($_GET['delete'])) {
            $the_footer_left_id = $_GET['delete'];
            $query = "DELETE FROM footer_menu_left WHERE footer_left_id = {$the_footer_left_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: footer_menu.php");
            }
}

function insert_main_menus() {

    global $connection;

    if (isset($_POST['submit'])) {

        $menu = $_POST['menu'];
        $link = $_POST['link'];

        if ($menu == "" || empty($menu)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO main_menu(menu, link) ";
            $query .= "VALUES('{$menu}', '{$link}') ";

            $create_menu_query = mysqli_query($connection, $query);

            if (!$create_menu_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }


}

function find_all_main_menus() {
    global $connection;
    
        $query = "SELECT * FROM main_menu ORDER BY menu_id ASC";
        $select_menus = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_menus)) {
        $menu_id = $row['menu_id'];
        $menu = $row['menu'];
        
        echo "<tr>";
        echo "<td>{$menu_id}</td>";
        echo "<td>{$menu}</td>";
        echo "<td><a href='main_menu.php?delete={$menu_id}'>DELETE</a></td>";
        echo "<td><a href='main_menu.php?edit={$menu_id}'>EDIT</a></td>";
        echo "</tr>";

        }
    
}

function delete_main_menus() {
    global $connection;

        if (isset($_GET['delete'])) {
            $the_menu_id = $_GET['delete'];
            $query = "DELETE FROM main_menu WHERE menu_id = {$the_menu_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: main_menu.php");
            }
}

function confirm($result) {

    global $connection;

    if(!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

}

function slug($text) {
   /* $spl_char = '/[^\-\s\pN\pL]+/u';
    $double_char = '/[\-\s]+/';

    $slug = preg_replace('/[^a-z0-9-]+/', '-', strtolower($string));

    $slug = trim($string, '-');

    return $slug; */
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
  
    // trim
    $text = trim($text, '-');
  
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  
    // lowercase
    $text = strtolower($text);
  
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
  
    if (empty($text))
    {
      return 'n-a';
    }
  
    return $text;
}
function GetShortUrl($url){
    global $connection;
    $query = "SELECT * FROM url_shorten WHERE url = '".$url."' "; 
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) > 0) {
   $row = mysqli_fetch_assoc($result);
    return $row['short_code'];
   } else {
   $short_code = generateUniqueID();
   $sql = "INSERT INTO url_shorten (url, short_code, hits)
   VALUES ('".$url."', '".$short_code."', '0')";
   if (mysqli_query($connection, $sql) === TRUE) {
   return $short_code;
   } else { 
   die("Unknown Error Occured");
   }
   }
   }
   function generateUniqueID(){
    global $connection; 
    $token = substr(md5(uniqid(rand(), true)),0,6); 
    $query = "SELECT * FROM url_shorten WHERE short_code = '".$token."' ";
    $result = mysqli_query($connection,$query); 
    if (mysqli_num_rows($result) > 0) {
    generateUniqueID();
    } else {
    return $token;
    }
   }

   //===== AUTHENTICATION HELPERS =====//

function is_admin() {
    if(isLoggedIn()){
        $result = query("SELECT user_role FROM users WHERE user_id=".$_SESSION['user_id']."");
        $row = fetchRecords($result);
        if($row['user_role'] == 'admin'){
            return true;
        }else {
            return false;
        }
    }
    return false;
}

function is_sales() {
    if(isLoggedIn()){
        $result = query("SELECT user_role FROM users WHERE user_id=".$_SESSION['user_id']."");
        $row = fetchRecords($result);
        if($row['user_role'] == 'sales'){
            return true;
        }else {
            return false;
        }
    }
    return false;
}

//===== END AUTHENTICATION HELPERS =====//

function isLoggedIn(){
    if(isset($_SESSION['parent_id'])){
        return true;
    }
   return false;
}

function query($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    return $result;
}

function fetchRecords($result){
    return mysqli_fetch_array($result);
}

function confirmQuery($result) {
    
    global $connection;

    if(!$result ) {
          
          die("QUERY FAILED ." . mysqli_error($connection));
   
          
      }
    

}
   
   function loggedInUserIdParent(){
    if(isLoggedIn()){
        $result = query("SELECT * FROM parents WHERE parent_username='" . $_SESSION['parent_username'] ."'");
        confirmQuery($result);
        $parent = mysqli_fetch_array($result);
        if(mysqli_num_rows($result) >= 1) {
            return $parent['parent_id'];
        }
    }
    return false;

}

function get_all_user_clients(){
    return query("SELECT * FROM clients WHERE client_user=".loggedInUserId()."");
}

function get_all_user_leads(){
    return query("SELECT * FROM leads WHERE lead_user=".loggedInUserId()."");
}

function get_all_user_proposals(){
    return query("SELECT * FROM proposal WHERE proposal_user=".loggedInUserId()."");
}

function get_all_user_meetings(){
    return query("SELECT * FROM meetings WHERE meeting_user=".loggedInUserId()."");
}

function count_records($result){
    return mysqli_num_rows($result);
}