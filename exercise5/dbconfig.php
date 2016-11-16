<?php
$host = "localhost";
$user = "root";
$password = "";
$datbase = "dbtuts";
$con = new mysqli($host, $user, $password);

mysqli_select_db($con, $datbase) or die(mysqli_error($con));
?>