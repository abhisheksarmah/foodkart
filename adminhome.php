<?php
	session_start();
	if(!isset($_SESSION["username"]))
	{
		header("location:admin.php");
		return;	
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Homepage</title>
		<link href="css/calender.css" type="text/css" rel="stylesheet">
		<link href="css/w3.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
      .bbg{
        background-image: url("images/admin-dashboard.png");
        background-size: auto;
        background-position: center;
        background-repeat: no-repeat;
      } 
	  body{
		  font-family: 'Montserrat', sans-serif;
	  }
	  h1,h2,h3,h4,h5{
		  font-family: 'Montserrat', sans-serif;
	  }
</style>


</head>

<body>


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
<div class="bbg" style="height:550px;">
  <h3 align="center">ADMIN DASHBOARD</h3>
</div>      
</body>
</html>