<?php
include 'api/connection.php';
$data = $_GET['id'];
mysqli_query($con,"delete from notification where notification_id = '$data'");
header("location:notification.php");
?>