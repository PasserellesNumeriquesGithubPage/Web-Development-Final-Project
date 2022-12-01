<?php
  ob_start();
  session_start();
  require_once 'DB/dbconnect.inc';
  if (isset($_SESSION['logged_in']) && isset($_SESSION['email']) && !empty($_SESSION['email'])){
    $email = $_SESSION['email'];

  }else{
    session_unset();
    header("Refresh: 0.5; url=index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>MODAL</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/modal.css">
</head>
<body>
<button id="myBtn" name="myBtn">Open Modal</button>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
        <div class="modalContent">
            <p class="modalAuctionHeader">Auction Fees</p>
            <p class="modalAuctionSubHeader">Membership Fees</p>
            <div class="insideModal">
                <i class="membershipFee">
                  <form method="post">
                    <p>One Day Membership<br>100</p>
                    <input type="submit" name="oneDayMembership" class="Fee" value="Be Part with Us">
                    <?php 
                      if(isset($_POST['oneDayMembership'])){
                        $id = $_SESSION['id'];
                        $typeofmembership = "One Day Membership";
                        $membershipToEnds = date("Y-m-d", strtotime(date("Y-m-d", strtotime($_SESSION['dateOfMembership']))." + 1 day"));
                        $sql = "insert into tblmembership(accountId,typeOfMembership,dateofMembershipEnds) values('$id','$typeofmembership','$membershipToEnds')";
                        $result = mysqli_query($conn, $sql) or die("Error in activating membership:" . mysqli_error($conn));
                        echo '<script>alert("You are already part of our community!")</script>';
                        echo "<script> location.href='index.php'; </script>";
                      }
                    ?>
                  </form>
                </i>
                <i class="membershipFee">
                  <form method="post">
                    <p>Weekly Membership<br>300</p>
                    <input type="submit" name="weeklyMembership" class="Fee" value="Be Part with Us">
                    <?php 
                      if(isset($_POST['weeklyMembership'])){
                        $id = $_SESSION['id'];
                        $typeofmembership = "Weekly Membership";
                        $membershipToEnds = date("Y-m-d", strtotime(date("Y-m-d", strtotime($_SESSION['dateOfMembership']))." + 7 day"));
                        $sql = "insert into tblmembership(accountId,typeOfMembership,dateOfMembership,dateofMembershipEnds) values('$id','$typeofmembership','$membershipToEnds')";
                        $result = mysqli_query($conn, $sql) or die("Error in activating membership:" . mysqli_error($conn));
                        echo '<script>alert("You are already part of our community!")</script>';
                        echo "<script> location.href='index.php'; </script>";

                      }
                    ?>
                  </form>
                </i> 
                <i class="membershipFee">
                  <form method="post">
                    <p>Montly Membership<br>1,000</p>
                    <input type="submit" name="monthlyMembership" class="Fee" value="Be Part with Us">
                    <?php 
                      if(isset($_POST['monthlyMembership'])){
                        $id = $_SESSION['id'];
                        $typeofmembership = "Monthly Membership";
                        $membershipToEnds = date("Y-m-d", strtotime(date("Y-m-d", strtotime($_SESSION['dateOfMembership']))." + 30 day"));
                        $sql = "insert into tblmembership(accountId,typeOfMembership,dateOfMembership,dateofMembershipEnds) values('$id','$typeofmembership','$membershipToEnds')";
                        $result = mysqli_query($conn, $sql) or die("Error in activating membership:" . mysqli_error($conn));
                        echo '<script>alert("You are already part of our community!")</script>';
                        echo "<script> location.href='index.php'; </script>";

                      }
                    ?>
                  </form>
                </i>
                <i class="membershipFee">
                  <form method="post">
                    <p>Half-Year Membership<br>5,000</p>
                    <input type="submit" name="half-yearlyMembership" class="Fee" value="Be Part with Us">
                    <?php 
                      if(isset($_POST['half-yearlyMembership'])){
                        $id = $_SESSION['id'];
                        $typeofmembership = "Half-yearly Membership";
                        $membershipToEnds = date("Y-m-d", strtotime(date("Y-m-d", strtotime($_SESSION['dateOfMembership']))." + 182 day"));
                        $sql = "insert into tblmembership(accountId,typeOfMembership,dateOfMembership,dateofMembershipEnds) values('$id','$typeofmembership','$membershipToEnds')";
                        $result = mysqli_query($conn, $sql) or die("Error in activating membership:" . mysqli_error($conn));
                        echo '<script>alert("You are already part of our community!")</script>';
                        echo "<script> location.href='index.php'; </script>";

                      }
                    ?>
                  </form>
                </i>
                <i class="membershipFee">
                  <form method="post">
                    <p>Yearly Membership<br>10,000</p>
                    <input type="submit" name="yearlyMembership" class="Fee" value="Be Part with Us">
                    <?php 
                      if(isset($_POST['yearlyMembership'])){
                        $id = $_SESSION['id'];
                        $typeofmembership = "Yearly Membership";
                        $membershipToEnds = date("Y-m-d", strtotime(date("Y-m-d", strtotime($_SESSION['dateOfMembership']))." + 365 day"));
                        $sql = "insert into tblmembership(accountId,typeOfMembership,dateOfMembership,dateofMembershipEnds) values('$id','$typeofmembership','$membershipToEnds')";
                        $result = mysqli_query($conn, $sql) or die("Error in activating membership:" . mysqli_error($conn));
                        echo '<script>alert("You are already part of our community!")</script>';
                        echo "<script> location.href='index.php'; </script>";
                      }
                    ?>
                  </form>
                </i>
                <i class="membershipFee">
                  <form method="post">
                    <p>Decade Membership<br>15,000</p>
                    <input type="submit" name="decadeMembership" class="Fee" value="Be Part with Us">
                    <?php 
                      if(isset($_POST['decadeMembership'])){
                        $id = $_SESSION['id'];
                        $typeofmembership = "Decade Membership";
                        $membershipToEnds = date("Y-m-d", strtotime(date("Y-m-d", strtotime($_SESSION['dateOfMembership']))." + 730 day"));
                        $sql = "insert into tblmembership(accountId,typeOfMembership,dateOfMembership,dateofMembershipEnds) values('$id','$typeofmembership','$membershipToEnds')";
                        $result = mysqli_query($conn, $sql) or die("Error in activating membership:" . mysqli_error($conn));
                        echo '<script>alert("You are already part of our community!")</script>';
                        echo "<script> location.href='index.php'; </script>";
                      }
                    ?>
                  </form>
                </i>
            </div>
        </div>
  </div>
  </div>
<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
