
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
  <title>ตะกร้าสินค้า</title>
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
          <li><a class="nav-link" href="shop.php">สินค้า</a></li>
          <li><a class="nav-link" href="about.php">เกี่ยวกับเรา</a></li>

          <li><a class="nav-link" href="blog.php">บทความ</a></li>
          <li><a class="nav-link" href="contact.php">ติดต่อเรา</a></li>
        </ul>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
          <li>
            <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false"><img src="images/user.svg"></a>
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
            <h1>ตะกร้าสินค้า</h1>
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



  <div class="untree_co-section before-footer-section">
    <div class="container">
      <div class="row mb-5">
        <div class="site-blocks-table">
          <table class="table">
            <thead>
              <tr>
                <th class="col col-lg-3 col-md-3 product-thumbnail">รูปภาพ</th>
                <th class="col col-lg-3 col-md-3 product-name">สินค้า</th>
                <th class="col col-lg-1 col-md-3 product-price">ราคา</th>
                <th class="col col-lg-2 col-md-3 product-quantity">จำนวน</th>
                <th class="col col-lg-2 col-md-3 product-total">ราคารวม</th>
                <th class="col col-lg-1 col-md-3 product-remove">ลบ</th>
              </tr>
            </thead>
            <tbody>
              <?php
               $total = 0;
               $somPrice = 0;
               $someWeight = 0;
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

                        $somPrice = $somPrice + $sum;
                        $someWeight = $someWeight + $weight;

               ?>
              <tr>
                <td class="product-thumbnail col col-lg-3 col-md-3">
                  <img src="images/product/<?php echo $row['img']?>" alt="Image" style="height: 150px;">
                </td>
                <td class="product-name col col-lg-3 col-md-3 product-name">
                  <h2 class="h5 text-black"><?php echo $row['name']?></h2>
                </td>
                <td class="col col-lg-1 col-md-3">฿<?php echo $row['price']?></td>
                <td class="col col-lg-2 col-md-3 product-quantity">
                  <div class="d-flex justify-content-center">
                    <div class="quantity-container d-flex" style="max-width: 120px;">
                      <?php
                                 if ($_SESSION["strQty"][$i] > 1) {
                                 ?>
                      <div class="input-group-prepend">
                        <button class="btn btn-outline-black decrease" type="button"
                          onclick="window.location='cart_dash.php?product_id=<?php echo $row['product_id'] ?>'">&minus;</button>
                      </div>
                      <?php
                        }
                      ?>
                      <p class="mx-3 p-0 m-0"><?php echo $_SESSION["strQty"][$i]; ?></p>
                      <div class="input-group-append">
                        <button class="btn btn-outline-black increase" type="button"
                          onclick="window.location='order.php?product_id=<?php echo $row['product_id'] ?>'">&plus;</button>
                      </div>
                    </div>
                  </div>

                </td>
                <td>฿<?php echo $sum; ?></td>
                <td><a href="cart_delete.php?Line=<?php echo $i; ?>" class="btn btn-black btn-sm">X</a></td>
              </tr>
              <?php
                     }
                  }
                  ?>
              <?php
               } else {
                  echo "<p class='text-center'>คุณยังไม่ได้เลือกรายการ</p>";
               }
               ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row m-1">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-2">
                  <h3 class="text-black h4 text-uppercase">สรุปรายการ</h3>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">ราคาสินค้า</span>
                </div>
                <div class="col-md-6 text-end">
                  <span class="text-black">฿<?php echo $somPrice; ?> </span>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">ค่าจัดส่ง</span>
                </div>
                <div class="col-md-6 text-end">
                  <!-- คำนวนค่าส่ง -->
                  <?php
                  $totalPrice = 0;
                  $shipping = 0;
                  $sql2 = "SELECT * FROM `shipping`";
                  $result2 = $conn->query($sql2);
                  while ($row2 = $result2->fetch_assoc()) {
                 
                  if($someWeight > $row2['weight']){
                    $shipping = $row2['shipping_cost'];
                    $totalPrice = $somPrice + $shipping;
                  }
                }
                  ?>
                  <span class="text-black">฿<?php echo $shipping; ?></span>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <strong class="text-primary">ราคาสุทธิ</strong>
                </div>
                <div class="col-md-6 text-end">
                  <strong class="text-primary">฿<?php echo $totalPrice; ?></strong>
                </div>
              </div>
              <div class="row">
                <button class="btn btn-black btn-lg py-6 btn-block"
                  onclick="window.location='checkout.php'">ดำเนินการต่อ</button>
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
          <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Cat Shop<span>.</span></a></div>
          <p class="mb-4">อาหารเเมวคุณภาพดีสำหรับเจ้านายที่น่ารัก ได้รวบรวมทั้งหมดมาไว้ที่นี่เเล้ว อาหารเม็ด อาหารเปียก
            ขนม ของใช้ ของเล่น</p>

          <ul class="list-unstyled custom-social">
            <li><a href=""><span class="fa fa-brands fa-facebook-f"></span></a><strong class="m-2">Cat Shop.</strong>
            </li>

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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
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