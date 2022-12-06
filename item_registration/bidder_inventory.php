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

  <h5 class="card-title">Online Auction || Inventory</h5>
  </div>
</div>

<div class="container">
  <div class="container">
    <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Item Number</th>
        <th></th>
        <th>Item Name</th>
        <th></th>
      </tr>
    </thead>
    
   
    <tbody>
        <?php 
    $stmt = $db->prepare(
    "SELECT items_registered.* 
    FROM auction_result
    INNER JOIN items_registered
    ON auction_result.itemNumber = items_registered.itemNumber 
    "
    );
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
    <?php
    foreach($result as $row){
    ?>
        <tr>
        
        <td><?php echo $row['itemNumber']; ?></td>
        <td><img src="images/<?php echo $row['itemImg'];?>" alt="" width="100px" height="100px"></td>
        <td><?php echo $row['itemName']; ?></td>

        <td><a href="bidder_delete_inventory.php?view=<?php echo $row['itemNumber'] ?>"><button type="button" class="btn btn-outline-success">Claim</button></a></td>
        <?php }?>
        
        
      </tr>
    </tbody>
   
    </table>
    

    

  </div>
</div>

</body>
</html>
<?php

?>