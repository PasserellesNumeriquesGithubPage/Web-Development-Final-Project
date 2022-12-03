<?php include_once('config.inc.php');?>
<?php require_once('bidder_usercontroller.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>My Inventory | Online Bidding</title>
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

    <a href="bidder_display_item.php">
    <button type="button" class="btn btn-outline-primary">Bid Items</button>
    </a>

    <a href="bidder_inventory.php">
<button type="button" class="btn btn-outline-primary">Inventory</button>
</a>

<a href="bidder_inventory.php">
<button type="button" class="btn btn-outline-primary">Bid History</button>
</a>

  <h5 class="card-title">Inventory</h5>
  </div>
</div>

<div class="container">
  <div class="container">
    <table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th>Item Number</th>
        <th>Item Name</th>
        <th>Bid Value</th>
        <th>Bid Date</th>
        <th>Seller Name</th>
        <th>Contact Number</th>
        <th></th>
      </tr>
    </thead>
    
   
    <tbody>
        <?php 
    $stmt = $db->prepare(
    "SELECT items_registered.* 
    FROM auction_result
    INNER JOIN items_registered
    ON auction_result.itemNumber = items_registered.itemNumber LIMIT 1
    "
    );
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
    <?php
    foreach($result as $row){
    ?>
        <tr>
        <td><img src="images/<?php echo $row['itemImg'];?>" alt="" width="100px" height="100px"></td>
        <td><?php echo $row['itemNumber']; ?></td>
        <td><?php echo $row['itemName']; ?></td>
        <?php }?>

        
        
    <!-- <?php 
    $stmt = $db->prepare(
    "SELECT tbl_sellers.* 
    FROM auction_result
    INNER JOIN tbl_sellers
    ON auction_result.user_id = tbl_sellers.user_id"
    );
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
    <?php foreach($result as $row){
    ?>
        <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
        <td><?php echo $row['contact_no']; ?></td>

        <?php }?> -->
        
      </tr>
    </tbody>
   
    </table>
    

    

  </div>
</div>

</body>
</html>
<?php

?>