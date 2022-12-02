<?php
ob_start();
session_start();
require_once('config.inc.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $find_user_query = ("SELECT password FROM tbl_sellers where username='$username'");
    $result_query = mysqli_query($conn,$find_user_query) or die("Cannot connect to table");
    echo $password;
        if(mysqli_num_rows($result_query) == 1){
            $dbpassword = mysqli_fetch_row($result_query)[0];
            if ($dbpassword == $password){
                $_SESSION['username'] = $username;
                $_SESSION['timeout'] = time();
                $_SESSION['logged_in'] = true;
                header('Location: seller_index.php');
            }else{
               
                $message = "Login Failed.";
                echo $message;
            }
        }else{
            $message = "Login Failed.";
            echo $message;
        }
    }
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $find_user_query = ("SELECT password FROM tbl_bidders where username='$username'");
        $result_query = mysqli_query($conn,$find_user_query) or die("Cannot connect to table");
        echo $password;
            if(mysqli_num_rows($result_query) == 1){
                $dbpassword = mysqli_fetch_row($result_query)[0];
                if ($dbpassword == $password){
                    $_SESSION['username'] = $username;
                    $_SESSION['timeout'] = time();
                    $_SESSION['logged_in'] = true;
                    header('Location: bidder_index.php');
                }else{
                   
                    $message = "Login Failed.";
                    echo $message;
                }
            }else{
                $message = "Login Failed.";
                echo $message;
            }
        }

?>




<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form action="login.php" method="post" name="login">
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="text" name="password" id="password" placeholder="Password">
            <input type="submit" name="submit" id="submit" value="Login">
        </form>
        <div>
        <a href="create_seller.php">Create Seller Account</a><br>
    <a href="create_bidder.php">Create Bidder Account</a><br>
        </div>
    </body>
</html>