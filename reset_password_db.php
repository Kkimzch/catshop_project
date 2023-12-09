<?php
session_start();
echo '
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
        <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
        ';
require("database.php");
$errors = array();

    $user_id = $_SESSION['user_id'];
 
    $password_old = mysqli_real_escape_string($conn, $_POST['password']);
    $password = mysqli_real_escape_string($conn, $_POST['exampleInputPassword']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['exampleRepeatPassword']);

    if ($password != $confirm_password) {
        //เช็ครหัสผ่าน
        echo '
            <script>
                setTimeout(function(){
                    swal({
                        title:"รหัสไม่ถูกต้อง",
                        text: "กรุณาลองใหม่อีกครั้ง",
                        type: "warning"
                    }, function() {
                        window.location = "reset_password.php";
                    })
                }, 1000);
            </script>
        ';
    }
    else{
         $password_old = md5($password_old);
    $query = "SELECT * FROM users WHERE user_id = '$user_id' AND password = '$password_old' ";
    $result = mysqli_query($conn, $query);

    //ตรวจสอบรหัสผ่านเดิม
    if (mysqli_num_rows($result) == 1) {
        $password = md5($password);
        $upfor = "UPDATE users SET password = '$password' WHERE user_id = '$user_id' ";
        $query = mysqli_query($conn, $upfor);
        echo '
                <script>
                    setTimeout(function(){
                        swal({
                            title:"ดำเนินการเสร็จสิ้น",
                            text: "คุณได้ดำเนินการเปลี่ยนรหัสผ่าน",
                            type: "success"
                        }, function() {
                            window.location = "profile.php";
                        })
                    }, 1000);
                </script>
            ';
    } else {
        echo '
                <script>
                    setTimeout(function(){
                        swal({
                            title:"คุณเปลียนรหัสผ่านไม่สำเร็จ",
                            text: "รหัสผ่านเดิมของคุณไม่ถูกต้อง",
                            type: "warning"
                        }, function() {
                            window.location = "reset_password.php";
                        })
                    }, 1000);
                </script>
            ';
    }
    }
   
   
?>