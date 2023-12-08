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
                            <h1 class="h3 mb-0 text-gray-800">ติดต่อเรา</h1>
                        </div>
                    </div>
                    <?php 
                        $contactus_id = $_GET['contactus_id'];
                        $sql = "SELECT * FROM `contactus` WHERE contactus_id = '$contactus_id';";
                        $result = mysqli_query($conn, $sql);
                        $row = $result->fetch_assoc()
                       ?>
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                รายละเอียด
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row text-dark">
                                    <div class="col col-lg-3 align-self-center">ชื่อผู้ติดต่อ</div>
                                    <div class="col col-lg-9">
                                        <?php echo $row['first_name']; ?>
                                        <?php echo $row['last_name']; ?>
                                    </div>
                                </div>
                                <div class="row text-dark mt-3">
                                    <div class="col col-lg-3 align-self-center">อีเมล</div>
                                    <div class="col col-lg-9">
                                        
                                        <a href="mailto:<?php echo $row['email']; ?>" class="email-icon-button"
                                            target="_blank">
                                            <?php echo $row['email']; ?>
                                            <i class="fas fa-paper-plane"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row text-dark mt-3">
                                    <div class="col col-lg-3 align-self-center">เบอร์โทรศัพท์</div>
                                    <div class="col col-lg-9">
                                        <?php echo $row['tel']; ?>
                                    </div>
                                </div>
                                <div class="row text-dark mt-3">
                                    <div class="col col-lg-3 align-self-center">ข้อความ</div>
                                    <div class="col col-lg-9">
                                        <?php echo $row['message']; ?>
                                    </div>
                                </div>
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