<?php
session_start();
require("../database.php");
 //แก้ไข
 if (isset($_POST['blog_id'])) {
    $blog_title = $_POST['blog_title'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $blog_id = $_POST['blog_id'];
    
    $img = $_FILES['img'];
    $img2 = $_POST['img2'];
    $upload = $_FILES['img']['name'];

    if ($upload != '') {
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode(".", $img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;
        $filePath = "../images/blog/" . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                move_uploaded_file($img['tmp_name'], $filePath);
            }
        }
    } else {
        $fileNew = $img2;
    }

        $editblog = $conn->prepare("UPDATE `blog` SET `blog_title` = '$blog_title', `name` = '$name', `description` = '$description',  `img` = '$fileNew' WHERE `blog`.`blog_id` = $blog_id;");
        $editblog->execute();
        if ($editblog) {
            header('location: blog.php');
        }
    
}
?>