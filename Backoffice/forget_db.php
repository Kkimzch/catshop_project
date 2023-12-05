<?php
session_start();
require("../database.php");
$errors = array();
    echo '
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
        <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
        ';

    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $password = mysqli_real_escape_string($conn, $_GET['exampleInputPassword']);
    $confirm_password = mysqli_real_escape_string($conn, $_GET['exampleRepeatPassword']);

    if ($password != $confirm_password) {
        array_push($errors, "The two passwords do not match");
        echo '
                <script>
                    setTimeout(function(){
                        swal({
                            title:"รหัสผ่านหรืออีเมลไม่ถูกต้อง",
                            text: "คุณเปลี่ยนรหัสผ่านไม่สำเร็จ",
                            type: "warning"
                        }, function() {
                            window.location = "forgot-password.php";
                        })
                    }, 1000);
                </script>
            ';
    }
    if (count($errors) == 0) {
        // เช็คอีเมล
        $query = "SELECT * FROM users WHERE email = '$email' AND status != 'Admin'";
        $result = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($result) == 1) {
            $password = md5($password);
            $upfor = "UPDATE users SET password = '$password' WHERE email = '$email'   ";
            $query = mysqli_query($conn, $upfor);
            echo '
                    <script>
                        setTimeout(function(){
                            swal({
                                title:"คุณเปลี่ยนรหัสผ่านเรียบร้อย",
                                text: "กรุณาเข้าสู่ระบบ",
                                type: "success"
                            }, function() {
                                window.location = "login.php";
                            })
                        }, 1000);
                    </script>
                ';
        } else {
            echo '
                    <script>
                        setTimeout(function(){
                            swal({
                                title:"อีเมลไม่ถูกต้อง",
                                text: "คุณเปลี่ยนรหัสผ่านไม่สำเร็จ",
                                type: "warning"
                            }, function() {
                                window.location = "forgot-password.php";
                            })
                        }, 1000);
                    </script>
                ';
        }
    }

?>