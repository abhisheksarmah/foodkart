<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Homepage</title>
		<link href="css/calender.css" type="text/css" rel="stylesheet">
		<link href="css/w3.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      
<div class="w3-bar w3-yellow w3-center" style="padding:0 10px; margin-top:55px;">
  	<a href="adminhome.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a>
      <div class="w3-dropdown-hover">
        <button class="w3-button"><i class="fa fa-database"></i> Items</button>
        <div class="w3-dropdown-content w3-bar-block w3-border w3-yellow">
            <a href="additem.php" class="w3-bar-item w3-button"><i class="fa fa-plus"></i> Add Item</a>
            <a href="viewitem.php" class="w3-bar-item w3-button"><i class="fa fa-eye"></i> View Items</a>
        </div>
      </div>
       <div class="w3-dropdown-hover">
        <button class="w3-button"><i class="fa fa-map-marker"></i> Pincode</button>
        <div class="w3-dropdown-content w3-bar-block w3-border w3-yellow">
            <a href="addpincode.php" class="w3-bar-item w3-button"><i class="fa fa-plus"></i> Add Pincode</a>
            <a href="viewpincode.php" class="w3-bar-item w3-button"><i class="fa fa-eye"></i> View Pincode</a>
        </div>
      </div>
  	<div class="w3-dropdown-hover">
  		<a href="vieworders.php" class="w3-bar-item w3-button"><i class="fa fa-pencil-square"></i> View Customer Orders</a>
	</div>
</div>
          
</body>
</html>