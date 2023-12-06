
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
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<title>ยืนยันการสั่งซื้อ</title>
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
						<h1>ยืนยันการสั่งซื้อ</h1>
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

		<div class="container">
			<form class="user" method="POST" action="cart_insert.php" enctype="multipart/form-data">
				<div class="row">

					<div class="col-md-6 mt-5">
						<!-- รายละเอียดสินค้า -->
						<div class="row mb-5">
							<div class="col-md-12">
								<div class="p-3 p-lg-5 border bg-white">
									<table class="table site-block-order-table mb-2">
										<thead>
											<th>ชื่อสินค้า</th>
											<th>ราคา</th>
										</thead>
										<tbody>
											<?php
										$total = 0; //จำนวน
										$somePrice = 0; //ราคารวมสินค้า
										$someWeight = 0; //รสมน้ำหนัก
										if (isset($_SESSION["intLine"])) {
										   for ($i = 0; $i <= (int)$_SESSION['intLine']; $i++) {
											  if (($_SESSION['strMenuID'][$i]) != "") {
												 $sql = "SELECT * FROM `product` WHERE product_id='" . $_SESSION["strMenuID"][$i] . "' ";
												 $result = $conn->query($sql);
												 $row = mysqli_fetch_array($result);
						 
												 $_SESSION["price"] = $row['price'];
												 $total = $_SESSION["strQty"][$i];
												 $sum = (int)$total * (int)$row['price'];
												 $weight = (int)$total * (int)$row['weight'];
						 
												 $somePrice = $somePrice + $sum;
												 $someWeight = $someWeight + $weight;
						 
										?>

											<tr>
												<td><?php echo $row['name']?> <strong
														class="mx-2">x</strong><?php echo $_SESSION["strQty"][$i]; ?>
												</td>
												<td>฿<?php echo $sum; ?></td>
											</tr>
											<?php
                   						  }
                  							}
              							 } 
              							 ?>

										</tbody>

									</table>
									<div>
										<div class="d-flex justify-content-between">
											<div>
												<div class="text-dark">ราคาสินค้า</div>
											</div>
											<div>
												<div class="text-dark">฿<?php echo $somePrice; ?></div>
											</div>
										</div>
										<div class="d-flex justify-content-between">
											<!-- คำนวนค่าส่ง -->
											<?php
                  								$totalPrice = 0;
                							  $shipping = 0;
												$sql2 = "SELECT * FROM `shipping`";
												$result2 = $conn->query($sql2);
												while ($row2 = $result2->fetch_assoc()) {
												
												if($someWeight > $row2['weight']){
													$shipping = $row2['shipping_cost'];
													$totalPrice = $somePrice + $shipping;
												}
												}
                 							 ?>
											<div>ค่าจัดส่ง</div>
											<div>฿<?php echo $shipping; ?></div>
										</div>
										<div class="d-flex justify-content-between">
											<div><strong class="text-primary">ราคาสุทธิ</strong></div>
											<div><strong class="text-primary">฿<?php echo $totalPrice; ?></strong>
											</div>
										</div>
									</div>
									<!-- สร้าง session -->
									<?php
									$_SESSION['somePrice'] = $somePrice;
									$_SESSION['shipping'] = $shipping;
									$_SESSION['totalPrice'] = $totalPrice;
									?>
									<hr>
									<!-- ช่องทางการชำระเงิน -->
									<div class="mt-3">
										<strong class="text-dark">ช่องทางการชำระเงิน</strong>
										<p class="text-dark">&nbsp; &nbsp; &nbsp;กรุณาชำระเงินจำนวน
											฿<?php echo $totalPrice; ?>
											ตามช่องทางการชำระเงินด้านล่าง พร้อมอัพโหลดหลักฐานการชำระเงิน
										</p>
										<?php
										$sql3 = "SELECT * FROM `payment`";
										$result3 = $conn->query($sql3);
										$row3 = $result3->fetch_assoc();

										?>
										<div class="d-flex justify-content-between text-black">
											<p class="m-0">
												ชื่อบัญชี
											</p>
											<p class="m-0">
											<?php echo $row3['account_name']; ?>
											</p>
										</div>
										<div class="d-flex justify-content-between text-black">
											<p class="m-0">
												ธนาคาร<?php echo $row3['bank_name']; ?>
											</p>
											<div class="d-flex align-items-center">
											<?php echo $row3['account_number']; ?>
											</div>
										</div>
										<div class="d-flex justify-content-between text-black">
											<p class="m-0">
												พร้อมเพย์
											</p>
											<div class="d-flex align-items-center"><?php echo $row3['PromptPay']; ?>
											</div>
										</div>
										<img src="images/8402.jpg" class="img-fluid mt-2">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- ข้อมูลจัดส่ง -->
					<div class="col-md-6 mt-5">
						<div class="p-3 p-lg-5 border bg-white">
							<div class="form-group row">
								<div class="col-md-6">
									<label for="c_fname" class="text-black">ชื่อ<span
											class="text-danger">*</span></label>
									<input type="text" class="form-control" id="c_fname" name="c_fname"
										value="<?php echo $_SESSION['first_name'];?>" required>
								</div>
								<div class="col-md-6">
									<label for="c_lname" class="text-black">นามสกุล<span
											class="text-danger">*</span></label>
									<input type="text" class="form-control" id="c_lname" name="c_lname"
										value="<?php echo $_SESSION['last_name'];?>" required>
								</div>
							</div>
							<div class="form-group row mt-2">
								<div class="col-md-12">
									<label for="c_tel" class="text-black">เบอร์โทรศัพท์ <span
											class="text-danger">*</span></label></label>
									<input type="text" class="form-control" id="c_tel" name="c_tel"
										value="<?php echo $_SESSION['tel'];?>" required>
								</div>
							</div>

							<div class="form-group row mt-2">
								<div class="col-md-12">
									<label for="c_address" class="text-black">รายละเอียดที่อยู่<span
											class="text-danger">*</span></label>
									<input type="text" class="form-control" id="c_address" name="c_address" required>
								</div>
							</div>
							<div class="form-group row mt-2">
								<div class="col-md-6">
									<label for="c_district" class="text-black">แขวง / ตำบล<span
											class="text-danger">*</span></label>
									<input type="text" class="form-control" id="c_district" name="c_district" required>
								</div>
								<div class="col-md-6">
									<label for="c_area" class="text-black">เขต / อำเภอ <span
											class="text-danger">*</span></label>
									<input type="text" class="form-control" id="c_area" name="c_area" required>
								</div>
							</div>

							<div class="form-group row mt-2">
								<div class="col-md-6">
									<label for="c_province" class="text-black">จังหวัด <span
											class="text-danger">*</span></label>
									<input type="text" class="form-control" id="c_province" name="c_province" required>
								</div>
								<div class="col-md-6">
									<label for="c_post" class="text-black">รหัสไปรษณีย์<span
											class="text-danger">*</span></label>
									<input type="text" class="form-control" id="c_post" name="c_post" required>
								</div>
							</div>
							<div class="form-group row mt-3">
								<label for="c_address" class="text-black">หลักฐานการชำระเงิน<span
										class="text-danger">*</span></label>
								<input type="file" class="form-control-file" id="imgInput" name="img" required>
								<img id="previewImg" alt="" class="mt-2 img-fluid" style="width: 200px;">
							</div>
							<div class="d-flex justify-content-center mt-2">
								<button type="submit"
									class="btn btn-black btn-lg py-6 btn-block">ยืนยันการสั่งซื้อ</button>
							</div>
						</div>

					</div>
				</div>
			</form>

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