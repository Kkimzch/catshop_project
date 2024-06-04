<!DOCTYPE html>
<html lang="en">

<head>
    <?php
	require("../database.php");
	session_start();
    if (!isset($_SESSION['email'])) {
    header('location: Backoffice/login.php');
    }

	 if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['email']);
	 }
     //เพิ่ม
     if (isset($_POST['FirstName'])) {
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
                //เช็คอีเมลซ้ำ
                header("location: user.php?status=Admin&message=อีเมลซ้ำ");
            }else {
                //เพิ่มข้อมูลลง DB
                $password = md5($password); //เปลี่ยนรหัสผ่านให้เป็นการเข้ารหัสMD5
                $sql2 = "INSERT INTO users (user_id, first_name, last_name, tel, email, password, status) 
                VALUES (NULL, '$FirstName', '$LastName', '$tel', '$email', '$password', 'Admin');";
                mysqli_query($conn, $sql2);
                header("location: user.php?status=Admin&message=เพิ่มเเล้ว");
            }
            }
    }
    //ลบ
    if (isset($_GET['delete_user_id'])) {
        $delete_id = $_GET['delete_user_id'];
        $delet= $conn->query("DELETE FROM users WHERE user_id = $delete_id");
    
        if ($delet) {
            header("location: user.php?status=Admin&message=ลบเเล้ว");
        } 
    }
     ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>Kitschi Plus - Backoffice</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Kanit:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require('include/sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require('include/topbar.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    if (isset($_GET['message'])) {
                        $message = $_GET['message'];

                        if($message == 'รหัสไม่ถูกต้อง'){
                        ?>
                    <div class="alert alert-danger" role="alert">
                        ไม่สามารถบันทึกข้อมูลได้ : รหัสผ่านไม่ถูกต้อง
                    </div>
                    <?php
                        $status = 'Admin';
                        }elseif($message == 'อีเมลซ้ำ'){
                            ?>
                    <div class="alert alert-danger" role="alert">
                        ไม่สามารถบันทึกข้อมูลได้ : มีอีเมลนี้เป็นสมาชิกอยู่เเล้ว
                    </div>
                    <?php
                            $status = 'Admin';
                        }elseif($message == 'ลบเเล้ว'){
                            ?>
                    <div class="alert alert-success" role="alert">
                        ลบข้อมูลเสร็จสิ้น
                    </div>
                    <?php  
                        }
                        else{
                            ?>
                    <div class="alert alert-success" role="alert">
                        บันทึกข้อมูลเสร็จสิ้น
                    </div>
                    <?php
                    $status = 'Admin';
                        }
                    }
                    ?>
                    <!-- Page Heading -->
                    <div>
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">บัญชีผู้ใช้<?php 
                            $status = $_GET['status'];
                                if($status == 'Admin'){
                                    echo 'Admin';
                                }else{
                                    echo 'ลูกค้า';
                                }
                                ?>
                            </h1>
                            <?php 
                                if($status == 'Admin'){
                                        ?>
                            <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal"
                                data-target="#AddModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">เพิ่มบัญชีผู้ใช้</span>
                            </a>
                            <?php
                                }else{
                                }
                            ?>

                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">รายชื่อบัญชีผู้ใช้</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>ชื่อ - นามสกุล</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <?php 
                                                if($status == 'Admin'){
                                                        ?>
                                            <th>จัดการ</th>
                                            <?php
                                                }else{
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>User ID</th>
                                            <th>ชื่อ - นามสกุล</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <?php 
                                                if($status == 'Admin'){
                                                        ?>
                                            <th>จัดการ</th>
                                            <?php
                                                }else{
                                                }
                                            ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                             $sql = "SELECT * FROM `users` WHERE status ='$status' ORDER BY `user_id` DESC;";
                                             $result = mysqli_query($conn, $sql);
                                            while ($row = $result->fetch_assoc()) {
                                         ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['user_id'];?>
                                            </td>
                                            <td>
                                                <?php echo $row['first_name'];?>
                                                <?php echo $row['last_name'];?>
                                            </td>
                                            <td>
                                                <?php echo $row['tel'];?>
                                            </td>
                                            <?php 
                                                if($status == 'Admin'){
                                                        ?>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#editModal_<?php echo $row['user_id']; ?>">
                                                        <i class="fas fa-pen pr-4"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#deleteModal_<?php echo $row['user_id']; ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>

                                                <div class="modal fade" id="editModal_<?php echo $row['user_id']; ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                                                    aria-hidden="true">
                                                    <!-- โค้ด modal แก้ไขข้อมูล -->
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    แก้ไขข้อมูล</h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form action="user-edit-db.php" method="POST"
                                                                enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group row mb-1">
                                                                        <div class="col-sm-6 mb-sm-0">
                                                                            <label class="m-0">ชื่อ<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" min="0"
                                                                                class="form-control small"
                                                                                name="FirstName"
                                                                                value="<?php echo $row['first_name']; ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="m-0">นามสกุล<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" min="0"
                                                                                class="form-control small"
                                                                                name="LastName"
                                                                                value="<?php echo $row['last_name']; ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label class="m-0">เบอร์โทรศัพท์<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control small"
                                                                            name="exampleNumber" pattern="[0-9]{10}"
                                                                            value="<?php echo $row['tel']; ?>" required>
                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label class="m-0">อีเมล<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="email" class="form-control small"
                                                                            name="email"
                                                                            value="<?php echo $row['email']; ?>"
                                                                            readonly required>
                                                                    </div>

                                                                    <div class="form-group row mb-1">
                                                                        <div class="col-sm-6 mb-sm-0">
                                                                            <label class="m-0">รหัสผ่าน<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="password" min="0"
                                                                                class="form-control small"
                                                                                name="exampleInputPassword"
                                                                                id="exampleInputPassword" required>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="m-0">ยืนยัน<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="password"
                                                                                class="form-control small"
                                                                                name="exampleRepeatPassword"
                                                                                id="exampleRepeatPassword" required>
                                                                        </div>
                                                                        <!-- error รหัสผ่านไม่ถูก -->
                                                                        <span class="pl-3 small mt-1"
                                                                            id="password_error"
                                                                            style="color: red;"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary"
                                                                        data-dismiss="modal">ยกเลิก</button>
                                                                    <button class="btn btn-primary"
                                                                        type="submit">ยืนยัน</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="deleteModal_<?php echo $row['user_id']; ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
                                                    <!-- โค้ด modal ลบข้อมูล -->
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    ลบหมวดบัญชีผู้ใช้</h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">ลบหมวดบัญชีผู้ใช้
                                                                <?php echo $row['first_name']; ?>
                                                                <?php echo $row['last_name']; ?> ใช่ไหม</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-dismiss="modal">ยกเลิก</button>
                                                                <a class="btn btn-danger"
                                                                    href="user.php?delete_user_id=<?php echo $row['user_id']; ?>">ยืนยัน</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function () {
                                                        // เมื่อคลิกที่ลิงก์แก้ไข
                                                        $('a[data-target^="#editModal"]').on('click',
                                                            function () {
                                                                var user_id = $(this).data('productid');
                                                                // เปิด modal แก้ไข ที่มี ID ตาม user_id
                                                                $('#editModal_' + user_id).modal('show');
                                                                console.log('Edit Product ID:', user_id);
                                                            });

                                                        // เมื่อคลิกที่ลิงก์ลบ
                                                        $('a[data-target^="#deleteModal"]').on('click',
                                                            function () {
                                                                var user_id = $(this).data('productid');
                                                                // เปิด modal ลบ ที่มี ID ตาม user_id
                                                                $('#deleteModal_' + user_id).modal(
                                                                    'show');
                                                                console.log('Delete Product ID:',
                                                                    user_id);
                                                            });
                                                    });
                                                </script>
                                            </td>
                                            <?php
                                                }else{
                                                }
                                            ?>

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
           require('include/footer.php'); 
           ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php require('include/modal-logout.php');
    ?>
    <!-- Add type Modal -->
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มบัญชีผู้ใช้</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="user.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group row mb-1">
                            <div class="col-sm-6 mb-sm-0">
                                <label class="m-0">ชื่อ<span class="text-danger">*</span></label>
                                <input type="text" min="0" class="form-control small" name="FirstName" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="m-0">นามสกุล<span class="text-danger">*</span></label>
                                <input type="text" min="0" class="form-control small" name="LastName" required>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="m-0">เบอร์โทรศัพท์<span class="text-danger">*</span></label>
                            <input type="text" class="form-control small" name="exampleNumber" pattern="[0-9]{10}"
                                required>
                        </div>
                        <div class="form-group mb-1">
                            <label class="m-0">อีเมล<span class="text-danger">*</span></label>
                            <input type="email" class="form-control small" name="email" required>
                        </div>

                        <div class="form-group row mb-1">
                            <div class="col-sm-6 mb-sm-0">
                                <label class="m-0">รหัสผ่าน<span class="text-danger">*</span></label>
                                <input type="password" min="0" class="form-control small" name="exampleInputPassword"
                                    id="exampleInputPassword" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="m-0">ยืนยัน<span class="text-danger">*</span></label>
                                <input type="password" class="form-control small" name="exampleRepeatPassword"
                                    id="exampleRepeatPassword" required>
                            </div>
                            <!-- error รหัสผ่านไม่ถูก -->
                            <span class="pl-3 small mt-1" id="password_error" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button class="btn btn-primary" type="submit">ยืนยัน</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        // ฟังก์ชันตรวจสอบรหัสผ่าน
        function validatePassword() {
            var exampleInputPassword = document.getElementById("exampleInputPassword").value;
            var exampleRepeatPassword = document.getElementById("exampleRepeatPassword").value;
            var password_error = document.getElementById("password_error");

            if (exampleInputPassword !== exampleRepeatPassword) {
                password_error.textContent = "รหัสผ่านไม่ตรงกัน";
            } else {
                password_error.textContent = "";
            }
        }

        var exampleRepeatPassword = document.getElementById("exampleRepeatPassword");
        exampleRepeatPassword.addEventListener("input", validatePassword);
    </script>
</body>

</html>