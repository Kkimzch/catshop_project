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
                            <h1 class="h3 mb-0 text-gray-800">รายละเอียดคำสั่งซื้อ</h1>
                        </div>
                    </div>
                    <?php 
                        $order_id = $_GET['order_id'];
                        $user_id = $_SESSION['user_id'];
                        $sql = "SELECT * FROM `orders` WHERE order_id = '$order_id';";
                        $result = mysqli_query($conn, $sql);
                        $row = $result->fetch_assoc()
                       ?>
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                #<?php echo $row['order_id'];echo $row['time']; ?>
                            </div>
                            <div>
                                <?php
                                            if($row['status'] == 'รอตรวจสอบ'){
                                         ?>
                                <div class="text-warning text-center">
                                    รอตรวจสอบ
                                </div>
                                <?php
                                              }elseif ($row['status'] == 'เตรียมจัดส่ง') {
                                         ?>
                                <div class="text-primary text-center">
                                    กำลังจัดเตรียม
                                </div>
                                <?php  
                                             }elseif ($row['status'] == 'จัดส่งเเล้ว') {
                                             ?>
                                <div class="text-success">
                                    จัดส่งเเล้ว
                                </div>
                                <?php
                                          }
                                         else {
                                            ?>
                                <div class="text-danger">
                                    ยกเลิก
                                </div>
                                <?php
                                          }
                                             ?>
                            </div>
                        </div>
                        <?php
                        $order_id = $row['order_id'];
                        $sql2 = "SELECT * FROM `address` WHERE order_id = '$order_id';";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = $result2->fetch_assoc();
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class="m-0">
                                        ผู้รับ : <?php echo $row2['first_name'];?> <?php echo $row2['last_name'];?>
                                    </p>
                                    <p class="m-0 mt-2" div>
                                        เบอร์โทรศัพท์ : <?php echo $row2['tel'];?>
                                    </p>

                                    <p class="m-0 mt-2">
                                        ที่อยู่จัดส่ง : <?php echo $row2['address'];?> <?php echo $row2['district'];?>
                                        <?php echo $row2['area'];?> <?php echo $row2['province'];?>
                                        <?php echo $row2['post'];?>
                                    </p>
                                    <p class="m-0 mt-2" div>
                                        หมายเหตุ : <?php echo $row['message'];?>
                                    </p>
                                    <div class="row mt-2 p-0">
                                        <div class="col col-lg-3 ">
                                            หลักฐานการชำระเงิน
                                        </div>
                                        <div class="col">
                                            <p>
                                                <a data-toggle="collapse" href="#collapseExample" role="button"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    คลิ๊กเพื่อดูรูป
                                                </a>
                                                <div class="collapse" id="collapseExample">
                                                    <img src="../images/slip/<?php echo $row['slip']?>"
                                                        class="img-fluid" style="width: 250px;">
                                                </div>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col col-lg-3">
                                    <div class="d-flex justify-content-center">
                                        <div>
                                            <?php
                                            if($row['status'] == 'รอตรวจสอบ'){
                                         ?>
                                            <div align="center">
                                                <a href="#" data-toggle="modal" data-target="#confirmModal"
                                                    class="btn btn-success btn-icon-split mt-4">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">ยืนยันคำสั่งซื้อ</span>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-icon-split mt-1"
                                                    data-toggle="modal" data-target="#cancelModal">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">ยกเลิกออเดอร์</span>
                                                </a>
                                            </div>
                                            <?php
                                              }elseif ($row['status'] == 'เตรียมจัดส่ง') {
                                         ?>
                                            <form action="update-order.php" method="GET">
                                                <div>
                                                <input type="text" class="d-none" value="<?php echo $order_id; ?>" name="order_id">
                                                    <input type="text" class="form-control bg-light small mt-4"
                                                        placeholder="เพิ่มเลขพัสดุ" name="message" required>
                                                    <input type="text"
                                                        class="d-none form-control bg-light border-0 small mt-4"
                                                        placeholder="เพิ่มเลขพัสดุ" name="status" value="จัดส่งเเล้ว"
                                                        required>
                                                </div>
                                                <div align="center">
                                                    <button type="submit" class="btn btn-success btn-icon-split mt-2">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </span>
                                                        <span class="text">ส่งหมายเลขพัสดุ</span>
                                                    </button>
                                                </div>
                                            </form>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3"> สินค้าที่สั่งซื้อ </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ชื่อสินค้า</th>
                                            <th>จำนวน</th>
                                            <th>ราคา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql3 = "SELECT * FROM `order_detail` WHERE order_id = '$order_id';";
                                            $result3 = mysqli_query($conn, $sql3);
                                            while ($row3 = $result3->fetch_assoc()) {
                                            ?>
                                        <tr>
                                            <td><?php echo $row3['name'];?> </td>
                                            <td> <?php echo $row3['number']; ?></td>
                                            <td align="end">฿<?php echo $row3['total_price']; ?></td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>

                                </table>
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div class="text-dark">ราคาสินค้า</div>
                                        </div>
                                        <div>
                                            <div class="text-dark">฿<?php echo $row['total']; ?></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div>ค่าจัดส่ง</div>
                                        <div>฿<?php echo $row['shipping']; ?></div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div><strong class="text-primary">ราคาสุทธิ</strong></div>
                                        <div><strong class="text-primary">฿<?php echo $row['sometotal']; ?></strong>
                                        </div>
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

    <!-- cancel mpdal -->
    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">กรุณาระบุเหตุผลการยกเลิก</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update-order.php" method="GET">
                        <div class="col-auto my-1">
                            <input type="text" class="d-none" value="ยกเลิก" name="status">
                            <input type="text" class="d-none" value="<?php echo $order_id; ?>" name="order_id">
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="message" required>
                                <option value="หลักฐานการชำระเงินไม่ถูกต้อง" selected>
                                    หลักฐานการชำระเงินไม่ถูกต้อง</option>
                                <option value="อยู่นอกเวลาทำการ">อยู่นอกเวลาทำการ</option>
                                <option value="สินค้าหมด">สินค้าหมด</option>
                            </select>
                        </div>

                        <div class="modal-footer mt-4">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                            <button class="btn btn-danger" type="submit">ยืนยัน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- confirm mpdal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ยืนยันคำสั่งซื้อ</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update-order.php" method="GET">
                        <div class="col-auto my-1">
                            <input type="text" class="d-none" value="เตรียมจัดส่ง" name="status">
                            <input type="text" class="d-none" value="เตรียมจัดส่ง" name="message">
                            <input type="text" class="d-none" value="<?php echo $order_id; ?>" name="order_id">
                            <p>
                                ต้องการยืนยันคำสั่งซื้อ ?
                            </p>
                        </div>

                        <div class="modal-footer mt-4">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                            <button class="btn btn-success" type="submit">ยืนยัน</button>
                        </div>
                    </form>
                </div>
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