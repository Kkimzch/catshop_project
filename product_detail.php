<!doctype html>
<html lang="en">

<head>
	<?php
	require("database.php");
	session_start();
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
	<title>รายละเอียดสินค้า</title>
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
					<li class="nav-item ">
						<a class="nav-link" href="index.php">หน้าเเรก</a>
					</li>
					<li class="active"><a class="nav-link" href="shop.php">สินค้า</a></li>
					<li><a class="nav-link" href="blog.php">บทความ</a></li>
					<li><a class="nav-link" href="about.php">เกี่ยวกับเรา</a></li>
					<li><a class="nav-link" href="contact.php">ติดต่อเรา</a></li>
				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<?php
						if (isset($_SESSION['email'])) { 
						?>
					<li>
						<a class="nav-link" href="profile" role="button" id="dropdownMenuLink" data-toggle="dropdown"
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

	<!-- Start Hero Section -->
	<?php
	$id = $_GET["id"];
	$name = $_GET["name"];
	?>
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col">
					<div>
						<h1><?= $name; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->
	<?php
      				$sql = "SELECT * FROM `product` WHERE product_id=" . $id . "";
     				$result = mysqli_query($conn, $sql);
     				$row = $result->fetch_assoc();
					$typeid = $row["type_id"];

    ?>
	<div class="untree_co-section product-section before-footer-section">
		<div class="container">
			<nav aria-label="breadcrumb">
				<?php
      				$sql2 = "SELECT * FROM `type` WHERE type_id=" . $typeid . "";
     				$result2 = mysqli_query($conn, $sql2);
     				$row2 = $result2->fetch_assoc();
    				?>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="text-decoration-none" href="shop.php">สินค้า</a></li>
					<li class="breadcrumb-item"><a class="text-decoration-none"
							href="shop_type.php?id=<?php echo $row2['type_id'] ?>&&type=<?php echo $row2['type_name'] ?>"><?= $row2['type_name'] ?></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?= $row['name'] ?></li>
				</ol>
			</nav>
			<div class="row">
				<div class="col-12 col-md-5 col-lg-5 mb-5 border bg-white">
					<div align="center">
						<img src="images/product/<?= $row['img'] ?>" class="img-fluid product-thumbnail"
							style="width: 300px; height: auto;" id="myImg">
					</div>
					<div id="myModal" class="modal">
						<span class="close">&times;</span>
						<img class="modal-content" id="img01">
					</div>
				</div>
				<div class="col-12 col-md-7 col-lg-7">

					<div class="p-3 p-lg-5 ">
						<h2 class="text-primary" class="h3 mb-3 text-black"><?= $row['name'] ?></h2>
						<h2 class="text-dark">฿<?= $row['price'] ?> / <?= $row['unit'] ?></h2>
						<p><?= $row['description'] ?></p>

					</div>
					<?php 
						if ($row['status'] == 'N'){
							?>
							<h3 class="text-danger p-3 p-lg-5" align="center">สินค้าหมด</h3>
							<?php
						}else{
							?>
					<div align="center">
						<button class="btn btn-black btn-lg py-3 btn-block"
							onclick="window.location='order.php?product_id=<?php echo $row['product_id'] ?>'"><img
								src="images/cart.svg" class="mx-3">เพิ่มใส่ตะกร้า</button>
					</div>
					<?php
						}
					
					?>

				</div>
			</div>
			<h5>สินค้าเเนะนำ</h5>
			<div class="row mb-4">
				<?php
      					$sql2 = "SELECT * FROM `product` ORDER BY RAND()
					  	LIMIT 4;";
     					$result2 = mysqli_query($conn, $sql2);
     					while ($row2 = $result2->fetch_assoc()) {
     					?>
				<div class="col-12 col-md-3 col-lg-3 mb-5 mb-md-0">
					<a class="product-item my-3"
						href="product_detail.php?id=<?php echo $row2['product_id'] ?>&&name=<?php echo $row2['name'] ?>">
						<img src="images/product/<?= $row2['img'] ?>" style="width: 216px; height: auto;">
						<h3 class="product-title mt-3"><?= $row2['name'] ?></h3>
						<strong class="product-price">฿<?= $row2['price'] ?></strong>
						<span href="cart.php" class="icon-cross">
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

	<!-- Start Footer Section -->
	<footer class="footer-section">
		<div class="container relative">
			<div class="row g-5 mb-5">
				<div class="col-lg-4">
					<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Cat Shop<span>.</span></a></div>
					<p class="mb-4">อาหารเเมวคุณภาพดีสำหรับเจ้านายที่น่ารัก ได้รวบรวมทั้งหมดมาไว้ที่นี่เเล้ว อาหารเม็ด
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
							<li class="me-4">เว็บไซต์นี้เป็นส่วนหนึ่งของวิชาโครงงานเทคโนโลยีสารสนเทศและการสื่อสาร</li>
							<li class="me-4">มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer Section -->

	<script>
		// Get the modal
		var modal = document.getElementById("myModal");

		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var img = document.getElementById("myImg");
		var modalImg = document.getElementById("img01");
		img.onclick = function () {
			modal.style.display = "block";
			modalImg.src = this.src;
			captionText.innerHTML = this.alt;
		}

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks on <span> (x), close the modal
		span.onclick = function () {
			modal.style.display = "none";
		}
	</script>
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


	<!-- Modal เเสดงภาพ -->
	<style>
		#myImg {
			border-radius: 5px;
			cursor: pointer;
			transition: 0.3s;
		}

		#myImg:hover {
			opacity: 0.7;
		}

		/* The Modal (background) */
		.modal {
			display: none;
			/* Hidden by default */
			position: fixed;
			/* Stay in place */
			z-index: 1;
			/* Sit on top */
			padding-top: 100px;
			/* Location of the box */
			left: 0;
			top: 0;
			width: 100%;
			/* Full width */
			height: 100%;
			/* Full height */
			overflow: auto;
			/* Enable scroll if needed */
			background-color: rgb(0, 0, 0);
			/* Fallback color */
			background-color: rgba(0, 0, 0, 0.9);
			/* Black w/ opacity */
		}

		/* Modal Content (image) */
		.modal-content {
			margin: auto;
			display: block;
			width: 80%;
			max-width: 300px;
		}



		/* Add Animation */
		.modal-content,
		#caption {
			-webkit-animation-name: zoom;
			-webkit-animation-duration: 0.6s;
			animation-name: zoom;
			animation-duration: 0.6s;
		}

		@-webkit-keyframes zoom {
			from {
				-webkit-transform: scale(0)
			}

			to {
				-webkit-transform: scale(1)
			}
		}

		@keyframes zoom {
			from {
				transform: scale(0)
			}

			to {
				transform: scale(1)
			}
		}

		/* The Close Button */
		.close {
			position: absolute;
			top: 15px;
			right: 35px;
			color: #f1f1f1;
			font-size: 40px;
			font-weight: bold;
			transition: 0.3s;
		}

		.close:hover,
		.close:focus {
			color: #bbb;
			text-decoration: none;
			cursor: pointer;
		}

		/* 100% Image Width on Smaller Screens */
		@media only screen and (max-width: 700px) {
			.modal-content {
				width: 100%;
			}
		}
	</style>
</body>

</html>