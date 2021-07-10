<?php
	session_start();
	include "connect.php";
?>
<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>All items</title>
	<link href="css/w3.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
    <style>
		body{
				font-family: 'Montserrat', sans-serif;
			}
		h1,h2,h3,h4,h5{
				font-family: 'Montserrat', sans-serif;
			}
		label.error{
				color:#F00;	
				font-size:x-small;
			}
	</style>
    <script>
		$(document).ready(function() {
			$("#form1").validate({
				rules: {
					email:{
						required: true
					},
					password:{
						required: true
					}
				},
				messages: {
					email:{
						required: "Please Enter valid Email"
					},
					password:{
						required: "Please Enter Password"
					}
					
				}
			});
			
			$("#form2").validate({
				rules: {
					email:{
						required: true,
						email:true
					},
					name:{
						required: true
					},
					phone:{
						required: true,
						digits:true
					},
					password:{
						required: true
					},
					password2:{
						equalTo: "#password"
					}
				},
				messages: {
					email:{
						required: "Please Enter Email",
						email: "Please Enter valid Email"
					},
					name:{
						required: "Please Enter Name"
					},
					phone:{
						required: "Please Enter Phone Number",
						digits: "Enter Digits Only"
					},
					password:{
						required: "Please Enter Password"
					},
					password2:{
						equalTo: "Passwords not matching"
					}
				}
			});
		});
	</script>
</head>
<body>
<div class="w3-container w3-red" style="padding-top:8px; padding-bottom:8px;">
    <div class="w3-left">
        <a href="index.php" class="w3-bar-item">
            <img src="images/logo.png" class="w3-animate-left">
        </a>
	</div>
	<div class="w3-right">
            	<?php
					if(isset($_SESSION["status"]))
					{
					 $email=$_SESSION["email"];
					 $result=mysqli_query($con,"Select name from users where email='$email'");
					 $r=mysqli_fetch_array($result);
					 $name=$r[0];
					 $result=mysqli_query($con,"Select * from cart where email='$email' and status='added'");
					 $n=mysqli_num_rows($result);
					 if($n>0)
					  {
						  $r=mysqli_fetch_array($result);
						  $_SESSION["cartid"]=$r[0];
					  }
					 echo 'Welcome '.$name;	
					 echo '&nbsp;<a href="logout.php" class="w3-btn w3-red w3-border w3-border-white w3-round-medium"><i class="fa fa-sign-out"></i> 										Logout</a>';
				?>
					 <a onclick="document.getElementById('cart').style.display='block'" class="w3-btn w3-red  w3-round-medium"><i class="fa fa-shopping-bag w3-xlarge"></i> <span class="w3-badge w3-white"><?php echo $n ?></span></a>
                <?php
					}
					else
					{
				?>
                
						<a href="#" class="w3-btn w3-red w3-border w3-border-white w3-round-medium" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-sign-in"></i> Sign In</a>
                <a href="#" class="w3-btn w3-red w3-border w3-border-white w3-round-medium" onclick="document.getElementById('id02').style.display='block'"><i class="fa fa-user-circle-o"></i> Sign Up</a>
                <?php
					}
				?>
        		
        </div>
</div>        

<div class="w3-container w3-light-gray w3-padding-16">
    	<h3 class="w3-border-bottom" align="center">Items</h3>
    	<div class="w3-content w3-white w3-padding-16" style="max-width:1200px;">
        	<div class="w3-container" style="padding-bottom:12px;">
            	<form id="form3" name="form3" method="get" action="allitems.php">
            	<div class="w3-left" style="width:200px; padding-left:10px;">
                	<select name="ftype" class="w3-select w3-border w3-small">
                    	<option disabled selected>Select Food Type</option>
                        <?php
							$result=mysqli_query($con,"Select distinct(type) from items");
							while($row=mysqli_fetch_array($result))
							{
								echo '<option>'.$row[0].'</option>';
							}
						?>
                    </select>
                </div>
                <div class="w3-left" style="margin-left:3px;">
                	<input type="submit" name="submit" value="Search" class="w3-btn w3-blue w3-small" style="height:37px;">
                </div>
                <div class="w3-left" style="margin-left:3px;">
                	<input type="submit" name="refresh" value="Refresh" class="w3-btn w3-blue w3-small" style="height:37px;">
                </div>
                </form>
            </div>
            <div class="w3-row-padding">
            	<?php
					if(isset($_GET["submit"]))
					{
						$ftype=$_GET["ftype"];
						$sql="Select * from items where type='$ftype' order by itemid";
					}
					else
					{
						$sql="Select * from items order by itemid";
					}
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result))
					{
						echo '<form method="post" action="addtocart.php">
								<div class="w3-quarter w3-center w3-padding">
									<div class="w3-container w3-padding-16 w3-light-gray w3-small">
										<img src="'.$row[4].'" class="w3-card" style="width:100%; height:140px; margin-bottom:8px"><br>
										<strong>'.$row[3].'<br>
										<span class="w3-text-red">
										Rs. '.$row[5].'</span></strong><br><br>
										<input type="hidden" name="itemid" value="'.$row[0].'">
										<input type="text" required name="qty" placeholder="Qty" size="8"> &nbsp;
										<input type="submit" name="add" id="add" value="Add to Cart" class="w3-btn w3-lime  w3-padding-small w3-round">
									</div>
								</div>
								</form>';	
					}
				?>
            </div>
         </div>
</div>

<!--Cart Starts-->
    <div id="cart" class="w3-modal">
    <div class="w3-modal-content w3-pale-green w3-opacity-off w3-card-4 w3-animate-zoom"  style="width:700px;">
      <div class="w3-container" style="padding:32px; padding-bottom:8px;">
        <a href="#" onclick="document.getElementById('cart').style.display='none'" class="w3-display-topright w3-text-blue-gray" style="text-decoration:none;"><i class="fa fa-window-close w3-xxlarge"></i>&nbsp;&nbsp;</a>
        <h3 align="center" class="w3-border-bottom">My Cart</h3>
        <?php
		$cartid=0;
		if(isset($_SESSION["cartid"]))
		{
			$cartid=$_SESSION["cartid"];	
		}
        $tot=0;
		$sql="Select A.*,B.* from cart as A,items as B where A.cartid='$cartid' and A.itemid=B.itemid";
		$result=mysqli_query($con,$sql);
		$x=mysqli_num_rows($result);
		if($x==0)
		{
			echo '<center><img src="images/cart-empty.png" style="width:50%;"></center>';	
		}
		else
		{
			while($row=mysqli_fetch_array($result))
			{
				echo '<div class="w3-container w3-border-bottom" style="padding:8px">
						<div class="w3-left" style="width:30%">
							<img src="'.$row["image"].'" style="width:50%;">
						</div>
						<div class="w3-left w3-small" style="padding-left:5px; width:50%;">
							<span style="text-align:left;">'.$row["name"].'</span><br>
							<span style="text-align:left;">Quantity: '.$row["qty"].'</span><br>
							<span style="text-align:left; color:Red;">Rs. '.$row["rate"].'</span>
						</div>
						<div class="w3-left w3-center" style="padding-left:5px; padding-top:24px;">
							<a href="delfromcart.php?delid='.$row["itemid"].'" onclick="w3_open()"><button class="w3-pale-yellow w3-circle"><i class="fa fa-minus w3-large w3-text-red"></i></button></a>
						</div>
					</div>';
				$tot=$tot+$row["rate"];
			}
			echo '<div class="w3-container w3-center" style="padding:8px">
				<p class="w3-large w3-text-deep-orange">Total Amount: Rs. '.$tot.'</p>
				<p><a href="placeOrder.php?cartid='.$cartid.'" class="w3-btn w3-block w3-blue-gray">Place Order</a>
			 </div>';
		}
		
		?>
      </div>
    </div>
  </div>
  

<!-- Login Modal -->
    <div id="id01" class="w3-modal w3-animate-opacity">
      <div class="w3-modal-content" style="width:450px;">
        <div class=" w3-card w3-pale-yellow">
          <span onclick="document.getElementById('id01').style.display='none'" 
          class="w3-button w3-display-topright">&times;</span>
          <div class="w3-container w3-center w3-padding-16">
          		<img src="images/log in.png" style="width:15%;"/>
                <span class="w3-large"><strong>Log in</strong></span>
          </div>
          <div class="w3-container">
              <form name="form1" id="form1" method="post" action="login.php">
                <p>
                    <input type="text" name="email" class="w3-input w3-border w3-round-medium" placeholder="Enter Email ID">
                </p>
                <p>
                    <input type="password" name="password" class="w3-input w3-border w3-round-medium" placeholder="Enter Password">
                </p>
                <p>
                    <input type="submit" name="login" class="w3-btn w3-block w3-red w3-round" value="Login">
                </p>
              </form>
          </div>
        </div>
      </div>
    </div>   
    
    <!-- Sign up Modal -->
    <div id="id02" class="w3-modal w3-animate-opacity">
      <div class="w3-modal-content" style="width:450px;">
        <div class="w3-card w3-pale-yellow">
          <span onclick="document.getElementById('id02').style.display='none'" 
          class="w3-button w3-display-topright">&times;</span>
          <div class="w3-container w3-center w3-padding-16">
          		<img src="images/signup.png" style="width:15%;"/>
                <span class="w3-large"><strong>Sign Up</strong></span>
          </div>
          <div class="w3-container">
              <form name="form2" id="form2" method="post" action="signup.php">
              	<p>
                    <input type="text" name="email" class="w3-input w3-border w3-round-medium" placeholder="Your Email ID">
                </p>
                <p>
                    <input type="text" name="name" class="w3-input w3-border w3-round-medium" placeholder="Your Name">
                </p>
                
                <p>
                    <input type="text" name="phone" class="w3-input w3-border w3-round-medium" placeholder="Your Phone Number">
                </p>
                <p>
                    <input type="password" name="password" id="password" class="w3-input w3-border w3-round-medium" placeholder="Password">
                </p>
                <p>
                    <input type="password" name="password2" id="password2" class="w3-input w3-border w3-round-medium" placeholder="Confirm Password">
                </p>
                <p>
                    <input type="submit" name="register" class="w3-btn w3-block w3-red w3-round" value="Register">
                </p>
              </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>