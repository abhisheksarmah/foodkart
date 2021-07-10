<?php
	session_start();
	include "connect.php";
	if(isset($_GET["delid"]))
	{
		$itemid=$_GET["delid"];
		$cartid=$_SESSION["cartid"];	
		mysqli_query($con,"Delete from cart where itemid='$itemid' and cartid='$cartid'");
		header("location:index.php");
	}
?>