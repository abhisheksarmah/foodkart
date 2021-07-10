<?php
	session_start();
	include "connect.php";

	if(isset($_POST["login"]))
	{
		$username=$_POST["username"];
		$pass=$_POST["password"];
		$pwd="";
		$sql="Select * from admin where username='$username'";
		$result=mysqli_query($con,$sql);
		$n=mysqli_num_rows($result);
		if($n==0)
		{
			header("location:admin.php?err=1");
			return;	
		}
		else
		{
			$row=mysqli_fetch_array($result);
			$pwd=$row[1];
			if($pass==$pwd)
			{
				$_SESSION["username"]=$username;
				$_SESSION["status"]=true;
				header("location:adminhome.php");	
			}
			else
			{
				header("location:admin.php?err=1");
				return;	
			}
		}
	}
?>