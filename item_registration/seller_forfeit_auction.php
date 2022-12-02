<?php

?><?php 
if(isset($_GET['view'])){
    $item=$_GET['view'];
require_once('config.inc.php');
$sql=("INSERT INTO auction_result SELECT * FROM item_registered  WHERE itemNumber = '$item' ORDER BY bidValue DESC LIMIT 1 ");


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