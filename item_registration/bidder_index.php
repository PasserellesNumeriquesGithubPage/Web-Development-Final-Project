<?php require_once('bidder_usercontroller.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
  <style>
    .btn{
      float: right;
    }
    img {
  padding-top: 12%;
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

  <a href="bidder_index.php"><button type="button" class="btn btn-outline-info">My Info</button></a>

<a href="bidder_display_item.php">
<button type="button" class="btn btn-outline-primary">Bid Items</button>
</a>

<a href="bidder_inventory.php">
<button type="button" class="btn btn-outline-primary">Inventory</button>
</a>

<a href="bidder_history.php">
<button type="button" class="btn btn-outline-primary">Bid History</button>
</a>

  <h5 class="card-title">Online Auction || My Information</h5>
  </div>
</div>
    
    <div class="container">
  <div class="row">
    <div class="col">
      <br><hr>
      <h1>Welcome Bidder ! <br> <?php echo $name;?> <?php echo $lastname;?></h1>
      <?php 
    $stmt = $db->prepare("SELECT COUNT(bidder_id) AS transactions FROM bids_registered WHERE bidder_id = '$id'");
    $stmt->execute();
    $result = $stmt->fetchAll();

    ?>
    <hr>    
            <h2>My Details</h2>
            <?php
    foreach($result as $row){
    ?>
            <h5>Mobile Number:  <?php echo $mobile;?></h5>
            <h5>Total Transactions: <?php echo $row[0]; ?></h5>
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
            <h5>Total Unclaimed Sold:<?php $row[0]?> </h5>
            <hr>
            <?php
    }
    ?>
      
    </div>
    <?php 
    $stmt = $db->prepare("SELECT * FROM tbl_bidders WHERE user_id = '$id'");
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