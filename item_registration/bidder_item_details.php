<?php
include_once('config.inc.php');
require_once('bidder_usercontroller.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>Item Details | Online Auction</title>
</head>
<style>
  img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-bottom: 2rem;
  width: 100%
}
  h1{
    text-align: center;
  }
  .info{
    float: left;
  }
  .infotext{
    text-align: left;
    padding-left: 0;
    padding-top: 3rem;
  }
  .biddetails{
    text-align: left;
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
    <?php
    if(isset($_GET['view'])){
        $itemNumber = $_GET['view'];
        
        $sql =("SELECT * FROM items_registered WHERE itemNumber = '".$_GET['view']."'");
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
          while($row=mysqli_fetch_assoc($result)){
    ?>
    <script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $row['endDate']; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "BIDDING CLOSED";
  }
}, 1000);
</script>

<div class="container">
  <div class="row">
    <div class="col">
      <br><hr>
    <h1><?php echo $row['itemName']?></h1>
    <hr>
      <img src="images/<?php echo $row['itemImg'];?>" alt="" >
    </div>
    <div class="col">
    <div class="infotext">
          <div class="col">
          <a href="bidding.php?bidnow=<?php echo $row['itemNumber'] ?>"><button type="button" class="btn btn-outline-success">Bid Now</button></a>
          
          <h2>Bidding Ends at : <p id="demo"></p></h2><br>
          </div>
            
            <h2>Item Details</h2>
            <h5>Initial Value: ₱ <?php echo $row['itemValue'];?></h5>
            <h5>Description: <?php echo $row['itemDesc']; ?></h5>
            <hr>
    </div>
    
    <?php
          }
}else{
        
    }
  } 
?>
    <?php
        $sql =("SELECT bidderName, bidValue,bidDate FROM bids_registered WHERE itemNumber = '$itemNumber' ORDER BY bidValue DESC LIMIT 1 
        ");
        $result = mysqli_query($conn,$sql);
        while($res= mysqli_fetch_array($result)){
    ?>
    <div class="biddetails">
            <h2>Biddings</h2>
            <h5>Highest Bidder: <?php echo $res['bidderName'] ;?></h5>
            <h5>Bid Value: ₱ <?php echo $res['bidValue']; ?></h5>
            <h5>Time Bidded: <?php echo $res['bidDate']?></h5>
            <br>
      <?php }?>
      <?php
        $sql =("SELECT bidderName, bidValue ,bidDate FROM bids_registered WHERE itemNumber = '$itemNumber' ORDER BY bidDate DESC LIMIT 1 ;
        ");
        $result = mysqli_query($conn,$sql);
        while($res= mysqli_fetch_array($result)){
    ?>

            <h5>Recent Bidder: <?php echo $res['bidderName']?></h5>
            <h5>Bid Value: ₱ <?php echo $res['bidValue']?> </h5>
            <h5>Time Bidded: <?php echo $res['bidDate']?></h5>
        <?php }?>

          <hr>
          <?php
        if(isset($_GET['id'])){
        $id= $_GET['id'];
        
        $sql =("SELECT * FROM tbl_sellers WHERE user_id = '$id'");
        $result = mysqli_query($conn,$sql);
        while($res= mysqli_fetch_array($result)){
    ?>
        <h2>Seller's Information</h2>
        <h5>Name: <?php echo $res['first_name']?> <?php echo $res['last_name']?></h5>
        <h5>Contact Number: <?php echo $res['contact_no']?></h5>
    </div>
    <?php }}?>
    <div>
      

    </div>
    </div>
  </div>
</div>


      
    

</body>

</html>