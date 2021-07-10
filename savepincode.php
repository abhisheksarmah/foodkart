<?php
include('connect.php');
if (isset($_POST["add"])) {
	$pin = $_POST['pin'];
	$sql = "insert into pincode values('$pin')";
	$result = mysqli_query($con, $sql);

	if ($result) {
		header("location:addpincode.php?save=1");
	} else {
		echo '<script>windows.alert( "mysqli_error($con);")</script>';
	}
}
