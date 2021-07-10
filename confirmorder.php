<?php
session_start();
include "connect.php";
if (isset($_POST["submit"])) {
	$cartid = $_SESSION["cartid"];
	$amount = $_POST["amount"];
	$email = $_SESSION["uname"];
	$address = $_POST["address"];
	$name = $_POST["name"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$pin = $_POST["pin"];
	$phone = $_POST["phone"];
	$odate = date("Y-m-d");

	$sql = "insert into orders values(null,'$cartid','$odate')";
	$result = mysqli_query($con, $sql);
	$str = "Select last_insert_id()";
	$rec = mysqli_query($con, $str);
	$row = mysqli_fetch_array($rec);
	$oid = $row[0];

	$str2 = "insert into delivery values('$oid','$name','$address','$city','$state','$pin','$phone')";
	mysqli_query($con, $str2);

	mysqli_query($con, "Update cart set status='ordered' where cartid='$cartid'");
	unset($_SESSION["cartid"]);
	header("location:payment.php?oid=" . $oid);
}
