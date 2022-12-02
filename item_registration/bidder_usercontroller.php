<?php
require_once("config.inc.php");
ob_start();
session_start();

if(isset($_SESSION['logged_in']) && isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $get_name_query = "select * from tbl_bidders where username='$username'";
    $result_query = mysqli_query($conn,$get_name_query);
    if(mysqli_num_rows($result_query) == 1){
        while($row = mysqli_fetch_assoc($result_query) ){
            $id=$row['user_id'];
            $name=$row['first_name'];
            $lastname=$row['last_name'];
            $mobile=$row['contact_no'];
        }
        
    }

}else{
    session_unset();
    header("Location: login.php");
}
?>