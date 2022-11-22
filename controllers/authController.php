<?php
require_once 'dbconnect.inc';
if (isset($_POST['button'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $confirmPassword = $_POST['confirmPassword'];
  $age = $_POST['age'];
  $result = mysqli_query($conn, "SELECT * FROM tblaccount WHERE email='$email' LIMIT 1");
  if (empty($_POST['username']) || empty($email = $_POST['email']) || empty($password = $_POST['password']) || empty($confirmPassword = $_POST['confirmPassword']) || empty($age = $_POST['age'])) {
    echo '<script>alert("All Fields Required!")</script>';
  } else if ($_POST['password'] !== $_POST['confirmPassword']) {
    echo '<script>alert("Password and Confirm password should match!")</script>';
  } else if ($_POST['age'] <= 20) {
    echo '<script>alert("Underatted Age your Not Allowed! ")</script>';
  } else if (strlen($_POST['password']) < 12) {
    echo '<script>alert("Password should contain 12 above characters")</script>';
  } else if (mysqli_num_rows($result) > 0) {
    echo '<script>alert("Email is already exist")</script>';
  } else if (mysqli_num_rows($result) === 0) {
    $sql = "insert into tblaccount(username,email,password,age) values('$username','$email','$password','$age')";
    $result = mysqli_query($conn, $sql) or die("Error in adding account:" . mysqli_error($conn));
    mysqli_query($conn,$result);
  }
}
if(isset($_POST['loginButton'])){
  $email = $_POST['getEmail'];
  $password = $_POST['getPassword'];

  $sql =  "SELECT tblmembership.membershipId,tblmembership.dateOfMembershipEnds, tblmembership.dateOfMembership, tblmembership.accountId, tblaccount.accountId, tblaccount.username, tblaccount.email, tblaccount.password FROM tblaccount INNER JOIN tblmembership ON tblmembership.accountId = tblaccount.accountId;";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['id'] = $row['accountId'];
  $_SESSION['dateOfMembershipEnds'] = $row['dateOfMembershipEnds'];
  if(empty($email)){
    echo '<script>alert("Email is required!")</script>';
  }else if(empty($password)){
    echo '<script>alert("Password is required!")</script>';


  }else if(date('Y-m-d', strtotime($_SESSION['dateOfMembershipEnds'])) >= date("Y-m-d",strtotime(date("Y-m'd")))){
    echo '<script>alert("Your Subscription Mr/Ms: '.$_SESSION['username'].' is already expired")</script>';



  }else{
    $sql1 =  "SELECT * FROM tblaccount WHERE email='$email' AND password='$password'";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) === 1) {
        $row = mysqli_fetch_assoc($result1);
          $_SESSION['username'] = $row['username'];
        if ($row['email'] === $email && $row['password'] === $password) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['age'] =$row['age'];
            $_SESSION['age'] =$row['age'];
            $_SESSION['id'] = $row['accountId'];
            echo '<script>alert("'.$_SESSION['username'].' succesfully login")</script>';
            echo "<script> location.href='modal.php'; </script>";
            exit();
        }
      }else{
        echo '<script>alert("Wrong Email or Password!")</script>';
      }
  }
}

if(isset($_POST['initialMembership'])){
  $id = $_SESSION['id'];
  // $userRegisteredTime = $_SESSI  ON['dateOfMembership'];
  $typeofmembership = "Initial Membership";
  $membershipToEnd = date("Y-m-d");
  $membershipToEnd = date("Y-m-d", strtotime(date("Y-m-d", strtotime($_SESSION['dateOfMembership']))." + 40 day"));
  $sql = "insert into tblmembership(accountId,typeOfMembership,dateOfMembership,dateofMembershipEnds) values('$id','$typeofmembership','$membershipToEnd','$membershipToEnds')";
  $result = mysqli_query($conn, $sql) or die("Error in activating membership:" . mysqli_error($conn));
  echo '<script>alert("You are already part of our community!")</script>';
  echo "<script> location.href='index.php'; </script>";
  // $userRegisteredTime =  "SELECT * FROM tblmembership WHERE accountId='$id'";
  // $membershipToEnd = date("Y-m-d", strtotime(date("Y-m-d", strtotime($userRegisteredTime))." + 1 day"));
  // if(date("Y-m-d")<$membershipToEnd){
  //   echo '<script>alert("Membership is expired")</script>';
  // }else{
  //   echo '<script>alert("Your not yet member")</script>';
  // }
}else if(isset($_POST['membership'])){
  $email = $_SESSION['username'];
  echo '<script>alert("Welcome back Mr/Ms: '.$email.'")</script>';
}
