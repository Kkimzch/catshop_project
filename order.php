<?php
require("database.php");
session_start();

if (!isset($_SESSION["intLine"]))    //เช็คว่าแถวเป็นค่าว่างมั๊ย ถ้าว่างให้ทำงานใน {}
{
	$_SESSION["intLine"] = 0;
	$_SESSION["strMenuID"][0] = $_GET["product_id"];   //รหัสสินค้า
	$_SESSION["strQty"][0] = 1;
	header("location:cart.php");
} else {
	$product_id = $_GET["product_id"];
	$key = array_search($_GET["product_id"], $_SESSION["strMenuID"]);
	$sql = "SELECT * FROM `product` WHERE product_id='$product_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	if ((string)$key != "") {
		$_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	} else {
		$_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		$intNewLine = $_SESSION["intLine"];
		$_SESSION["strMenuID"][$intNewLine] = $_GET["product_id"];
		$_SESSION["strQty"][$intNewLine] = 1;
	}
	header("location:cart.php");
}
header("location:cart.php");
?>