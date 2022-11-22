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
  if(empty($email)){
    echo '<script>alert("Email is required!")</script>';
  }else if(empty($password)){
    echo '<script>alert("Password is required!")</script>';
  }else{
    $sql =  "SELECT * FROM tblaccount WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['password'] === $password) {
            echo '<script>alert("Login successful!")</script>';
            $_SESSION['email'] = $row['email'];
            $_SESSION['age'] =$row['age'];
            $_SESSION['age'] =$row['age'];
            $_SESSION['id'] = $row['accountId'];
            echo '<script>alert("'.$_SESSION['username'].'succesfully login")</script>';
            header("Location: modal.php");
            exit();
        }
      }else{
        echo '<script>alert("Wrong Email or Password!")</script>';
      }
  }
}
if(isset($_POST['initialMembership'])){
  $id = $_SESSION['id'];
  // $userRegisteredTime = $_SESSION['dateOfMembership'];
  $typeofmembership = "Initial Membership";
  $membershipToEnd = date("Y-m-d");
  $sql = "insert into tblmembership(accountId,typeOfMembership,dateOfMembership) values('$id','$typeofmembership','$membershipToEnd')";
  $result = mysqli_query($conn, $sql) or die("Error in activating membership:" . mysqli_error($conn));
  mysqli_query($conn,$result);
  // $sql = "insert into tblmembership(membershipId,accountId,typeOfMembership,dateOfMembership) values('$username','$email','$password','$age')";
  // $typeofmembership = "initial membership";
  // $sql = "insert into tblmembership(membershipId,accountId,typeOfMembership,dateOfMembership) values('$username','$email','$password','$age')";
  // $userRegisteredTime = $row['dateOfMembership'];
  $userRegisteredTime =  "SELECT * FROM tblmembership WHERE accountId='$id'";
  $membershipToEnd = date("Y-m-d", strtotime(date("Y-m-d", strtotime($userRegisteredTime))." + 1 day"));
  if(date("Y-m-d")<$membershipToEnd){
    echo '<script>alert("Membership is expired")</script>';
  }else{
    echo '<script>alert("Your not yet member")</script>';
  }
}else if(isset($_POST['membership'])){
  $email = $_SESSION['username'];
  echo '<script>alert("Welcome back Mr/Ms: '.$email.'")</script>';
}
