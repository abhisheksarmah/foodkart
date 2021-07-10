<?php
session_start();
include "connect.php";
if (isset($_POST["submit"])) {
	$bid = $_POST["bid"];
	$phone = $_POST["phone"];
	$sql = "update orders set status='Paid' where bid='$bid'";
	$result = mysqli_query($con, $sql);
	if ($result) {
		header("location:paysuccess.php?bid=" . $bid . "&phone=" . $phone);
	} else {
		echo mysqli_error($con);
	}
}
