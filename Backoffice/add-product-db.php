<?php
session_start();
require("../database.php");
$img = $_FILES['img'];

$type_id= $_POST['type_id'];
$name= $_POST['name'];
$description= $_POST['description'];
$price = $_POST['price'];
$unit = $_POST['unit'];
$weight = $_POST['weight'];
$QTY = $_POST['QTY'];
$status = $_POST['status'];

// เก็บไฟล์ภาพ
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
$sql = "INSERT INTO `product` (`product_id`, `type_id`, `name`, `description`, `img`, `price`, `unit`, `weight`, `QTY`, `status`) 
VALUES (NULL, '$type_id', '$name', '$description', '$fileNew', '$price', '$unit', '$weight', '$QTY ', '$status');";
if(mysqli_query($conn, $sql)){
    header("location: product.php?message=บันทึก");
}

?>