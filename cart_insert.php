<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
require("database.php");
//สร้างตัวแปรจาก session    
$user_id = $_SESSION['user_id'];
$somePrice = $_SESSION['somePrice'];
$shipping= $_SESSION['shipping'];
$totalPrice= $_SESSION['totalPrice'];

//สร้างตัวแปรจาก input

$first_name= $_POST['c_fname'];
$last_name= $_POST['c_lname'];
$tel= $_POST['c_tel'];
$address = $_POST['c_address'];
$district = $_POST['c_district'];
$area = $_POST['c_area'];
$province = $_POST['c_province'];
$post = $_POST['c_post'];
$img = $_FILES['img'];


// เก็บไฟล์ภาพ
$allow = array('jpg', 'jpeg', 'png');
$extension = explode(".", $img['name']);
$fileActExt = strtolower(end($extension));
$fileNew = rand() . "." . $fileActExt;
$filePath = "images/slip/" . $fileNew;

if (in_array($fileActExt, $allow)) {
    if ($img['size'] > 0 && $img['error'] == 0) {
        move_uploaded_file($img['tmp_name'], $filePath);
    }
}

// เพิ่มข้อมูลไปยัง order
$sql = "INSERT INTO `orders` (`order_id`, `user_id`, `total`, `shipping`, `sometotal`, `slip`, `message`, `status`) 
VALUES (NULL, $user_id, '$somePrice', '$shipping', '$totalPrice', '$fileNew', '', 'รอตรวจสอบ');";
 mysqli_query($conn, $sql);
 echo $sql;
//  เก็บ order id
 $order_id = mysqli_insert_id($conn); 

// เพิ่มข้อมูลไปยัง address
$sql2 = "INSERT INTO `address` (`address_id`, `order_id`, `first_name`, `last_name`, `tel`, `address`, `district`, `area`, `province`, `post`) 
VALUES (NULL, '$order_id', '$first_name', '$last_name', '$tel', '$address', '$district', '$area', '$province', '$post');";
mysqli_query($conn, $sql2);
echo $sql2;
// สินค้าที่เลือก
for ($i = 0; $i <= (int)$_SESSION['intLine']; $i++) {
    if (($_SESSION['strMenuID'][$i]) != "") {
        // ดึง Product
            $sql3 = "SELECT * FROM `product` WHERE product_id='" . $_SESSION["strMenuID"][$i] . "' ";
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_array($result3);

            $price = $row3['price'];
            $name = $row3['name'];
            $total = $_SESSION["strQty"][$i] * $price;
            $product_id = $row3['product_id'];
        // เพิ่มไปยัง order detail
            $sql4 = "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `number`, `name`, `total_price`) 
            VALUES (NULL, '$order_id', '$product_id', " . $_SESSION["strQty"][$i] . ", '$name', '$total');";
            if (mysqli_query($conn, $sql4)) {
                //ตัดสต๊อก
                $sql5 = "UPDATE `product` SET `QTY` = QTY - '" . $_SESSION["strQty"][$i] . "' 
                WHERE `product_id` = $product_id ";
                mysqli_query($conn, $sql5);
                header("location: thankyou.php");
            }
    }
}
$conn->close();
    unset($_SESSION['intLine']);
    unset($_SESSION['strMenuID']);
    unset($_SESSION['strQty']);
    unset($_SESSION['totalPrice']);
?>