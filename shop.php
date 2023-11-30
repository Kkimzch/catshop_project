<!doctype html>
<html lang="en">

<head>
	<?php
	require("database.php")
	
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="css/tiny-slider.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<title>Cat Shop</title>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Cat Shop navigation bar">

		<div class="container">
			<a class="navbar-brand" href="index.php">Cat Shop<span>.</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsCat Shop"
				aria-controls="navbarsCat Shop" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsCat Shop">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item ">
						<a class="nav-link" href="index.php">หน้าเเรก</a>
					</li>
					<li class="active"><a class="nav-link" href="shop.php">Shop</a></li>
					<li><a class="nav-link" href="about.html">About us</a></li>

					<li><a class="nav-link" href="blog.html">Blog</a></li>
					<li><a class="nav-link" href="contact.html">Contact us</a></li>
				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<li><a class="nav-link" href="#"><img src="images/user.svg"></a></li>
					<li><a class="nav-link" href="cart.html"><img src="images/cart.svg"></a></li>
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
						<h1>สินค้าทั้งหมด</h1>
					</div>
				</div>
				<div class="col-lg-7">

				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->

	<!-- Type -->
	<div class="container" align="center">
		<div class="pt-4" style="overflow: auto;
		white-space: nowrap;">
			<div class="col-lg-2 btn btn-secondary btn-block m-2">
				<p class="m-0">สินค้าทั้งหมด</p>
			</div>
			<?php
      								$sql = "SELECT * FROM `type` WHERE 1";
     								 $result = mysqli_query($conn, $sql);
     								 while ($row = $result->fetch_assoc()) {

     								 ?>
			<div class="col-lg-2 btn btn-secondary btn-block m-2">
				<p class="m-0"><?= $row['type_name'] ?></p>
			</div>
			<?php
      							}
     		?>

		</div>
	</div>
	<!--  End price -->
	
	<!-- Product -->
	<div class="untree_co-section product-section before-footer-section">
		<div class="container">
			<div class="row ">
				<?php
      				$sql2 = "SELECT * FROM `product` WHERE 1";
     				$result2 = mysqli_query($conn, $sql2);
     				while ($row2 = $result2->fetch_assoc()) {
     			?>
				<div class="col-12 col-md-4 col-lg-3 mb-5">
					<a class="product-item" href="product_detail.php">
						<img src="images/product/<?= $row2['img'] ?>" class="img-fluid product-thumbnail m-0"
							style="width: 216px; height: auto;">
						<h3 class="product-title mt-3"><?= $row2['name'] ?></h3>
						<strong class="product-price">฿<?= $row2['price'] ?></strong>
						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div>
				<?php
      				}
     			?>
			</div>
		</div>
	</div>
	<!-- End Product -->

	<!-- Start Footer Section -->
	<footer class="footer-section">
		<div class="container relative">
			<div class="row g-5 mb-5">
				<div class="col-lg-4">
					<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Cat Shop<span>.</span></a></div>
					<p class="mb-4">อาหารเเมวคุณภาพดีสำหรับเจ้านายที่น่ารัก ได้รวบรวมทั้งหมดมาไว้ที่นี่เเล้ว อาหารเม็ด อาหารเปียก ขนม ของใช้ ของเล่น</p>

					<ul class="list-unstyled custom-social">
						<li><a href=""><span class="fa fa-brands fa-facebook-f"></span></a><strong class="m-2">Cat Shop.</strong></li>

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
</body>

</html>