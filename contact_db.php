<?php
require("database.php");
session_start();
echo '
   <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
   ';
//รับข้อมูลจาก form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$message = $_POST['message'];

$sql ="INSERT INTO `contactus` (`contactus_id`, `fist_name`, `last_name`, `email`, `tel`, `message`) 
VALUES (NULL, '$fname', '$lname', '$email', '$tel', '$message');";
 mysqli_query($conn, $sql);
 echo '
 <script>
     setTimeout(function(){
         swal({
             title:"ดำเนินการเสร็จสิ้น",
             text: "ระบบได้บันทึกข้อมูลการติดต่อจากคุณเเล้ว",
             type: "success"
         }, function() {
             window.location = "index.php";
         })
     }, 1000);
 </script>';
?>