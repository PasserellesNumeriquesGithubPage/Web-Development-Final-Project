<?php
ob_start();
session_start();
require_once 'DB/dbconnect.inc';

if (isset($_SESSION['logged_in']) && isset($_SESSION['email']) && !empty($_SESSION['email'])){

}else{
    session_unset();
    header("Refresh: 0.5; url=index.php");
}
?>
<!DOCTYPE html PUBLIC "-/w3c//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>BID</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/BID.css">
</head>

<body>
    <div class="card">
        <section class="wrapper">
        <div class="top">Make your Choice!</div>
        <div class="bottom" aria-hidden="true">Make your Choice!</div>
        </section>  
        <div class="registeredItem">
            <h2>Registered Item</h2>
            <button class="redirectToregisteredItem"><a href="#">Click here</a></button>
        </div>
        <div class="itemBidded">
            <h2>Item Bidded</h2>
            <button class="redirectToItemBedded"><a href="#">Click here</a></button>
        </div>
    </div>
</body>