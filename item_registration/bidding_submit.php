<?php
require_once('config.inc.php');
require_once('bidder_usercontroller.php');
if(isset($_POST['bid'])){
    $itemnumber = mysqli_real_escape_string($conn,$_POST['itemnumber']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $name = mysqli_real_escape_string($conn,$_POST['bidder']);
    $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
    $id = mysqli_real_escape_string($conn,$_POST['user_id']);

    $sql = "INSERT INTO bids_registered(bidderName,itemNumber,bidValue,mobileNumber,bidDate,bidder_id) VALUES ('$name','$itemnumber','$price','$mobile',NOW(),'$id')";

    $result = mysqli_query($conn,$sql);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bidding Successful | Online Auction</title>
    </head>
    <style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-bottom: 2rem;
  width: 70%
}
h2{
    text-align: center;
}
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

  <h5 class="card-title">Online Auction || Bidding Process</h5>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
        <h1>Bid Registration Successful</h1>

            <h4>for Item Number <?php echo $itemnumber; ?></h4><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <hr class="mb-3">
            <a href="bidder_display_item.php"><button type="button" class="btn btn-outline-info">Go to Display Items</button></a>
        </div>
    <?php
    if(isset($_POST['bid'])){
        $itemnumber = $_POST['itemnumber'];
        $sql =("SELECT * FROM items_registered WHERE itemNumber = '".$_POST['itemnumber']."'");
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
          while($row=mysqli_fetch_assoc($result)){
    ?>
                    <div class="col">
                    <h2><?php echo $row['itemName']?></h2>
      <img src="images/<?php echo $row['itemImg'];?>" alt="" >
                    </div>
                    <?php
          }
}else{
        
    }
  } 
?>
    </div>
</div>
    </body>
    </html>
   
    
<?php
}else{
    echo"";
}

?>