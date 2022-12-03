<?php
require_once('config.inc.php');
require_once('seller_usercontroller.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Registration | Online Auction</title>
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

    <a href="logout.php"><button type="button" class="btn btn-outline-danger">Log out</button></a>

    <a href="seller_display_item.php">
    <button type="button" class="btn btn-outline-primary">Bid Items</button>
    </a>
  
    <a href="item_registration.php"><button type="button" class="btn btn-outline-primary">Register Items</button></a>

    <a href="seller_inventory.php">
<button type="button" class="btn btn-outline-primary">Inventory</button>
</a>
    
  <h5 class="card-title">Item Registration Process</h5>
  </div>
</div>

    <div>
    <div>
        <form action="item_registration.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Item Registration</h1>
                        <p>Fill up the form with correct values.</p>
                        <hr class="mb-3">
                        <label for="itemgrp"><b>Item Group</b></label>
                        <input class="form-control" type="text" name="itemgrp" required>

                        <label for="itemname"><b>Item Name</b></label>
                        <input class="form-control" type="text" name="itemname" required>

                        <label for="itemimg"><b>Upload Image</b></label>
                        <input class="form-control" type="file" id ="itemimg" name="itemimg" required>

                        <label for="itemdesc"><b>Item Description</b></label>
                        <input class="form-control" type="text" name="itemdesc" required>

                        <label for="itemvalue"><b>Item Value</b></label>
                        <input class="form-control" type="text" name="itemvalue" required>

                        <label for="itemname"><b>End Date</b></label>
                        <input class="form-control" type="date" name="enddate" required>

                        <hr class="mb-3">
                        <label for="bidder"><b>Enter Name</b></label>
                        <input class="form-control" type="text" name="bidder" value="<?php echo $name?>" required>

                        <hr class="mb-3">
                        <label for="mobile"><b>Mobile Number</b></label>
                        <input class="form-control" type="text" name="mobile" value="<?php echo $mobile?>" required>

                        <hr class="mb-3">
                        <label for="mobile"><b>User ID</b></label>
                        <input class="form-control" type="text" name="user_id" value="<?php echo $id?>" required>

                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" name="create" value="Register Item"> 

                    </div>
                </div>
            </div>
        </form>

    </div>
        <?php
        if(isset($_POST['create'])){
            $itemgrp    = $_POST['itemgrp'];
            $itemname   = $_POST['itemname'];
            $itemdesc   = $_POST['itemdesc'];
            $itemvalue  = $_POST['itemvalue'];
            $itemimg    = $_FILES['itemimg']['name'];
            $enddate  = $_POST['enddate'];
            $user_id    =$_POST['user_id'];
           
            $destination_path = getcwd().DIRECTORY_SEPARATOR;

            $target = $destination_path.'images/'.basename($itemimg);
            move_uploaded_file($_FILES['itemimg']['tmp_name'], $target);

            $sql = "INSERT INTO items_registered (itemgroup,itemname,itemdesc,itemvalue,itemimg,enddate,user_id) VALUES('$itemgrp','$itemname','$itemdesc','$itemvalue','$itemimg','$enddate','$user_id')";

            $result = mysqli_query($conn,$sql);
            
            // if(mysqli_num_rows($result) == 1){
                echo "Registered sucessfully.<br>";
                header('Location: seller_display_item.php');
                exit();
            // }

            // else
            // {
                echo"Error! Unable to save the data.";
            // }

        }
        
        ?>
    </div>
    
</body>
</html>