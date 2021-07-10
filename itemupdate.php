<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Item</title>
<link href="css/w3.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
        $("#form1").validate({
			rules: {
				name1:{
					required: true
				},
				price:{
					required: true,
					digits: true
				},
				file1:{
					required: true	
				}
			},
			messages: {
				name1:{
					required: "Please Enter Item Name"
				},
				price:{
					required: "Please Enter Item Price",
					digits: "Enter Digits Only"
				},
				file1:{
					required: "Please Select Image"
				}
			}
		});
    });
</script>
<style>
	label.error{
		color:#F00;	
		font-size:x-small;
	}
</style>
</head>
<?php
	$id=$_GET["id"];
	include "connect.php";
	$sql="Select * from items where itemid='$id'";
	$result=mysqli_query($con,$sql);
	$cat="";
	$type="";
	$name="";
	$rs="";
	while($row=mysqli_fetch_array($result))
	{
		$cat=$row[1];	
		$type=$row[2];	
		$name=$row[3];
		$rs=$row[5];		
	}
?>   

<div class="w3-top w3-container w3-red" style="padding-top:8px; padding-bottom:8px;">
    <div class="w3-left">
        <a href="index.php" class="w3-bar-item">
            <img src="images/logo.png" class="w3-animate-left">
        </a>
    </div>
    <div class="w3-right">
    	<b class="w3-large">Welcome Admin  </b> &nbsp;&nbsp;&nbsp;
    	<a href="adminlogout.php" class="w3-btn w3-red w3-border w3-border-white w3-round-medium"><i class="fa fa-sign-out"></i> Logout</a>	
    </div>
</div>
<?php include "adminmenu.php"; ?>   
<div class="w3-card-4 w3-white w3-animate-zoom w3-round-medium" style="width:500px; margin:70px auto;">
   <div class="w3-container w3-green w3-center w3-round-medium">
     <h2><b>UPDATE ITEM</b></h2>
    </div>
   <form class="w3-container w3-padding w3-animate-opacity" name="form1" id="form1" enctype="multipart/form-data" method="post" action="saveupdate.php">
     <p> 
      	  <input type="hidden" name="itemid" value="<?php echo $id; ?>">
          <select class="w3-select w3-border w3-round-medium" name="category">
            <option selected><?php echo $cat; ?></option>
            <option>Veg</option>
            <option>Non-Veg</option>
          </select>
     </p> 
     <p>
          <select class="w3-select w3-border w3-round-medium" name="type">
            <option selected><?php echo $type; ?></option>
            <option value="Beverages">Beverages</option>
            <option value="Starters">Starters</option>
            <option value="MainCourse">Main Course</option>
            <option value="Deserts">Deserts</option>
            <option value="Salads">Salads</option>
          </select>
      </p>  
      <p>
          <input type="text" name="name1" class="w3-input w3-border w3-round-medium" value="<?php echo $name; ?>">
      </p>
     
       <p>
          <input type="text" name="price" class="w3-input w3-border w3-round-medium" value="<?php echo $rs; ?>">
       </p>
       
       <p>
          <input type="submit" name="update" class="w3-btn w3-block w3-green
           w3-round" value="Update">
       </p>
  </form>
</div> 
</body>
</html>