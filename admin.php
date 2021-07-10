<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
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
            <div class="w3-right w3-xlarge">
            Admin Panel		
            </div>
      </div>
      
     <div class="w3-container w3-border w3-card w3-round" style="width:400px; margin:200px auto">
     	<div class="w3-container w3-center w3-round-medium w3-text-red">
     		<h4><b>ADMIN LOGIN</b></h4>
    	</div>

              <form name="form1" id="form1" method="post" action="adminlogin.php">
                <p>
                    <input type="text" name="username" class="w3-input w3-border w3-round-medium" placeholder="Enter Username">
                </p>
                <p>
                    <input type="password" name="password" class="w3-input w3-border w3-round-medium" placeholder="Enter Password">
                </p>
                <p>
                    <input type="submit" name="login" class="w3-btn w3-block w3-red w3-round" value="Login">
                </p>
              </form>
     </div>
          
<?php
	if(isset($_GET["err"]))
	{
		echo '<script> alert("Invalid UserName or Password"); </script>'; 	
	}
?>
</body>
</html>