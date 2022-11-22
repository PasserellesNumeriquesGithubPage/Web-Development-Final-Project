<?php
$conn = mysqli_connect("localhost","root","") or die("Cannot connect to localhost");
mysqli_select_db($conn, "onlineauction") or die("Cannot connect to auction database");
?>