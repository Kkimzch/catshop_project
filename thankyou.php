
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
	<title>ขอบคุณสำหรับการสั่งซื้อ</title>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Cat Shop navigation bar">

		<div class="container">
			<a class="navbar-brand" href="index.php">Kitschi Plus<span>.</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsCatShop"
				aria-controls="navbarsCatShop" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsCatShop">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item ">
						<a class="nav-link" href="index.php">หน้าเเรก</a>
					</li>
					<li><a class="nav-link" href="shop.php">สินค้า</a></li>
					<li><a class="nav-link" href="about.php">เกี่ยวกับเรา</a></li>

					<li><a class="nav-link" href="blog.php">บทความ</a></li>
					<li><a class="nav-link" href="contact.php">ติดต่อเรา</a></li>
				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
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
				</ul>
			</div>
		</div>

	</nav>
	<!-- End Header/Navigation -->

	<!-- Start Hero Section -->
	<div class="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="intro-excerpt">
            <h1>Thank you!</h1>
          </div>
        </div>
        <div class="col-lg-7">
        <div class="hero-img-wrap">
		</div>
        </div>
      </div>
    </div>
  </div>
	<!-- End Hero Section -->



	<div class="untree_co-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center pt-5">
					<span class="display-3 thankyou-icon text-primary">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check mb-5"
							fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd"
								d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z" />
							<path fill-rule="evenodd"
								d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
						</svg>
					</span>
					<h2 class="display-3 text-black">ขอบคุณสำหรับการสั่งซื้อ !</h2>
					<p class="lead mb-5">แอดมินจะตรวจสอบเเละยืนยันคำสั่งซื้อของคุณภายใน 24 ชั่วโมง</p>
					<p><a href="shop.php" class="btn btn-sm btn-outline-black">ซื้ออีกครั้ง</a></p>
				</div>
			</div>
		</div>
	</div>

	<!-- Start Footer Section -->
	<footer class="footer-section">
		<div class="container relative">
			<div class="row g-5 mb-5">
				<div class="col-lg-4">
					<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Kitschi Plus<span>.</span></a></div>
					<p class="mb-4">คิชชี่ พลัส มูสบำรุงแมวเป็นอาหารปั่นละเอียด วัตถุดิบเกรดพรีเมี่ยม มีสารอาหารครบตามหลักโภชนาการ AAFCO</p>

					<ul class="list-unstyled custom-social">
						<li><a href="https://www.facebook.com/Kitschiplus"><span class="fa fa-brands fa-facebook-f"></span></a><strong class="m-2">คิชชี่ พลัส (Kitschiplus)</strong></li>

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
							<li class="me-4">เว็บไซต์นี้เป็นส่วนหนึ่งของวิชาโครงงานเทคโนโลยีสารสนเทศและการสื่อสาร</li>
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

</body>

</html>