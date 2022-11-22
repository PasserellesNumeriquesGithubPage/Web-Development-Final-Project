<?php
  session_start();
  require 'controllers/authController.php';
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    z-index: -1;
    display: block;
    background-color:green;
}
.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  padding-top: 20px;
  left: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
}
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 70%;
  height: 37rem;
}
p.modalAuctionHeader{
    font-size: 30px;
    margin: 2% 0 3% 40%;
    color :#0D4C92;
}
p.modalAuctionSubHeader{
    font-size: 20px;
    margin: 0 0 3% 40%;
}
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.insideModal{
    display: grid;
    grid-template-columns: 1fr 200px 1fr;
    grid-template-rows: 150px;
    place-items: center;
    font-family: 'Nunito', sans-serif;
    font-size: 1.2rem;
    border: #0D4C92 dotted 2px;
    height: 26rem;
}
i.membershipFee{
  margin: 20% 0 0 0;
  border: #26a0da solid 1px;
  background-color: aqua;
  text-align: center;
  width: 20rem;
  height: 10rem;
}
input.Fee{
    width: 15rem;
    color: black;
    font-weight: 500;
    height: 40px;
    border: 10rem #26a0da;
    cursor: pointer;
}
</style>
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
                    <p>Initial Membership<br>1,000</p>
                    <input type="submit" name="initialMembership" class="Fee" value="Be Part with Us">
                  </form>
                </i>
                <i class="membershipFee">
                  <form method="post">
                    <p>Annual Fees<br>1,000</p>
                    <input type="submit" name="membership" class="Fee" value="Be Part with Us">
                  </form>
                </i> 
                <i class="membershipFee">
                  <form method="post">
                    <p>Monthal Fees<br>1,000</p>
                    <input type="submit" name="membership" class="Fee" value="Be Part with Us">
                  </form>
                </i>
                <i class="membershipFee">
                  <form method="post">
                    <p>Quarteral Fees<br>1,000</p>
                    <input type="submit" name="membership" class="Fee" value="Be Part with Us">
                  </form>
                </i>
                <i class="membershipFee">
                  <form method="post">
                    <p>Semiannual Fees<br>1,000</p>
                    <input type="submit" name="membership" class="Fee" value="Be Part with Us">
                  </form>
                </i>
                <i class="membershipFee">
                  <form method="post">
                    <p>Cancellation Fees<br>1,000</p>
                    <input type="submit" name="membership" class="Fee" value="Be Part with Us">
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
