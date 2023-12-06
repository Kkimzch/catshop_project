<?php
ob_start();
require("../database.php");
session_start();
echo '
   <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
   ';


$order_id = $_GET['order_id'];
$status = $_GET['status'];
$message = $_GET['message'];


$sql = "UPDATE `orders` SET `message` = '$message', `status` = '$status' WHERE `orders`.`order_id` = $order_id;";
$result = mysqli_query($conn, $sql);

if ($sql) {
    header("refresh:2; url=order_detail.php?order_id=$order_id");
}
    
?>