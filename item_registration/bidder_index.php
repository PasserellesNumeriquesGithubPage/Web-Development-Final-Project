<?php require_once('usercontroller.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Hello Seller ! <br> <?php echo $name;?> <?php echo $lastname;?></h1>
    <a href="item_registration.php">Item Registration</a><br>
    <a href="display_item.php">Item Display</a><br>
    <a href="logout.php">Log out</a><br>
</body>
</html>