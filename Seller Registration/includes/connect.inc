<?php

$conn = mysqli_connect("<host>","<root>","<password>") or die("Cannot connect to mysql server");

mysqli_select_db($conn,"seller_register") or die("Cannot connect to database");