<?php
include('connect.php');
if(isset($_POST["register"]))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$pass=$_POST['password'];

	$str="select * from users where email='$email'";
	$result=mysqli_query($con,$str);
	$n=mysqli_num_rows($result);
	if($n>0)
	{
		header("location:index.php?dupli=1");
		return;
	}
	
	$sql="insert into users values('$email','$pass','$name','$phone')";
	$result=mysqli_query($con,$sql);
	
	if($result)
	{
		header("location:index.php?save=1");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>