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

     if (isset($_GET['delete_blog_id'])) {
        $delete_id = $_GET['delete_blog_id'];
        $delet= $conn->query("DELETE FROM blog WHERE blog_id = $delete_id");

        if ($delet) {
            header("refresh:1; url=blog.php");
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

                    <!-- Page Heading -->
                    <div>
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">บทความ</h1>
                            <a href="add-blog.php" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">เพิ่มบทความใหม่</span>
                            </a>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">บทความทั้งหมด</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ชื่อบทความ</th>
                                            <th>รูปภาพ</th>
                                            <th>ผู้เเต่ง</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ชื่อบทความ</th>
                                            <th>รูปภาพ</th>
                                            <th>ผู้เเต่ง</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                             $sql = "SELECT * FROM `blog` ORDER BY `blog_id` DESC;";
                                             $result = mysqli_query($conn, $sql);
                                            while ($row = $result->fetch_assoc()) {
                                         ?>
                                        <tr>
                                            <td><?php echo $row['blog_title'];?></td>
                                            <td>
                                                <img src="../images/blog/<?php echo $row['img'];?>"
                                                    style="width: 50px;">

                                            </td>
                                            <td><?php echo $row['name'];?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="edit-blog.php?blog_id=<?php echo $row['blog_id']; ?>">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#deleteModal_<?php echo $row['blog_id']; ?>">
                                                        <i class="fas fa-trash px-3"></i>
                                                    </a>
                                                </div>
                                                <div class="modal fade"
                                                    id="deleteModal_<?php echo $row['blog_id']; ?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <!-- โค้ด modal ลบข้อมูล -->
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    ลบบทความ</h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">คุณต้องการลบ
                                                                <?php echo $row['name']; ?> &nbsp; ใช่ไหม</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-dismiss="modal">ยกเลิก</button>
                                                                <a class="btn btn-danger"
                                                                    href="blog.php?delete_blog_id=<?php echo $row['blog_id']; ?>">ยืนยัน</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function () {
                                                        // เมื่อคลิกที่ลิงก์ลบ
                                                        $('a[data-target^="#deleteModal"]').on('click',
                                                            function () {
                                                                var blog_id = $(this).data('productid');
                                                                // เปิด modal ลบ ที่มี ID ตาม blog_id
                                                                $('#deleteModal_' + blog_id).modal(
                                                                    'show');
                                                                console.log('Delete Product ID:',
                                                                    blog_id);
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