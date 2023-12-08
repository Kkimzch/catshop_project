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
    } 
    $sql = "INSERT INTO `blog` (`blog_id`, `blog_title`, `description`, `img`, `name`) 
    VALUES (NULL, '$blog_title', '$description', '$fileNew', '$name');";
    if(mysqli_query($conn, $sql)){
        header("location: blog.php");
    }
    
}
?>