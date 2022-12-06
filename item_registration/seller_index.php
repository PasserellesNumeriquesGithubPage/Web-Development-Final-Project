<?php require_once('seller_usercontroller.php')?>
<?php include_once('config.inc.php');?>
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
    img {
  padding-top: 5%;
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-bottom: 2rem;
  width: 60%
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
    
  
    <a href="item_registration.php"><button type="button" class="btn btn-outline-primary">Register Items</button></a>

    <a href="seller_inventory.php">
<button type="button" class="btn btn-outline-primary">Inventory</button>
</a>

  <h5 class="card-title">Online Auction || My Information</h5>
  </div>
</div>
    <div class="container">
  <div class="row">
    <div class="col">
      <br><hr>
      <h1>Hello Seller ! <br> <?php echo $name;?> <?php echo $lastname;?></h1>
      <?php 
    $stmt = $db->prepare("SELECT COUNT(user_id) AS transactions FROM items_registered WHERE user_id = '$id'");
    $stmt->execute();
    $result = $stmt->fetchAll();

    ?>
    <hr>    
            <h2>My Details</h2><br>
            <?php
    foreach($result as $row){
    ?>
            <h5>Mobile Number:  <?php echo $mobile;?></h5>
            <br>
            <h5>Total Transactions: <?php echo $row[0]; ?> post(s)</h5><br>
            <?php
    }
    ?>
            <?php 
    $stmt = $db->prepare("SELECT COUNT(user_id) AS transactions FROM auction_result WHERE user_id = '$id'");
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
         <?php
    foreach($result as $row){
    ?>
            <h5>Total Unclaimed Sold: <?php echo $row[0]?> item(s) sold</h5>
            <hr>
            <?php
    }
    ?>
       <?php 
    $stmt = $db->prepare("SELECT * FROM tbl_sellers WHERE user_id = '$id'");
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
     <?php
    foreach($result as $row){
    ?>
    </div>
    <div class="col">
    <div class="infotext">
          <div class="col">
          <img src="images/<?php echo $row['profile_img'];?>" alt="" >
          <?php
    }
    ?>
    </div>
    
    
</body>
</html>