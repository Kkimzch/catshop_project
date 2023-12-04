<?php
	session_start();
	
	if(isset($_GET["Line"]))
	{
		$Line = $_GET["Line"];
		$_SESSION["strMenuID"][$Line] = "";
		$_SESSION["strQty"][$Line] = "";
	}
	header("location:cart.php");
?>