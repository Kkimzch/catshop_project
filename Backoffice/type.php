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
     if (isset($_GET['type_name'])) {
        $type_name = $_GET['type_name'];
        $addtype = "INSERT INTO `type` (`type_id`, `type_name`) VALUES (NULL, '$type_name');";
        if(mysqli_query($conn, $addtype)){
            header("location: type.php?message=บันทึก");
        }
    }
    //ลบ
    if (isset($_GET['delete_type_id'])) {
        $delete_id = $_GET['delete_type_id'];
        $delet= $conn->query("DELETE FROM type WHERE type_id = $delete_id");
    
        if ($delet) {
            header("location: type.php?message=บันทึก");
        } 
    }
    //แก้ไข
    if (isset($_GET['edit_type_name'])) {
        $type_name = $_GET['edit_type_name'];
        $type_id = $_GET['edit_type_id'];
        $edittype = $conn->prepare("UPDATE `type` SET `type_name` = '$type_name' WHERE `type`.`type_id` = $type_id;");
        $edittype->execute();
        if ($edittype) {
            header("location: type.php?message=บันทึก");
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
                    if (isset($_GET['message'])){
                        $message = $_GET['message'];
                        if($message == 'บันทึก'){
                        ?>
                    <div class="alert alert-success" role="alert">
                        บันทึกข้อมูลเสร็จสิ้น
                    </div>
                    <?php
                        } }  ?>
                    <!-- Page Heading -->
                    <div>
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">หมวดหมู่</h1>
                            <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal"
                                data-target="#AddModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">เพิ่มหมวดหมู่ใหม่</span>
                            </a>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">หมวดหมู่ทั้งหมด</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ชื่อหมวดหมู่</th>
                                            <th>จำนวนสินค้า</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ชื่อหมวดหมู่</th>
                                            <th>จำนวนสินค้า</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                             $sql = "SELECT * FROM `type` ORDER BY `type_id` DESC;";
                                             $result = mysqli_query($conn, $sql);
                                            while ($row = $result->fetch_assoc()) {
                                         ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['type_name'];?>
                                            </td>
                                            <td>
                                                <?php
                                            $id = $row["type_id"];
                                            $sql2 = "SELECT COUNT(*) AS total FROM product WHERE type_id=$id";
                                            $result2 = $conn->query($sql2);

                                            if ($result2->num_rows > 0) {
                                                $row2 = $result2->fetch_assoc();
                                                $total = $row2["total"];
                                                echo $total;
                                            } else {
                                                echo "ไม่พบข้อมูล";
                                            }
                                            ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#editModal_<?php echo $row['type_id']; ?>">
                                                        <i class="fas fa-pen pr-4"></i>
                                                    </a>
                                                    <?php
                                                    if($total == 0){
                                                    ?>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#deleteModal_<?php echo $row['type_id']; ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <?php
                                                    }else{
                                                        ?>
                                                        <a href="#" data-toggle="modal"
                                                        data-target="#nodeleteModal">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>

                                                <div class="modal fade" id="editModal_<?php echo $row['type_id']; ?>"
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
                                                            <form action="type.php" method="GET"
                                                                enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group mb-1">
                                                                        <label class="m-0">ชื่อหมวดหมู่<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control small"
                                                                            name="edit_type_name"
                                                                            value="<?php echo $row['type_name']; ?>"
                                                                            required>
                                                                            <input type="text" class="form-control small d-none"
                                                                            name="edit_type_id"
                                                                            value="<?php echo $row['type_id']; ?>"
                                                                            required>
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

                                                <div class="modal fade" id="deleteModal_<?php echo $row['type_id']; ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
                                                    <!-- โค้ด modal ลบข้อมูล -->
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    ลบหมวดหมู่</h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">คุณต้องการลบหมวดหมู่
                                                                <?php echo $row['type_name']; ?> &nbsp; ใช่ไหม</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-dismiss="modal">ยกเลิก</button>
                                                                <a class="btn btn-danger"
                                                                    href="type.php?delete_type_id=<?php echo $row['type_id']; ?>">ยืนยัน</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="nodeleteModal"
                                                    tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
                                                    <!-- โค้ด modal ลบข้อมูล -->
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    ลบหมวดหมู่</h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">ไม่สามารถลบหมวดหมู่นี้ได้ เนื่องจากมีสินค้าอยู่ในหมวดหมู่นี้</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-dismiss="modal">ยืนยัน</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function () {
                                                        // เมื่อคลิกที่ลิงก์แก้ไข
                                                        $('a[data-target^="#editModal"]').on('click',
                                                            function () {
                                                                var type_id = $(this).data('productid');
                                                                // เปิด modal แก้ไข ที่มี ID ตาม type_id
                                                                $('#editModal_' + type_id).modal('show');
                                                                console.log('Edit Product ID:', type_id);
                                                            });

                                                        // เมื่อคลิกที่ลิงก์ลบ
                                                        $('a[data-target^="#deleteModal"]').on('click',
                                                            function () {
                                                                var type_id = $(this).data('productid');
                                                                // เปิด modal ลบ ที่มี ID ตาม type_id
                                                                $('#deleteModal_' + type_id).modal(
                                                                    'show');
                                                                console.log('Delete Product ID:',
                                                                    type_id);
                                                            });
                                                    });
                                                </script>
                                            </td>
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
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มหมวดหมู่ใหม่</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="type.php" method="GET" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group mb-1">
                            <label class="m-0">ชื่อหมวดหมู่<span class="text-danger">*</span></label>
                            <input type="text" class="form-control small" name="type_name" required>
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
</body>

</html>