<?php
ob_start();
require("../database.php");
session_start();
echo '
   <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
   ';
//รับข้อมูลจาก form
$FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
$LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$tel = mysqli_real_escape_string($conn, $_POST['exampleNumber']);
$password = mysqli_real_escape_string($conn, $_POST['exampleInputPassword']);
$confirm_password = mysqli_real_escape_string($conn, $_POST['exampleRepeatPassword']);

if ($password != $confirm_password) {
    //เช็ครหัสผ่าน
    echo '
        <script>
            setTimeout(function(){
                swal({
                    title:"อรหัสไม่ถูกต้อง",
                    text: "กรุณาลองใหม่อีกครั้ง",
                    type: "warning"
                }, function() {
                    window.location = "register.php";
                })
            }, 1000);
        </script>
    ';
}

$user_check_query = "SELECT * FROM users WHERE email = '$email' ";
$query = mysqli_query($conn, $user_check_query);
$result = mysqli_fetch_assoc($query);

if ($result) { 
    //เช็คอีเมลซ้ำ
    echo '
        <script>
            setTimeout(function(){
                swal({
                    title:"อีเมลนี้เป็นสมาชิกเเล้ว",
                    text: "กรุณาลองใหม่อีกครั้ง",
                    type: "warning"
                }, function() {
                    window.location = "register.php";
                })
            }, 1000);
        </script>
    ';
}else {
    //เพิ่มข้อมูลลง DB
    $password = md5($password); //เปลี่ยนรหัสผ่านให้เป็นการเข้ารหัสMD5
    $sql = "INSERT INTO users (user_id, first_name, last_name, tel, email, password, status) 
    VALUES (NULL, '$FirstName', '$LastName', '$tel', '$email', '$password', 'User');";
    mysqli_query($conn, $sql);
    echo '
    <script>
        setTimeout(function(){
            swal({
                title:"สมัครสมาชิกสำเร็จ",
                text: "กรุณาเข้าสู่ระบบ",
                type: "success"
            }, function() {
                window.location = "login.php";
            })
        }, 1000);
    </script>';
}
