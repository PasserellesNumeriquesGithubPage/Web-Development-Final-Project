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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <title>Login</title>
    </head>
    <body>
    <div class="card">
  <div class="card-body">
  <h5 class="card-title">Online Auction || Log In Process</h5>
  </div>
</div>
        <form action="login.php" method="POST" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                            <br><hr>
                        <h1>User Log In</h1>
                        <p>Fill up the form with correct values.</p>
                        <hr class="mb-3">
                        <label for="user"></label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>

                        <label for="pass"></label>
                        <input class="form-control" type="text" name="password" id="password" placeholder="Password" required>

                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" name="submit" value="Enter Auction"> <hr>
                        <h2>User Registration</h2>
                        <p>Create account for new users.</p>

                        <h5>For Bidders</h5>
                        <a href="create_bidder.php"> <button type="button" class="btn btn-info">Create Bidder Account</button></a>
                        <br><br>
                        <h5>For Sellers</h5>
                        <a href="create_seller.php"> <button type="button" class="btn btn-info">Create Seller Account</button></a>
                       

                    </div>
                </div>
            </div>
        </form>
    
        <!-- <form action="login.php" method="post" name="login">
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="text" name="password" id="password" placeholder="Password">
            <input type="submit" name="submit" id="submit" value="Login">
        </form>
        <div>
        <a href="create_seller.php">Create Seller Account</a><br>
    <a href="create_bidder.php">Create Bidder Account</a><br>
        </div> -->
    </body>
</html>