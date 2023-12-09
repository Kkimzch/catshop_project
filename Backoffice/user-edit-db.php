<?php
ob_start();
require("../database.php");
session_start();
//รับข้อมูลจาก form
$FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
$LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$tel = mysqli_real_escape_string($conn, $_POST['exampleNumber']);
$password = mysqli_real_escape_string($conn, $_POST['exampleInputPassword']);
$confirm_password = mysqli_real_escape_string($conn, $_POST['exampleRepeatPassword']);

if ($password != $confirm_password) {
    //เช็ครหัสผ่าน
    header("location: user.php?status=Admin&message=รหัสไม่ถูกต้อง");
}else{
    $user_check_query = "SELECT * FROM users WHERE email = '$email' ";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) { 
        //แก้ไข DB
        $password = md5($password); //เปลี่ยนรหัสผ่านให้เป็นการเข้ารหัสMD5
        $sql = "UPDATE `users` 
        SET `first_name` = '$FirstName', `last_name` = '$LastName', `tel` = '$tel', `password` = '$password' 
        WHERE `users`.`email` = '$email';";
        mysqli_query($conn, $sql);
        header("location: user.php?status=Admin&message=เพิ่มเเล้ว");
    }else {
        
    }
}




