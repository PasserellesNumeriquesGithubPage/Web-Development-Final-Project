<?php
ob_start();
session_start();
session_unset();
echo "Logging Out. Redirecting to login page in 2 seconds.";
header("Refresh: 2; url=index.php");
?>