<?php
$db_user =  "root";
$db_pass =  "";
$db_name = "item_accounts";

$db = new PDO('mysql:host=localhost;dbname=' .$db_name. ';charset-utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<?php
$db_server = "localhost";
$db_user =  "root";
$db_pass =  "";
$db_name = "item_accounts";

$conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
if ($conn->connect_error) {
    echo "Failed to connect!" .mysqli_connect_errno();
}else{
    
}
?>
