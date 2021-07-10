<?php
	session_start();
	include "connect.php";
	if(isset($_GET["itemid"]) && isset($_GET["cartoperation"]))
	{
		$itemid=$_GET["itemid"];
		$cartid=$_SESSION["cartid"];
		$cartopertion = $_GET["cartoperation"];

		$result = mysqli_query($con, "Select * from cart where itemid='$itemid' and cartid='$cartid'");
		$row = mysqli_fetch_array($result);
		$itemQtyInCart = $row[3];
		$itemTotalAmount = $row[4];
		$perItemAmount = $itemTotalAmount / $itemQtyInCart;
		if($itemQtyInCart <= 1 && $cartopertion != 'plus') {
			mysqli_query($con,"Delete from cart where itemid='$itemid' and cartid='$cartid'");
			header("location:index.php");
		}

		switch ($cartopertion) {
			case 'plus':
				mysqli_query($con,"Update cart set qty = qty + 1, rate = rate + '$perItemAmount' where itemid='$itemid' and cartid='$cartid'");
				break;

			case 'minus':
				mysqli_query($con,"Update cart set qty = qty - 1, rate = rate - '$perItemAmount' where itemid='$itemid' and cartid='$cartid'");
				break;
			
			case 'delete':
				mysqli_query($con,"Delete from cart where itemid='$itemid' and cartid='$cartid'");
				break;
		}

		

		header("location:index.php");
	}
?>