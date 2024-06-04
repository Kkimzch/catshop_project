<!doctype html>
<html lang="en">

<head>
	<?php
	require("database.php");
	session_start();

	 if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['email']);
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
	<title>Kitschiplus</title>
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
					<li class="nav-item active">
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

	<!-- Start Hero Section -->
	<!-- <div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Kitschi Plus !! <p clsas="d-block">ยินดีต้อนรับ</p>
						</h1>
						<p class="mb-4">คิชชี่ พลัส มูสบำรุงแมวเป็นอาหารปั่นละเอียด วัตถุดิบเกรดพรีเมี่ยม มีสารอาหารครบตามหลักโภชนาการ AAFCO</p>
						<p><a href="shop.php" class="btn btn-secondary me-2 text-white">เลือกซื้อเลย</a></p>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="hero-img-wrap">
						<img src="images/cat.png" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/Cover.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
	<!-- End Hero Section -->

	<!-- Start Testimonial Slider -->
	<div class="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 mx-auto text-center">
					<h2 class="section-title">หมวดหมู่</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="testimonial-slider-wrap text-center">

						<div id="testimonial-nav">
							<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
							<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
						</div>

						<div class="testimonial-slider" data-ride="carousel">
							<?php
      								$sql = "SELECT * FROM `type` WHERE 1";
     								 $result = mysqli_query($conn, $sql);
     								 while ($row = $result->fetch_assoc()) {

     								 ?>

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">
										<div class="testimonial-block text-center">
											<a href="shop_type.php?id=<?php echo $row['type_id'] ?>&&type=<?php echo $row['type_name'] ?>"
												class="btn btn-secondary me-2 text-white"><?= $row['type_name'] ?></a>
										</div>
									</div>
								</div>
							</div>
							<?php
      							}
     						 ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Testimonial Slider -->

	<!-- Start Product Section -->
	<div class="product-section">
		<div class="container">
			<div class="row">

				<!-- Start Column 1 -->
				<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
					<h2 class="mb-4 section-title">สินค้าของเรา</h2>
					<p class="mb-4">เราทุ่มเทในการเลือกเฉพาะสินค้าที่มีประสิทธิภาพสูงสุดเพื่อให้แน่ใจว่าแมวของคุณได้รับโภชนาการทางอาหารที่ดีที่สุด</p>
					<p><a href="shop.php" class="btn">ดูเพิ่มเติม</a></p>
				</div>
				<!-- End Column 1 -->
				<div class="col-md-12 col-lg-9 mb-5 mb-lg-0">
					<div class="row mb-4">
						<?php
      					$sql2 = "SELECT * FROM `product` ORDER BY RAND()
					  	LIMIT 6;";
     					$result2 = mysqli_query($conn, $sql2);
     					while ($row2 = $result2->fetch_assoc()) {
     					?>
						<div class="col-12 col-md-4 col-lg-4 mb-5 mb-md-0">
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
					<!--  -->

				</div>
				<a href="shop.php" class="more mt-2" align="end">ดูสินค้าทั้งหมด</a>
			</div>
		</div>
	</div>
	<!-- End Product Section -->

	<!-- Start Why Choose Us Section -->
	<div class="why-choose-section">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-6">
					<h2 class="section-title">ยินดีต้อนรับทุกท่านสู่ร้าน Cat Shop.</h2>
					<p>ที่ Cat Shop. เราเข้าใจความหมายของคำว่า "ความรัก" และเรามุ่งมั่นที่จะให้ความรักนี้ถึงกับสมาชิกทุกคนในครอบครัวของเราที่มีขนกว่า. เราคือทีมงานที่มีความคล่องตัวและรู้จักแมวมากมาย ซึ่งทำให้เราเป็นผู้เชี่ยวชาญในการเลือกและจัดหาอาหารที่มีคุณภาพสูงสุดสำหรับเพื่อนที่มีหางของคุณ.</p>

					<div class="row my-5">
						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/truck.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>ความเป็นเลิศในคุณภาพ</h3>
								<p>เราทราบดีว่าการให้อาหารที่ดีเหมือนเป็นการให้รัก ทุกชิ้นส่วนของอาหารที่เราเลือกมีคุณภาพและได้รับการทดสอบเพื่อความปลอดภัย.</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/bag.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>สินค้าที่หลากหลาย</h3>
								<p>Cat Shop. มีการสรรหาสินค้าที่หลากหลาย, ไม่ว่าจะเป็นอาหาร, ของเล่น, หรืออุปกรณ์การดูแล, เพื่อให้คุณแมวของคุณได้รับทุกสิ่งที่ต้องการ.</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/support.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>ความใส่ใจสู่ลูกค้า</h3>
								<p>เราตระหนักถึงความสำคัญของการดูแลและให้ความสะดวกสบายในการช้อปปิ้ง. ทีมงานของเราพร้อมให้คำแนะนำและบริการที่ทุกท่านต้องการ.</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/return.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>ความรักที่ไร้เงื่อนไข</h3>
								<p>ทุกสินค้าและบริการที่เราให้, เต็มไปด้วยความรักและความใส่ใจที่เป็นเอกลักษณ์. เราตั้งใจที่จะทำให้แมวของคุณมีชีวิตที่สุขและสุขภาพที่ดี.</p>
							</div>
						</div>

					</div>
				</div>
				<div class="col-lg-5">
					<div class="img-wrap">
						<img src="images/why-choose-us-img.png" alt="Image" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Why Choose Us Section -->

	<!-- Start We Help Section -->
	<div class="we-help-section">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-7 mb-5 mb-lg-0">
					<div class="imgs-grid">
						<div class="grid grid-1"><img src="images/img-grid-1 1.png" alt="Untree.co"></div>
						<div class="grid grid-2"><img src="images/img-grid-2 1.png" alt="Untree.co"></div>
						<div class="grid grid-3"><img src="images/img-grid-3 1.png" alt="Untree.co"></div>
					</div>
				</div>
				<div class="col-lg-5 ps-lg-5">
					<h2 class="section-title mb-4">ที่ Cat Shop. เราเป็นที่รู้จักด้วยความรักและเลือกที่ดีที่สุดสำหรับแมวของคุณ.</h2>
					<p>เราไม่เพียงแค่ร้านค้า, เราคือที่บริจาคความรักให้กับสมาชิกในครอบครัวของเราทุกท่าน. ขอเชิญทุกท่านตั้งคำถาม, แลกเปลี่ยนประสบการณ์, และเข้ามาร่วมสร้างประสบการณ์ช้อปปิ้งที่น่าจดจำที่สุดไปด้วยกัน.</p>

					<ul class="list-unstyled custom-list my-4">
						<li>เราทุ่มเทในการเลือกเฉพาะสินค้าที่มีประสิทธิภาพสูงสุดเพื่อให้แน่ใจว่าแมวของคุณได้รับโภชนาการทางอาหารที่ดีที่สุด</li>
						<li>เราเลือกใช้และนำเข้าสินค้าจากแหล่งที่ได้มาตรฐาน, เพื่อให้คุณมั่นใจได้ว่าทุกสินค้าที่คุณได้รับคือคุณภาพที่มีค่า</li>
						<li>ทีมงานของเราพร้อมให้บริการและแนะนำทุกรายละเอียด. เรายินดีที่จะช่วยเสมอภาคเพื่อให้ท่านพบกับประสบการณ์ที่เต็มไปด้วยความพอใจ</li>
						<li>เราไม่เพียงเป็นที่ขายของ, แต่เราคือส่วนหนึ่งของชุมชนที่รักแมว. มาร่วมแบ่งปันประสบการณ์และความน่ารักของแมวคุณไปพร้อมกับเราที่ Cat Shop.</li>
					</ul>
					<p><a href="contact.php" class="btn">ติดต่อเรา</a></p>
				</div>
			</div>
		</div>
	</div>
	<!-- End We Help Section -->

	<!-- Start Blog Section -->
	<div class="blog-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-6">
					<h2 class="section-title">บทความน่าสนใจ</h2>
				</div>
				<div class="col-md-6 text-start text-md-end">
					<a href="blog.php" class="more">อ่านบทความทั้งหมด</a>
				</div>
			</div>

			<div class="row">
				<?php
      					$sql3 = "SELECT * FROM `blog` ORDER BY RAND()
					  	LIMIT 3;";
     					$result3 = mysqli_query($conn, $sql3);
     					while ($row3 = $result3->fetch_assoc()) {
     					?>
				<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
					<div class="post-entry">
						<a href="blog_detail.php?blog_id=<?php echo $row3['blog_id'];?>" class="post-thumbnail"><img src="images/blog/<?php echo $row3['img'];?>" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h3><a href="blog_detail.php?blog_id=<?php echo $row3['blog_id'];?>"><?php echo $row3['blog_title'];?></a></h3>
							<div class="meta">
								<span>by <?php echo $row3['name'];?></span>
							</div>
						</div>
					</div>
				</div>
				<?php
						}
				?>

			</div>
		</div>
	</div>
	<!-- End Blog Section -->

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