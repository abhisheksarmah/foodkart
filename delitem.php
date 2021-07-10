<?php
	include "connect.php";
	$id=$_GET["id"];
	mysqli_query($con,"Delete from items where itemid='$id'");
	header("location:viewitem.php");
?>