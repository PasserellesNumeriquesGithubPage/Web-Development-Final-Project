<?php 
if(isset($_GET['view'])){
    $item=$_GET['view'];
    require_once('config.inc.php');
$sql = "DELETE FROM items_registered WHERE itemNumber='$item'";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
  header('Location:bidder_inventory.php');
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
}else{
    echo "Error";
}

?>