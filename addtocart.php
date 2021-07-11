<?php
	session_start();
	if(!isset($_SESSION["status"]))
	{
		header("location:index.php?log=0");
		return;	
	}
	include 'connect.php';
	if(isset($_POST["add"]))
	{
		$cartid=0;
		if(isset($_SESSION["cartid"]))
		{
			$cartid=$_SESSION["cartid"];	
		}
		else
		{
			$cartid=rand(000000,999999);
			$_SESSION["cartid"]=$cartid;
		}
		$itemid=$_POST["itemid"];
		$qty=$_POST["qty"];
		$uname=$_SESSION["email"];
		$rate=0;
		
		$rec=mysqli_query($con,"Select * from cart where cartid='$cartid' and itemid='$itemid' and status != added");
		$n=mysqli_num_rows($rec);
		if($n>0)
		{
			header("location:index.php?item=dupli");
			return;		
		}
		$result=mysqli_query($con,"Select * from items where itemid='$itemid'");
		while($row=mysqli_fetch_array($result))
		{
			$rate=$row[5];
		}
		$amount=$rate*$qty;
		$str="insert into cart values('$cartid','$uname','$itemid','$qty','$amount','added')";
		$result=mysqli_query($con,$str);
		if($result)
		{
			header("location:index.php?ok=1");	
		}
		else
		{
			echo mysqli_error($con);	
		}
	}
?>