<?php
session_start();
require("../database.php");
$img = $_FILES['img'];
$product_id = $_POST['product_id'];
$type_id= $_POST['type_id'];
$name= $_POST['name'];
$description= $_POST['description'];
$price = $_POST['price'];
$unit = $_POST['unit'];
$weight = $_POST['weight'];
$QTY = $_POST['QTY'];
$status = $_POST['status'];

$img2 = $_POST['img2'];
$upload = $_FILES['img']['name'];

// เก็บไฟล์ภาพ
if ($upload != '') {
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $img['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;
    $filePath = "../images/product/" . $fileNew;

    if (in_array($fileActExt, $allow)) {
        if ($img['size'] > 0 && $img['error'] == 0) {
            move_uploaded_file($img['tmp_name'], $filePath);
        }
    }
} else {
    $fileNew = $img2;
}
$sql = $conn->prepare("UPDATE `product` 
SET `type_id` = '$type_id', `name` = '$name', `description` = '$description', `img` = '$fileNew', `price` = '$price', `unit` = '$unit', `weight` = '$weight', `QTY` = '$QTY ', `status` = '$status' 
WHERE `product`.`product_id` = $product_id;");
$sql->execute();
if ($sql) {
    header("location: product.php?message=บันทึก");
} else {
    echo "";
}
?>