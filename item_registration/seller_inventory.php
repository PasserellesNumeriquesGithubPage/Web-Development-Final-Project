<?php include_once('config.inc.php');?>
<?php require_once('seller_usercontroller.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>Inventory | Online Bidding</title>
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
    
  
    <a href="item_registration.php"><button type="button" class="btn btn-outline-primary">Register Items</button></a>

    <a href="seller_inventory.php">
<button type="button" class="btn btn-outline-primary">Inventory</button>
</a>

  <h5 class="card-title">Online Auction || Items You Auctioned</h5>
  </div>
</div>

<div class="container">
  <div class="container">
    <?php 
    $stmt = $db->prepare("SELECT items_registered.*, bids_registered.* FROM items_registered INNER JOIN bids_registered ON bids_registered.itemNumber=items_registered.itemNumber WHERE user_id = '$id'");
    $stmt->execute();
    $result = $stmt->fetchAll();

    ?>
    <table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th>Item Name</th>
        <th>Item Description</th>
        <th>Item Value</th>
        <th>End Date</th>
        <th></th>
      </tr>
    </thead>
    <?php
    foreach($result as $row){
    ?>
   
    <tbody>
      <tr>
        <td><img src="images/<?php echo $row['itemImg'];?>" alt="" width="100px" height="100px"></td>
        <td><?php echo $row['itemName']; ?></td>
        <td><?php echo $row['itemDesc']; ?></td>
        <td><?php echo $row['itemValue']; ?></td>
        <td><?php echo $row['endDate']; ?></td>

        <td> <a href="seller_item_details.php?view=<?php echo $row['itemNumber']?>"><button type="button" class="btn btn-outline-success">View Item</button></a><p><?php?></p></td>
        
        <td> <a href="seller_delete_inventory.php?view=<?php echo $row['itemNumber']?>"><button type="button" class="btn btn-outline-danger">Cancel Auction</button></a><p></p></td>

        <td><a href="seller_forfeit_auction.php?view=<?php echo $row['itemNumber']?>&id=<?php echo $row['user_id']?>&bid=<?php echo $row['bidder_id']?>"><button type="button" class="btn btn-outline-warning" onclick="myFunction()">Forfeit Auction</button></a><p id="demo"></p></td>

        <?php }?>
        </tr>
    </tbody>
    </table>
    
    

  </div>
</div>
<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "Item has Been Forfeited.";
}
</script>
</body>
</html>
<?php

?>