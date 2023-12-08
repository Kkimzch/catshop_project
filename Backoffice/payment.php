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

    //แก้ไข
    if (isset($_POST['bank_id'])) {
        $account_name = $_POST['account_name'];
        $bank_name = $_POST['bank_name'];
        $account_number = $_POST['account_number'];
        $PromptPay = $_POST['PromptPay'];
        
        $img = $_FILES['img'];
        $img2 = $_POST['img2'];
        $upload = $_FILES['img']['name'];

        if ($upload != '') {
            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode(".", $img['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;
            $filePath = "../images/" . $fileNew;

            if (in_array($fileActExt, $allow)) {
                if ($img['size'] > 0 && $img['error'] == 0) {
                    move_uploaded_file($img['tmp_name'], $filePath);
                }
            }
        } else {
            $fileNew = $img2;
        }

            $edittype = $conn->prepare("UPDATE `payment` SET `bank_name` = '$bank_name', `account_number` = '$account_number', `account_name` = '$account_name', `PromptPay` = '$PromptPay', `img` = '$fileNew' WHERE `payment`.`id` = 1;");
            $edittype->execute();
            if ($edittype) {
                // header("refresh:2; url=payment.php");
            }
        
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
                            <h1 class="h3 mb-0 text-gray-800">ช่องทางการชำระเงิน</h1>
                        </div>
                    </div>
                    <!-- Default Card Example -->
                    <div class="card mb-4">
                        <div class="card-header">
                            รายละเอียดการชำระเงิน
                        </div>
                        <div class="card-body">
                            <form method="POST" action="payment.php" enctype="multipart/form-data">
                                <?php
                                 $sql = "SELECT * FROM `payment` WHERE id=1;";
                                 $result = mysqli_query($conn, $sql);
                                 $row = $result->fetch_assoc()
                                ?>
                                <div class="container">
                                    <input type="text" class="form-control form-control-user d-none" id="bank_id"
                                        name="bank_id" value="<?php echo $row['id']; ?>" required>
                                    <div class="row text-dark">
                                        <div class="col col-lg-3 align-self-center">ชื่อบัญชี</div>
                                        <div class="col col-lg-9">
                                            <input type="text" class="form-control form-control-user" id="account_name"
                                                name="account_name" value="<?php echo $row['account_name']; ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row text-dark mt-3">
                                        <div class="col col-lg-3 align-self-center">ธนาคาร</div>
                                        <div class="col col-lg-9">
                                            <input type="text" class="form-control form-control-user" id="bank_name"
                                                name="bank_name" value="<?php echo $row['bank_name']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row text-dark mt-3">
                                        <div class="col col-lg-3 align-self-center">เลขที่บัญชี</div>
                                        <div class="col col-lg-9">
                                            <input type="text" class="form-control form-control-user" id="PromptPay"
                                                name="account_number" value="<?php echo $row['account_number']; ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row text-dark mt-3">
                                        <div class="col col-lg-3 align-self-center">พร้อมเพย์</div>
                                        <div class="col col-lg-9">
                                            <input type="text" class="form-control form-control-user" id="PromptPay"
                                                name="PromptPay" value="<?php echo $row['PromptPay']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row text-dark mt-3">
                                        <div class="col col-lg-3">QR-CODE</div>
                                        <div class="col col-lg-9">
                                            <input type="file" class="form-control-file" id="imgInput" name="img">
                                            <input type="hidden" value="<?php echo $row['img']; ?>" required
                                                class="form-control" name="img2">
                                            <img width="50%" src="../images/<?php echo $row['img']; ?>" id="previewImg"
                                                class="mt-2">
                                        </div>
                                    </div>
                                </div>
                                <div align="center" class="mt-5">
                                    <button class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                    <a class="btn btn-primary" data-toggle="modal"
                                                        data-target="#confirmModal">บันทึก</a>

                                </div>
                                <div class="modal fade" id="confirmModal" tabindex="-1"
                                    role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
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