<?php
session_start();
echo '
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
        <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
        ';
require("database.php");
    $user_id = $_SESSION['user_id'];
    $first_name = $_POST['c_fname'];
    $lastst_name = $_POST['c_lname'];
    $tel = $_POST['c_tel'];

    $sql = "UPDATE `users` 
            SET `first_name` = '$first_name', `last_name` = '$lastst_name', `tel` = '$tel' 
            WHERE `users`.`user_id` = $user_id;";
    $result = mysqli_query($conn, $sql);
         echo '
                    <script>
                        setTimeout(function(){
                            swal({
                                title:"ดำเนินการเสร็จสิ้น",
                                text: "คุณได้ดำเนินการแก้ไขโปรไฟล์",
                                type: "success"
                            }, function() {
                                window.location = "profile.php";
                            })
                        }, 1000);
                    </script>
                ';
?>