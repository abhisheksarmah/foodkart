<?php
	session_start();
	include "connect.php";

	if(isset($_POST["login"]))
	{
		$email=$_POST["email"];
		$pass=$_POST["password"];
		$pwd="";
		$sql="Select * from users where email='$email'";
		$result=mysqli_query($con,$sql);
		$n=mysqli_num_rows($result);
		if($n==0)
		{
			header("location:index.php?err=1");
			return;	
		}
		else
		{
			$row=mysqli_fetch_array($result);
			$pwd=$row[1];
			if($pass==$pwd)
			{
				$_SESSION["email"]=$email;
				$_SESSION["status"]=true;
				header("location:index.php");	
			}
			else
			{
				header("location:index.php?err=1");
				return;	
			}
		}
	}
?>