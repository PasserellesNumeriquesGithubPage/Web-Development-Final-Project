<?php
require_once('config.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Registration | Online Bidding</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div>
        <?php
        if(isset($_POST['create'])){
            $itemgrp    = $_POST['itemgrp'];
            $itemname   = $_POST['itemname'];
            $itemdesc   = $_POST['itemdesc'];
            $itemvalue  = $_POST['itemvalue'];
            $itemimg    = $_FILES['itemimg']['name'];
            $enddate  = $_POST['enddate'];
           
            $destination_path = getcwd().DIRECTORY_SEPARATOR;

            $target = $destination_path.'images/'.basename($itemimg);
            move_uploaded_file($_FILES['itemimg']['tmp_name'], $target);

            $sql = "INSERT INTO items_registered (itemgroup,itemname,itemdesc,itemvalue,itemimg,enddate) VALUES('$itemgrp','$itemname','$itemdesc','$itemvalue','$itemimg','$enddate')";

            $result = mysqli_query($conn,$sql);
            
            // if(mysqli_num_rows($result) == 1){
                echo "Registered sucessfully.<br>";
                header('Location: display_item.php');
                exit();
            // }

            // else
            // {
                echo"Error! Unable to save the data.";
            // }

        }
        
        ?>
    </div>
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
                        <input class="btn btn-primary" type="submit" name="create" value="Register Item"> 

                    </div>
                </div>
            </div>
        </form>

    </div>
</body>
</html>