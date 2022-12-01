<?php
require_once("includes/connect.inc");
ob_start();
session_start();

if(isset($_SESSION['logged_in']) && isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $get_name_query = "select first_name, last_name from tbl_biddersinfo"
    $result_query = mysqli_query($conn,$get_name_query);
    if(mysqli_num_rows($result_query) == 1){
        $result = mysqli_fetch_row($result_query);
        $name = $result[0]
    }

}else{
    session_unset();
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello ! <?phpecho $name ?></h1>
    <a href="item_registration.php">Item Registration</a><br>
    <a href="display_item.php">Item Display</a><br>
    <a href="logout.php">Log out</a><br>
</body>
</html>