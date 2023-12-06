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
                            <h1 class="h3 mb-0 text-gray-800">รายงานเลือกตามช่วงเวลา</h1>
                        </div>
                    </div>
                    <!-- Default Card Example -->
                    <div class="card mb-4">
                        <div class="card-header">
                            เลือกช่วงเวลา
                        </div>
                        <div class="card-body">
                            <form method="POST" action="report.php">
                                <div class="row">
                                    <div class="col">
                                        <input type="date" name="start_date" class="form-control">
                                    </div>
                                    <div class="col">
                                        <input type="date" name="end_date" class="form-control">
                                    </div>
                                    <div class="col col-lg-1">
                                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">รายงานเลือกตามช่วงเวลา</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>หมายเลขคำสั่งซื้อ</th>
                                            <th>ผู้รับ</th>
                                            <th>เวลาที่สั่งซื้อ</th>
                                            <th>จำนวน</th>
                                            <th>ราคารวม</th>
                                            <th>สถานะ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $start_date = @$_POST['start_date'];
                                        $end_date = @$_POST['end_date'];
                                        $true_enddate = date('y/m/d', strtotime($end_date . "+1 day"));

                                        if (($start_date != '') & ($end_date != '')) {
                                            echo "ค้นหาจากวันที่ $start_date ถึง $end_date ";
                                            $sql = "select * from orders WHERE STATUS ='จัดส่งเเล้ว' AND time BETWEEN '$start_date' AND '$true_enddate'
                                            order by time DESC  ";
                                        } else {
                                            $sql = "select * from orders WHERE STATUS ='จัดส่งเเล้ว' order by time DESC  ";
                                        }
                                        $result = mysqli_query($conn, $sql);
                                        $total_all = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            $total_all = $total_all + $row['sometotal'];
                                        ?>
                                        <tr>
                                            <td><a
                                                    href="order_detail.php?order_id=<?php echo $row['order_id'];?>">#<?php echo $row['order_id'];echo $row['time']; ?></a>
                                            </td>
                                            <td>
                                                <?php
                                                    $order_id = $row['order_id'];
                                                    $sql2 = "SELECT * FROM `address` WHERE order_id = '$order_id';";
                                                    $result2 = mysqli_query($conn, $sql2);
                                                    $row2 = $result2->fetch_assoc();
                                                    echo $row2['first_name']; 
                                                    ?>
                                                <?php echo $row2['last_name'];?></td>
                                            <td><?php echo $row['time'];?></td>
                                            <td>
                                                <?php
                                                    $sql3 ="SELECT COUNT(*) AS total FROM order_detail WHERE order_id=$order_id";
                                                    $result3 = $conn->query($sql3);
                                                    if ($result3->num_rows > 0) {
                                                        $row3 = $result3->fetch_assoc();
                                                        $total = $row3["total"];
                                                        echo $total;
                                                    } else {
                                                        echo "ไม่พบข้อมูล";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $row['sometotal'];?></td>
                                            <td>
                                                <?php
                                        if($row['status'] == 'รอตรวจสอบ'){
                                        ?>
                                                <div class="text-warning">
                                                    รอตรวจสอบ
                                                </div>

                                                <?php
                                        }elseif ($row['status'] == 'กำลังจัดเตรียม') {
                                        ?>
                                                <div class="text-primary">
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
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <div class="text-dark">ยอดรวมทั้งหมด</div>
                                    </div>
                                    <div>
                                        <div class="text-dark">฿<?php echo number_format($total_all, 2) ?></div>
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