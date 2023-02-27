<?php
include 'api/connection.php';
$data = $_GET['id'];
mysqli_query($con,"delete from `group` where login_id = '$data'");
mysqli_query($con,"delete from `login` where login_id = '$data'");
header("location:groups.php");
?>