<?php

?><?php 
if(isset($_GET['view'])){
  if(isset($_GET['id'])){
    $item=$_GET['view'];
    $id=$_GET['id'];
    $bid=$_GET['bid'];
require_once('config.inc.php');
$sql=("INSERT INTO auction_result (itemNumber,user_id,bidder_id) VALUES ('$item','$id','$bid') ");

if(mysqli_query($conn, $sql)) {
  header('Location: seller_inventory.php');
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
}else{
    echo "Error";
}
}
?>
