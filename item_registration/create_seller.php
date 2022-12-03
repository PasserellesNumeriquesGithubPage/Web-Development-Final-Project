<?php
require_once('config.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration | Online Auction</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<style>
   .btn{
        float: right;
    }
</style>
<body>
<div class="card">
  <div class="card-body">
  <h5 class="card-title">Online Auction || Seller Registration Process</h5>
  </div>
</div>

    <div>
        <?php
        
        
        if(isset($_POST['register'])){
            $set_username       = $_POST['set_username'];
            $set_password       = $_POST['set_password'];
            $first_name         =$_POST['first_name'];
            $last_name          =$_POST['last_name'];
            $contact_no         =$_POST['contact_no'];

            $sql = "INSERT INTO tbl_sellers (username,password,first_name,last_name,contact_no) VALUES('$set_username','$set_password','$first_name','$last_name','$contact_no');";
             
            $confirm_password   = $_POST['confirm_password'];


            if($set_password == $confirm_password){
                $result = mysqli_query($conn,$sql);
            
            // if(mysqli_num_rows($result) == 1){
                echo "Registered sucessfully.<br><a href='login.php'>Go to Login</a>";
        exit();
            // }

            // else
            // {
                echo"Error! Unable to save the data.";
            // }
            }else{
                echo "Password unmatch, try again.";
            }
            

        }
        
        ?>
    </div>
    <div>
        <form action="create_seller.php" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Seller Registration</h1>
                        <p>Fill up the form with correct values.</p>
                        <hr class="mb-3">
                        <label for="set_username"><b>Enter Username</b></label>
                        <input class="form-control" type="text" name="set_username" required>

                        <label for="set_password"><b>Enter Password</b></label>
                        <input class="form-control" type="text" name="set_password" required>

                        <label for="confirm_password"><b>Confirm Password</b></label>
                        <input class="form-control" type="text" name="confirm_password" required>

                        <label for="first_name"><b>Enter First Name</b></label>
                        <input class="form-control" type="text" name="first_name" required>

                        <label for="last_name"><b>Enter Last Name</b></label>
                        <input class="form-control" type="text" name="last_name" required>

                        <label for="contact_no"><b>Contact Number</b></label>
                        <input class="form-control" type="text" name="contact_no" required>

                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" name="register" value="Register Item"> 

                    </div>
                </div>
            </div>
        </form>

    </div>
</body>
</html>