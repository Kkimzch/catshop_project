<!-- /*
* Bootstrap 5
* Template Name: Cat Shop
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
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
	<title>บทความ</title>
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
					<li>
						<a class="nav-link" href="index.php">หน้าเเรก</a>
					</li>
					<li><a class="nav-link" href="shop.php">สินค้า</a></li>
					<li class="nav-item active"><a class="nav-link" href="blog.php">บทความ</a></li>
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
							<a class="dropdown-item" href="#"><?php echo $_SESSION['first_name'];?>
								<?php echo $_SESSION['last_name'];?></a>
							<a class="dropdown-item" href="#">ประวัติคำสั่งซื้อ</a>
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
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>บทความ</h1>
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



	<!-- Start Blog Section -->
	<div class="blog-section">
		<div class="container">

			<div class="row">

				<div class="col-12 col-sm-6 col-md-4 mb-5">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="images/post-1.jpg" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h3><a href="#">First Time หน้าเเรก Owner Ideas</a></h3>
							<div class="meta">
								<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19,
										2021</a></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4 mb-5">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="images/post-2.jpg" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h3><a href="#">How To Keep Your Cat Shopture Clean</a></h3>
							<div class="meta">
								<span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15, 2021</a></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4 mb-5">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="images/post-3.jpg" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h3><a href="#">Small Space Cat Shopture Apartment Ideas</a></h3>
							<div class="meta">
								<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 12,
										2021</a></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4 mb-5">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="images/post-1.jpg" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h3><a href="#">First Time หน้าเเรก Owner Ideas</a></h3>
							<div class="meta">
								<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19,
										2021</a></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4 mb-5">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="images/post-2.jpg" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h3><a href="#">How To Keep Your Cat Shopture Clean</a></h3>
							<div class="meta">
								<span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15, 2021</a></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4 mb-5">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="images/post-3.jpg" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h3><a href="#">Small Space Cat Shopture Apartment Ideas</a></h3>
							<div class="meta">
								<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 12,
										2021</a></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4 mb-5">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="images/post-1.jpg" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h3><a href="#">First Time หน้าเเรก Owner Ideas</a></h3>
							<div class="meta">
								<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19,
										2021</a></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4 mb-5">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="images/post-2.jpg" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h3><a href="#">How To Keep Your Cat Shopture Clean</a></h3>
							<div class="meta">
								<span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15, 2021</a></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-4 mb-5">
					<div class="post-entry">
						<a href="#" class="post-thumbnail"><img src="images/post-3.jpg" alt="Image"
								class="img-fluid"></a>
						<div class="post-content-entry">
							<h3><a href="#">Small Space Cat Shopture Apartment Ideas</a></h3>
							<div class="meta">
								<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 12,
										2021</a></span>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Blog Section -->



	<!-- Start Testimonial Slider -->
	<div class="testimonial-section before-footer-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 mx-auto text-center">
					<h2 class="section-title">Testimonials</h2>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="testimonial-slider-wrap text-center">

						<div id="testimonial-nav">
							<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
							<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
						</div>

						<div class="testimonial-slider">

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<blockquote class="mb-5">
												<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
													odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
													vulputate velit imperdiet dolor tempor tristique. Pellentesque
													habitant morbi tristique senectus et netus et malesuada fames ac
													turpis egestas. Integer convallis volutpat dui quis
													scelerisque.&rdquo;</p>
											</blockquote>

											<div class="author-info">
												<div class="author-pic">
													<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
												</div>
												<h3 class="font-weight-bold">Maria Jones</h3>
												<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<blockquote class="mb-5">
												<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
													odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
													vulputate velit imperdiet dolor tempor tristique. Pellentesque
													habitant morbi tristique senectus et netus et malesuada fames ac
													turpis egestas. Integer convallis volutpat dui quis
													scelerisque.&rdquo;</p>
											</blockquote>

											<div class="author-info">
												<div class="author-pic">
													<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
												</div>
												<h3 class="font-weight-bold">Maria Jones</h3>
												<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<blockquote class="mb-5">
												<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
													odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
													vulputate velit imperdiet dolor tempor tristique. Pellentesque
													habitant morbi tristique senectus et netus et malesuada fames ac
													turpis egestas. Integer convallis volutpat dui quis
													scelerisque.&rdquo;</p>
											</blockquote>

											<div class="author-info">
												<div class="author-pic">
													<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
												</div>
												<h3 class="font-weight-bold">Maria Jones</h3>
												<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Testimonial Slider -->



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