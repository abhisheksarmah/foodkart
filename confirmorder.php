<?php
session_start();
include "connect.php";

if (isset($_POST["submit"])) {
	$cid = $_SESSION["cartid"];
	$name = $_POST["name"];
	$email = $_SESSION["email"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$pin = $_POST["pin"];
	$phone = $_POST["phone"];
	$amount = $_POST["amount"];
	$date = date("d-m-y");
	$bid = rand(000000,999999); 

	$result = mysqli_query($con,"SELECT * from orders where cartid = '$cid'");
	$orderExist = mysqli_num_rows($result);

	if($orderExist > 0) {
		$orderRow = mysqli_fetch_assoc($result);
		$bid = $orderRow['bid'];
		$amount = $orderRow['amount'];
	} else {
		$result = mysqli_query($con, "INSERT into orders values(null, '$email', '$bid', '$cid', '$date', '$amount', 'Pending')");
		if ($result) {
			$sql = "Select last_insert_id()";
			$rec = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($rec);
			$oid = $row[0];
			$cartItemsResult = mysqli_query($con, "SELECT * from cart where cartid = '$cid'");
			while($row = mysqli_fetch_assoc($cartItemsResult))
			{
				$itemid = $row['itemid'];
				$qty = $row['qty'];
				mysqli_query($con, "INSERT into orderitems values(null, '$oid', '$itemid','$qty')");
			}
			mysqli_query($con, "insert into delivery values('$oid','$name','$address', '$city', '$state', '$pin', '$phone')");
		} else {
			echo mysqli_error($con);
			return;
		}
	}

	header("location:payment.php?bid=" . $bid . "&amount=" . $amount . "&phone=" . $phone);
}
