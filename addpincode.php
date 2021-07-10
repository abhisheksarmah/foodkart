<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Pincode</title>
<link href="css/w3.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
        $("#form1").validate({
			rules: {
				pin:{
					required: true
				}
			},
			messages: {
				pin:{
					required: "Please Enter Pincode"
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
<body background="images/man-ride-scooter-delivery-gift-icon-vector-11184243.jpg" style="background-repeat:no-repeat; background-size: 50%">
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
<div class="w3-card-4 w3-white w3-animate-zoom w3-round-medium" style="width:500px; margin:auto 700px; margin-top:90px">
   <div class="w3-container w3-red w3-center w3-round-medium">
     <h2><b><i class="fa fa-map-marker"></i> Add Pincode</b></h2>
    </div>
   <form class="w3-container w3-padding w3-animate-opacity" name="form1" id="form1" method="post" action="savepincode.php">
      <p>
          <input type="text" name="pin" class="w3-input w3-border w3-round-medium" placeholder="Enter Pincode">
      </p>
       <p>
          <input type="submit" name="add" class="w3-btn w3-block w3-red w3-round" value="Submit Data">
       </p>
  </form>
</div> 
</body>
</html>
<?php
	if(isset($_GET["save"]))
	{
		echo '<script> alert("Pincode Added Successfully");</script>'; 	
	}
	
?>