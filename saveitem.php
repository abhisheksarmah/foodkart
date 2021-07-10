<?php
include('connect.php');
if(isset($_POST["add"]))
{
	$category=$_POST['category'];
	$type=$_POST['type'];
	$name=$_POST['name1'];
	$price=$_POST['price'];
	
	$target_dir = "products/";
	$file = $target_dir . basename($_FILES["file1"]["name"]);
	$fileData = pathinfo(basename($_FILES["file1"]["name"]));	
	$fileName = uniqid() . '.' . $fileData['extension'];
	$target_path = "products/" . $fileName;
	while(file_exists($target_path))
	{
		$fileName = uniqid() . '.' . $fileData['extension'];
		$target_path = "products/" . $fileName;
	}
	move_uploaded_file($_FILES["file1"]["tmp_name"], $target_path);
	
	$image="products/" . $fileName;
	
	$sql="insert into items values(null,'$category','$type','$name','$image','$price')";
	$result=mysqli_query($con,$sql);
	
	if($result)
	{
		header("location:additem.php?save=1");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>