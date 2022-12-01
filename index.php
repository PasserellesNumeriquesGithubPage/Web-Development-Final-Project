<?php
ob_start();
session_start();
require_once 'DB/dbconnect.inc';
//JOIN Three tables in database 
//SELECT tblmembership.accountId, tblusers.first_name, tblmembership.dateOfMembershipEnds FROM tblmembership 
// INNER JOIN tblaccount ON tblmembership.accountId = tblaccount.accountId
// INNER JOIN tblusers ON tblmembership.accountId = tblusers.accountId 
// WHERE tblmembership.accountId = '$id'
?>
<!DOCTYPE html PUBLIC "-/w3c//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Log-In & sign-up</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/index.css">
</head>

<body>
  <div class="cont">
    <div class="form sign-in">
      <form name="login" method="POST" action="index.php">
        <h2>Sign In</h2>
        <label>
          <span>Email Address</span>
          <input type="text" name="getEmail">
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="getPassword">
        </label>
        <input class="submit" type="submit" name="loginButton">
        <p class="forgot-pass">Forgot Password ?</p>
        <?php
        if (isset($_POST['loginButton'])) {
          $email = $_POST['getEmail'];
          $password = md5($_POST['getPassword']);
          $SELECT = "SELECT password, accountId FROM tblaccount WHERE email='$email'";
          $result_select = mysqli_query($conn, $SELECT);
          if (mysqli_num_rows($result_select) === 1) {
            $data = mysqli_fetch_array($result_select);
            $id = $data['accountId'];
            $dbpassword = $data['password'];
            if ($dbpassword == $password) {
              $_SESSION['email'] = $email;
              $_SESSION['timeout'] = time();
              $_SESSION['logged_in'] = true;
              $SELECT_date_query = "SELECT tblaccount.accountId, tblmembership.dateOfMembershipEnds FROM tblmembership 
              INNER JOIN tblaccount ON tblmembership.accountId = tblaccount.accountId 
              WHERE tblmembership.accountId = '$id'";
              $result_SELECT_date_query = mysqli_query($conn, $SELECT_date_query);
              if (mysqli_num_rows($result_SELECT_date_query) === 1) {
                $result_data = mysqli_fetch_array($result_SELECT_date_query);
                $date = $result_data['dateOfMembershipEnds'];
                //Deri ang pag log in
		if (date("Y-m-d") < $date) {
                  header("Location:sample.php");
                } else {
                  header("Location: modal.php");
                }
              }
            } else {
              echo '<script>alert("Wrong Email or Password!")</script>';
            }
          } else if (empty($email)) {
            echo '<script>alert("Email is required!")</script>';
          } else if (empty($password)) {
            echo '<script>alert("Password is required!")</script>';
          } else {
            echo '<script>alert("Wrong Email or Password!")</script>';
          }
        }
        ?>
	//Ang form ni sa pag log in
      </form>
      <div class="social-media">
        <p id="visit">Visit Us</p>
        <ul>
          <li><img src="images/facebook.png"></li>
          <li><img src="images/twitter.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li>
        </ul>
      </div>
    </div>


    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover great amount of new opportunities!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
        <form id="form1" name="form1" method="post">
          <h2>Sign Up</h2>
          <label>
            <span>Name</span>
            <input type="text" name="fullName">
          </label>
          <label>
            <span>Email</span>
            <input type="email" name="email">
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="password">
          </label>
          <label>
            <span>Confirm Password</span>
            <input type="password" name="confirmPassword">
          </label>
          <label>
            <span>Age</span>
            <input type="text" name="age">
          </label>
          <input type="submit" class="submit" name="button">
          <?php
          if (isset($_POST['button'])) {
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $age = $_POST['age'];
            $find_user = mysqli_query($conn, "SELECT * FROM tblaccount WHERE email='$email' LIMIT 1");
            if (empty($_POST['fullName']) || empty($email = $_POST['email']) || empty($password = $_POST['password']) || empty($confirmPassword = $_POST['confirmPassword']) || empty($age = $_POST['age'])) {
              echo '<script>alert("All Fields Required!")</script>';
            } else if ($password != $confirmPassword) {
              echo '<script>alert("Password and Confirm password should match!")</script>';
            } else if ($age <= 20) {
              echo '<script>alert("Underatted Age your Not Allowed! ")</script>';
            } else if (strlen($password) < 12) {
              echo '<script>alert("Password should contain 12 above characters")</script>';
            } else if (mysqli_num_rows($find_user) > 0) {
              echo '<script>alert("Email is already exist")</script>';
            } else if (mysqli_num_rows($find_user) == 0) {
              $encrypted_password = md5($password);
              $insert_sql_query = "INSERT into tblaccount(email,password) values('$email','$encrypted_password')";
              $insert_result = mysqli_query($conn, $insert_sql_query) or die("Cannot insert");
              if ($insert_result) {
                $DB_ID = mysqli_insert_id($conn);
                $insert_sqlQuery = "INSERT into tblpersonal_info(accountid,Full_Name,age) values('$DB_ID','$fullName','$age')";
                $insert_Result = mysqli_query($conn, $insert_sqlQuery) or die("Cannot insert");
                echo '<script>alert("Added a Account")</script>';
              }
            }
          }
          ?>
	//ang form ni sa pag register
        </form>
      </div>
    </div>
  </div>
  <script>
    document.querySelector('.img-btn').addEventListener('click', function() {
      document.querySelector('.cont').classList.toggle('s-signup')
    });
  </script>
</body>

</html>