<?php
ob_start();
require("../database.php");
session_start();
echo '
   <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
   ';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['tel'] = $row['tel'];
            $_SESSION['password'] = $row['password'];
            $status = $row['status'];
            $user_id = $row['user_id'];
            if ($status === 'Admin') {
                header("location:index.php");
                }
             else {
                header("location:../index.php");
            }
        }
        echo '
        <script>
            setTimeout(function(){
                swal({
                    title:"อีเมลหรือรหัสไม่ถูกต้อง",
                    text: "กรุณาเข้าสู่ระบบใหม่อีกครั้ง",
                    type: "warning"
                }, function() {
                    window.location = "login.php";
                })
            }, 1000);
        </script>
    ';
    ?>