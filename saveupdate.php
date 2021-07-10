<?php
include "connect.php";
if(isset($_POST["update"]))
{
	$id=$_POST['itemid'];
	$category=$_POST['category'];
	$type=$_POST['type'];
	$name=$_POST['name1'];
	$price=$_POST['price'];
	
	$sql="update items set category='$category', type='$type', name='$name',price='$price' where itemid='$id'";
	
	$result=mysqli_query($con,$sql);
	if($result)
	{
		header("location:viewitem.php?update=1");	
	}
	else
	{
		echo mysql_error($con);	
	}
}
?>