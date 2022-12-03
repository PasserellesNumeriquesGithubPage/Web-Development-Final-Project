<?php require_once('seller_usercontroller.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
  
<a href="seller_index.php"><button type="button" class="btn btn-outline-info">My Info</button></a>
  

<a href="seller_display_item.php">
<button type="button" class="btn btn-outline-primary">Bid Items</button>
</a>

<a href="seller_inventory.php">
<button type="button" class="btn btn-outline-primary">Inventory</button>
</a>

<a href="seller_history.php">
<button type="button" class="btn btn-outline-primary">Bid History</button>
</a>

  <h5 class="card-title">Online Auction || Bidding Process</h5>
  </div>
</div>
    <h1>Hello Seller ! <br> <?php echo $name;?> <?php echo $lastname;?></h1>
    <a href="item_registration.php">Item Registration</a><br>
    <a href="seller_display_item.php">Item Display</a><br>
    <a href="logout.php">Log out</a><br>
</body>
</html>