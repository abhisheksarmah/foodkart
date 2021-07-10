<?php
	include "connect.php";
	$bid=$_GET["bid"];
	mysqli_query($con,"Delete from booking where bid='$bid'");
	mysqli_query($con,"Delete from booked where bid='$bid'");
	header("location:mybookings.php");
?>