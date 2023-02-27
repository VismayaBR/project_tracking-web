<?php
include 'api/connection.php';
$data = $_GET['id'];
mysqli_query($con,"delete from uploads where u_id = '$data'");
header("location:files.php");
?>