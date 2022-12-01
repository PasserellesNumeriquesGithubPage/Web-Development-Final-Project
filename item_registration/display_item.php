<?php
include_once('config.inc.php');
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
<body>
<div class="card">
  <div class="card-body">
  <h5 class="card-title">Bid Items</h5>
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
        <td> <a href="item_details.php?view=<?php echo $row['itemNumber']?>"><button type="button" class="btn btn-outline-success">View Item</button></a>
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