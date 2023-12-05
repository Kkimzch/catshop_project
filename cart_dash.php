<?php
session_start();

if (!isset($_SESSION["cartRow"])) {
	$_SESSION["cartRow"] = 0;
	$_SESSION["strMenuID"][0] = $_GET["product_id"];
	$_SESSION["strQty"][0] = 1;
	header("location:cart.php");
} else {

	$key = array_search($_GET["product_id"], $_SESSION["strMenuID"]);
	if ((string)$key != "") {
		$_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] - 1;
	} else {
		$_SESSION["cartRow"] = $_SESSION["cartRow"] + 1;
		$intNewLine = $_SESSION["cartRow"];
		$_SESSION["strMenuID"][$intNewLine] = $_GET["product_id"];
		$_SESSION["strQty"][$intNewLine] = 1;
	}
	header("location:cart.php");
}
header("location:cart.php");
