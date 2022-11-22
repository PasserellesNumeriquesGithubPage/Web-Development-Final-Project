<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>
<body>
    YOU ARE ALREADY IN ADMIN DASHBOARD!!!...

    <input class="submit" type="submit" name="logoutButton">
    <?php
    if(isset($_GET['logoutButton'])){
        echo '<script>alert("Logout successful!")</script>';
        header("Location: index.php");
        session_destroy();
        exit();
    }
    ?>
</body>
</html>