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

   
	?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CatShop. - Backoffice</title>

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
                            <h1 class="h3 mb-0 text-gray-800">เพิ่มบทความใหม่</h1>
                        </div>
                    </div>
                    <!-- Default Card Example -->
                    <div class="card mb-4">
                        <div class="card-header">
                            รายละเอียดบทความ
                        </div>
                        <div class="card-body">
                            <form method="POST" action="add-blog-db.php" enctype="multipart/form-data">
                                <div class="container">
                                    <input type="text" class="form-control form-control-user d-none" id="blog_id"
                                        name="blog_id" value="" required>
                                    <div class="row text-dark">
                                        <div class="col col-lg-3 align-self-center">ชื่อบทความ</div>
                                        <div class="col col-lg-9">
                                            <input type="text" class="form-control form-control-user" id="blog_title"
                                                name="blog_title" value="" required>
                                        </div>
                                    </div>
                                    <div class="row text-dark mt-3">
                                        <div class="col col-lg-3 align-self-center">ผู้เเต่ง</div>
                                        <div class="col col-lg-9">
                                            <input type="text" class="form-control form-control-user" id="name"
                                                name="name" required>
                                        </div>
                                    </div>
                                    <div class="row text-dark mt-3">
                                        <div class="col col-lg-3 align-self-start">เนื้อหา</div>
                                        <div class="col col-lg-9">
                                        <textarea class="form-control small"name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="row text-dark mt-3">
                                        <div class="col col-lg-3">รูปภาพ</div>
                                        <div class="col col-lg-9">
                                            <input type="file" class="form-control-file" id="imgInput" name="img">
                                            <img width="50%"
                                                id="previewImg" class="mt-2">
                                        </div>
                                    </div>
                                </div>
                                <div align="center" class="mt-5">
                                    <button class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                    <a class="btn btn-primary" data-toggle="modal"
                                        data-target="#confirmModal">บันทึก</a>
                                </div>
                                <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog"
                                    aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <!-- โค้ด modal  -->
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    บันทึกข้อมูลการแก้ไข</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">คุณต้องการบันทึกข้อมูลใช่หรือไม่ ?</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">ยกเลิก</button>
                                                <button class="btn btn-primary" type="submit">บันทึก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file);
            }
        }
    </script>

</body>

</html>