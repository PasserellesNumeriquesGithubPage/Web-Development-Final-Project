<?php
include_once('config.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bidding Process | Online Auction</title>
</head>
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-bottom: 2rem;
  width: 50%
}
h2{
    text-align: center;
}
</style>
<body>
    
<?php
        if(isset($_GET['bidnow'])){
            include_once('config.inc.php');
            $itemnumber =   $_GET['bidnow'];

        }
        ?>
<div class="card">
  <div class="card-body">
  <a href="logout.php"><button type="button" class="btn btn-outline-danger">Log out</button></a>

<a href="bidder_display_item.php">
<button type="button" class="btn btn-outline-primary">Bid Items</button>
</a>

<a href="bidder_inventory.php">
<button type="button" class="btn btn-outline-primary">My Inventory</button>
</a>

<a href="bidder_inventory.php">
<button type="button" class="btn btn-outline-primary">My Bids</button>
</a>

  <h5 class="card-title">Bidding Process</h5>
  </div>
</div>
<div>
    <form action="bidding_submit.php" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <hr>
                        <h1>Bid Registration</h1>

                        <h4>for Item Number <?php echo $itemnumber?> </h4>

                        <hr class="mb-3">
                        <label for="bidder"><b>Item Number</b></label>
                        <input class="form-control" type="text" name="itemnumber" value="<?php echo $itemnumber?>" required>

                        <hr class="mb-3">
                        <label for="bidder"><b>Enter Name</b></label>
                        <input class="form-control" type="text" name="bidder" required>

                        <hr class="mb-3">
                        <label for="price"><b>Enter Price</b></label>
                        <input class="form-control" type="text" name="price" required>

                        <hr class="mb-3">
                        <label for="mobile"><b>Mobile Number</b></label>
                        <input class="form-control" type="text" name="mobile" required>

                        <hr class="mb-3">
                        <a href="bidding_submit.php"><input class="btn btn-primary" type="submit" name="bid" value="Register Bid"></a>
                        
                    </div>
                    <?php
    if(isset($_GET['bidnow'])){
        $itemnumber = $_GET['bidnow'];
        $sql =("SELECT * FROM items_registered WHERE itemNumber = '".$_GET['bidnow']."'");
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
          while($row=mysqli_fetch_assoc($result)){
    ?>
                    <div class="col">
                        <hr>
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
        </form>

    </div>
</body>
</html>