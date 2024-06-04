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

     if (isset($_GET['delete_product_id'])) {
        $delete_id = $_GET['delete_product_id'];
        $delet= $conn->query("DELETE FROM product WHERE product_id = $delete_id");

        if ($delet) {
            header("location: product.php?message=บันทึก");
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
                            <h1 class="h3 mb-0 text-gray-800">สินค้า</h1>
                            <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal"
                                data-target="#AddModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">เพิ่มสินค้าใหม่</span>
                            </a>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">สินค้าทั้งหมด </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>หมวดหมู่</th>
                                            <th>ชื่อเมนู</th>
                                            <th>รูปภาพ</th>
                                            <th>สต็อก</th>
                                            <th>ราคา</th>
                                            <th>สถานะ</th>
                                            <th>จัดการ</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>หมวดหมู่</th>
                                            <th>ชื่อเมนู</th>
                                            <th>รูปภาพ</th>
                                            <th>สต็อก</th>
                                            <th>ราคา</th>
                                            <th>สถานะ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                             $sql = "SELECT * FROM `product` ORDER BY `product_id` DESC;";
                                             $result = mysqli_query($conn, $sql);
                                            while ($row = $result->fetch_assoc()) {
                                         ?>
                                        <tr>

                                            <td>
                                                <?php
                                                    $type_id = $row['type_id'];
                                                    $sql2 = "SELECT * FROM `type` WHERE type_id = '$type_id';";
                                                    $result2 = mysqli_query($conn, $sql2);
                                                    $row2 = $result2->fetch_assoc();
                                                    echo $row2['type_name']; 
                                                    ?>
                                            </td>
                                            <td><?php echo $row['name'];?></td>
                                            <td>
                                                <img src="../images/product/<?php echo $row['img'];?>"
                                                    style="width: 50px;">

                                            </td>
                                            <td><?php echo $row['QTY'];?></td>
                                            <td><?php echo $row['price'];?></td>
                                            <td>
                                                <?php 
                                                if($row['status'] == 'Y'){
                                                    echo "on";
                                                }else{
                                                    echo "off";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#editModal_<?php echo $row['product_id']; ?>">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#deleteModal_<?php echo $row['product_id']; ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>


                                                <div class="modal fade" id="editModal_<?php echo $row['product_id']; ?>"
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
                                                            <form action="edit-product-db.php" method="POST"
                                                                enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group mb-1">
                                                                        <label class="m-0">หมวดหมู่<span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="col-auto p-0">
                                                                            <select class="custom-select mr-sm-2 small"
                                                                                id="inlineFormCustomSelect"
                                                                                name="type_id" required>
                                                                                <option value="<?php echo $row['type_id'];?>">
                                                                                <?php
                                                                                    $type_id = $row['type_id'];
                                                                                    $sql4 = "SELECT * FROM `type` WHERE type_id = $type_id ";
                                                                                    $result4 = mysqli_query($conn, $sql4);
                                                                                    $row4 = $result4->fetch_assoc();
                                                                                    echo $row4['type_name'];
                                                                                    ?>
                                                                                </option>
                                                                                <?php
                                                                                    $sql3 = "SELECT * FROM `type` WHERE type_id != $type_id;";
                                                                                    $result3 = mysqli_query($conn, $sql3);
                                                                                while ($row3 = $result3->fetch_assoc()) {
                                                                                ?>

                                                                                <option
                                                                                    value="<?php echo $row3['type_id'];?>">
                                                                                    <?php echo $row3['type_name'];?>
                                                                                </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label class="m-0">ชื่อสินค้า<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control small"
                                                                            name="name"
                                                                            value="<?php echo $row['name']; ?>"
                                                                            required>
                                                                        <input type="text"
                                                                            class="d-none form-control small"
                                                                            name="product_id"
                                                                            value="<?php echo $row['product_id']; ?>"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label class="m-0">รายละเอียด</label>
                                                                        <textarea class="form-control small"
                                                                            name="description"><?php echo $row['description']; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group row mb-1">
                                                                        <div class="col-sm-6 mb-sm-0">
                                                                            <label class="m-0">ราคา<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="number" min="0"
                                                                                class="form-control small" name="price"
                                                                                required
                                                                                value="<?php echo $row['price']; ?>">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="m-0">หน่วย<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text"
                                                                                class="form-control small" name="unit"
                                                                                required
                                                                                value="<?php echo $row['unit']; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row mb-1">
                                                                        <div class="col-sm-6 mb-sm-0">
                                                                            <label class="m-0">น้ำหนัก/หน่วย<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="number"
                                                                                value="<?php echo $row['weight']; ?>"
                                                                                min="0" class="form-control small"
                                                                                name="weight" required>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="m-0">สต็อก<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="number" min="0"
                                                                                class="form-control small" name="QTY"
                                                                                required
                                                                                value="<?php echo $row['QTY']; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label class="m-0">สถานะ<span
                                                                                class="text-danger">*</span></label>
                                                                                <?php
                                                                                if ($row['status'] == 'Y') {
                                                                        ?>
                                                                        <div class="d-flex">
                                                                            <div class="form-check mx-2">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="status"
                                                                                    id="exampleRadios1" value="Y"
                                                                                    checked>
                                                                                <label class="form-check-label"
                                                                                    for="exampleRadios1">
                                                                                    on
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check mx-2">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="status"
                                                                                    id="exampleRadios2" value="N">
                                                                                <label class="form-check-label"
                                                                                    for="exampleRadios2">
                                                                                    off
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <?php }else{
                                                                            ?>
                                                                           <div class="d-flex">
                                                                           <div class="form-check mx-2">
                                                                               <input class="form-check-input"
                                                                                   type="radio" name="status"
                                                                                   id="exampleRadios1" value="Y"
                                                                                   >
                                                                               <label class="form-check-label"
                                                                                   for="exampleRadios1">
                                                                                   on
                                                                               </label>
                                                                           </div>
                                                                           <div class="form-check mx-2">
                                                                               <input class="form-check-input"
                                                                                   type="radio" name="status"
                                                                                   id="exampleRadios2" value="N" checked>
                                                                               <label class="form-check-label"
                                                                                   for="exampleRadios2">
                                                                                   off
                                                                               </label>
                                                                           </div>
                                                                       </div> 
                                                                       <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                    <div class="form-group mb-1">
                                                                        <label class="m-0">รูปภาพ<span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="file" class="form-control-file"
                                                                            id="imgInput" name="img">
                                                                        <input type="hidden"
                                                                            value="<?php echo $row['img']; ?>" required
                                                                            class="form-control" name="img2">
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

                                                <div class="modal fade"
                                                    id="deleteModal_<?php echo $row['product_id']; ?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <!-- โค้ด modal ลบข้อมูล -->
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    ลบสินค้า</h5>
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
                                                                    href="product.php?delete_product_id=<?php echo $row['product_id']; ?>">ยืนยัน</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function () {
                                                        // เมื่อคลิกที่ลิงก์แก้ไข
                                                        $('a[data-target^="#editModal"]').on('click',
                                                            function () {
                                                                var product_id = $(this).data('productid');
                                                                // เปิด modal แก้ไข ที่มี ID ตาม product_id
                                                                $('#editModal_' + product_id).modal('show');
                                                                console.log('Edit Product ID:', product_id);
                                                            });

                                                        // เมื่อคลิกที่ลิงก์ลบ
                                                        $('a[data-target^="#deleteModal"]').on('click',
                                                            function () {
                                                                var product_id = $(this).data('productid');
                                                                // เปิด modal ลบ ที่มี ID ตาม product_id
                                                                $('#deleteModal_' + product_id).modal(
                                                                    'show');
                                                                console.log('Delete Product ID:',
                                                                    product_id);
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
    <!-- Add Product Modal -->
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มสินค้าใหม่</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="add-product-db.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group mb-1">
                            <label class="m-0">หมวดหมู่<span class="text-danger">*</span></label>
                            <div class="col-auto p-0">
                                <select class="custom-select mr-sm-2 small" id="inlineFormCustomSelect" name="type_id"
                                    required>
                                    <?php
                                    $sql3 = "SELECT * FROM `type`;";
                                    $result3 = mysqli_query($conn, $sql3);
                                   while ($row3 = $result3->fetch_assoc()) {
                                ?>

                                    <option value="<?php echo $row3['type_id'];?>"><?php echo $row3['type_name'];?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="m-0">ชื่อสินค้า<span class="text-danger">*</span></label>
                            <input type="text" class="form-control small" name="name" required>
                        </div>
                        <div class="form-group mb-1">
                            <label class="m-0">รายละเอียด</label>
                            <textarea class="form-control small" name="description"></textarea>
                        </div>
                        <div class="form-group row mb-1">
                            <div class="col-sm-6 mb-sm-0">
                                <label class="m-0">ราคา<span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control small" name="price" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="m-0">หน่วย<span class="text-danger">*</span></label>
                                <input type="text" class="form-control small" name="unit" required>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <div class="col-sm-6 mb-sm-0">
                                <label class="m-0">น้ำหนัก/หน่วย<span class="text-danger">*</span></label>
                                <input type="number" placeholder="กรัม" min="0" class="form-control small" name="weight"
                                    required>
                            </div>
                            <div class="col-sm-6">
                                <label class="m-0">สต็อก<span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control small" name="QTY" required>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="m-0">สถานะ<span class="text-danger">*</span></label>
                            <div class="d-flex">
                                <div class="form-check mx-2">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                        value="Y" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        on
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2"
                                        value="N">
                                    <label class="form-check-label" for="exampleRadios2">
                                        off
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group mb-1">
                            <label class="m-0">รูปภาพ<span class="text-danger">*</span></label>
                            <input type="file" class="form-control-file" id="imgInput" name="img" required>
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