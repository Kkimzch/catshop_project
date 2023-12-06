<!doctype html>
<html lang="en">

<head>
    <?php
	require("database.php");
	session_start();
    if (!isset($_SESSION['email'])) {
        header('location: Backoffice/login.php');
      }
	?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="cat-icon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>โปรไฟล์</title>
</head>

<body>
    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Cat Shop navigation bar">
        <div class="container">
            <a class="navbar-brand" href="index.php">Cat Shop<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsCatShop"
                aria-controls="navbarsCatShop" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsCatShop">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li>
                        <a class="nav-link" href="index.php">หน้าเเรก</a>
                    </li>
                    <li><a class="nav-link" href="shop.php">สินค้า</a></li>
                    <li><a class="nav-link" href="blog.php">บทความ</a></li>
                    <li><a class="nav-link" href="about.php">เกี่ยวกับเรา</a></li>
                    <li><a class="nav-link" href="contact.php">ติดต่อเรา</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <?php
					if (isset($_SESSION['email'])) { 
					?>
                    <li>
                        <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><img src="images/user.svg"></a>
                        <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="profile.php"><?php echo $_SESSION['first_name'];?>
                                <?php echo $_SESSION['last_name'];?></a>
                            <a class="dropdown-item" href="history.php">ประวัติคำสั่งซื้อ</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?logout='1'">ออกจากระบบ</a>
                        </div>
                    </li>
                    <li><a class="nav-link" href="cart.php"><img src="images/cart.svg"></a></li>
                    <?php
					}else{
						?>
                    <li class="btn btn-secondary p-1 px-4">
                        <a href="Backoffice/login.php" class=" text-white p-2 px-3 text-decoration-none">เข้าสู่ระบบ</a>
                    </li>
                    <?php
					}
					?>
                </ul>
            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->


    <div class="why-choose-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-dark">บัญชีของฉัน</a></li>
                    <li class="breadcrumb-item">โปรไฟล์</li>
                </ol>
            </nav>
            <div class="row p-1">
                <div class="col-12 col-sm-12 col-lg-3">
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action active rounded" href="profile.php">โปรไฟล์</a>
                        <a class="p-2 text-decoration-none" href="history.php">ประวัติคำสั่งซื้อ</a>
                        <a class="p-2 text-decoration-none" href="edit_profile.php">ตั้งค่าโปรไฟล์</a>
                        <a class="p-2 text-decoration-none" href="reset_password.php">เปลี่ยนรหัสผ่าน</a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-9">
                    <h4 class="text-dark">โปรไฟล์</h4>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                            aria-labelledby="list-home-list">
                            <div class="p-3 p-lg-5 border bg-white">
                                <div class="row">
                                    <div class="col col-lg-2">
                                        <img src="images/cat_profile.png" class="img-fluid" style="width: 100px;">
                                    </div>
                                    <div class="col px-5 text-dark">
                                    <?php
                                             $user_id = $_SESSION['user_id'];
                                             $sql = "SELECT * FROM `users` WHERE user_id = $user_id"; 
                                             $result = mysqli_query($conn, $sql);
                                             $row = $result->fetch_assoc()
                                    ?>
                                        <h6 class="mt-2"><i class="text-primary fa-solid fa-user"></i> &nbsp;<?php echo $row['first_name'];?>
                                            &nbsp;<?php echo $row['last_name'];?>
                                        </h6>
                                        <h6 class="mt-2"><i class="text-primary fa-solid fa-phone"></i> &nbsp;<?php echo $row['tel'];?>
                                        </h6>
                                        <h6 class=" mt-2"><i class="text-primary fa-solid fa-envelope"></i> &nbsp;<?php echo $_SESSION['email'];?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Cat Shop<span>.</span></a>
                    </div>
                    <p class="mb-4">อาหารเเมวคุณภาพดีสำหรับเจ้านายที่น่ารัก ได้รวบรวมทั้งหมดมาไว้ที่นี่เเล้ว
                        อาหารเม็ด
                        อาหารเปียก ขนม ของใช้ ของเล่น</p>
                    <ul class="list-unstyled custom-social">
                        <li><a href=""><span class="fa fa-brands fa-facebook-f"></span></a><strong class="m-2">Cat
                                Shop.</strong></li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="index.php">หน้าเเรก</a></li>
                                <li><a href="shop.php">สินค้า</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="blog.php">บทความ</a></li>
                                <li><a href="about.php">เกี่ยวกับเรา</a></li>
                                <li><a href="contact.php">ติดต่อเรา</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div>
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4">เว็บไซต์นี้เป็นส่วนหนึ่งของวิชาโครงงานเทคโนโลยีสารสนเทศและการสื่อสาร
                            </li>
                            <li class="me-4">มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>


</body>

</html>

<style>
    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #557A46;
        border-color: #557A46;
    }
</style>