<?php
include_once('config.inc.php');
require_once('bidder_usercontroller.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>Bid Items | Online Bidding</title>
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


  <h5 class="card-title">Online Auction || Bid Items</h5>
  </div>
</div>

<div class="container">
  <div class="container">

    <?php 
    $stmt = $db->prepare("SELECT * FROM items_registered");
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
        <td><img src="images/<?php echo $row['itemImg'];?>" alt="" width="200px" height="200px"></td>
        <td><?php echo $row['itemName']; ?></td>
        <td><?php echo $row['itemDesc']; ?></td>
        <td><?php echo $row['itemValue']; ?></td>
        <td><?php echo $row['endDate']; ?></td>
        <td> <a href="bidder_item_details.php?view=<?php echo $row['itemNumber']?>&id=<?php echo $row['user_id']?>"><button type="button" class="btn btn-outline-success">View Item</button></a>
        </td>
      </tr>
    </tbody>
    <?php
    }
    ?>
    </table>
    

    

  </div>
</div>

</body>
</html>
<?php

?>