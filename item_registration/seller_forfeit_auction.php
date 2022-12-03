<?php

?><?php 
if(isset($_GET['view'])){
    $item=$_GET['view'];
    $id=$_GET['id'];
require_once('config.inc.php');
$sql=("INSERT INTO auction_result (itemNumber,user_id) VALUES ('$item','$id')");

if(mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
  header('Location:seller_inventory.php');
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
}else{
    echo "Error";
}

?>