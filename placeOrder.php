<?php
session_start();
include "connect.php";
?>
<html>

<head>
	<title>FooDStation</title>
	<link href="css/w3.css" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<style>
		body {
			font-family: 'Montserrat', sans-serif;
		}

		h1,
		h2,
		h3,
		h4,
		h5 {
			font-family: 'Montserrat', sans-serif;
		}

		label.error {
			color: #F00;
			font-size: x-small;
		}
	</style>
	<script>
		$(document).ready(function() {
			$("#form1").validate({
				rules: {
					email: {
						required: true
					},
					password: {
						required: true
					}
				},
				messages: {
					email: {
						required: "Please Enter valid Email"
					},
					password: {
						required: "Please Enter Password"
					}

				}
			});

			$("#form2").validate({
				rules: {
					email: {
						required: true,
						email: true
					},
					name: {
						required: true
					},
					phone: {
						required: true,
						digits: true
					},
					password: {
						required: true
					},
					password2: {
						equalTo: "#password"
					}
				},
				messages: {
					email: {
						required: "Please Enter Email",
						email: "Please Enter valid Email"
					},
					name: {
						required: "Please Enter Name"
					},
					phone: {
						required: "Please Enter Phone Number",
						digits: "Enter Digits Only"
					},
					password: {
						required: "Please Enter Password"
					},
					password2: {
						equalTo: "Passwords not matching"
					}
				}
			});
		});
	</script>
</head>

<body>
	<div class="w3-top w3-container w3-red" style="padding-top:8px; padding-bottom:8px;">
		<div class="w3-left">
			<a href="index.php" class="w3-bar-item">
				<img src="images/logo.png" class="w3-animate-left">
			</a>
		</div>
		<div class="w3-right">
			<?php
			if (isset($_SESSION["status"])) {
				$email = $_SESSION["email"];
				$result = mysqli_query($con, "Select name from users where email='$email'");
				$r = mysqli_fetch_array($result);
				$name = $r[0];
				$result = mysqli_query($con, "Select * from cart where email='$email' and status='added'");
				$n = mysqli_num_rows($result);
				if ($n > 0) {
					$r = mysqli_fetch_array($result);
					$_SESSION["cartid"] = $r[0];
				}
				echo 'Welcome ' . $name;
				echo '&nbsp;<a href="logout.php" class="w3-btn w3-red w3-border w3-border-white w3-round-medium"><i class="fa fa-sign-out"></i> 										Logout</a>';
			?>
				<a onclick="document.getElementById('cart').style.display='block'" class="w3-btn w3-red  w3-round-medium"><i class="fa fa-shopping-bag w3-xlarge"></i> <span class="w3-badge w3-white"><?php echo $n ?></span></a>
			<?php
			} else {
			?>

				<a href="#" class="w3-btn w3-red w3-border w3-border-white w3-round-medium" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-sign-in"></i> Sign In</a>
				<a href="#" class="w3-btn w3-red w3-border w3-border-white w3-round-medium" onclick="document.getElementById('id02').style.display='block'"><i class="fa fa-user-circle-o"></i> Sign Up</a>
			<?php
			}
			?>

		</div>
	</div>
	<div class="w3-display-container" style="margin-top:55px;">
		<img src="images/cover.jpeg" style="width:100%">
		<div class="w3-display-middle w3-text-white w3-center" style="width:900px;">
			<h2 class="w3-xxlarge w3-padding"><b><span class="w3-animate-top">Hungry? Order food directly to your doorstep</span></b></h2>
			<br>
			<form name="form3" id="form3">
				<div class="w3-row-padding" style="width:60%; margin:0 auto;">
					<div class="w3-threequarter">
						<input name="pincode" type="text" required class="w3-input w3-border w3-round " id="pincode" placeholder="Enter Pin code to search">
					</div>
					<div class="w3-quarter">
						<input type="submit" name="search" value="Search" class="w3-btn w3-block w3-blue w3-animate-zoom w3-round">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="w3-container" style="margin-top:15px; padding-bottom:25px; padding-left:42px; padding-right:42px;">
		<h3 align="center" class="w3-border-bottom">Confirm Your Order</h3>
		<div class="w3-container w3-card-2 w3-white w3-padding-16" style="width:60%; margin:0 auto;">
			<h5 align="center" class="w3-border-bottom">My Cart Details</h5>
			<?php
			$total = 0;
			$cartid = $_GET["cartid"];
			$sql = "Select A.*,B.* from cart as A,items as B where A.cartid='$cartid' and A.status = 'added' and A.itemid=B.itemid";
			$result = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_array($result)) {
				echo '<div class="w3-container w3-center w3-border-bottom" style="width:90%;padding:8px;">
								<div class="w3-left w3-center" style="width:25%">
									<img src="' . $row["image"] . '" style="width:50%;">
								</div>
								<div class="w3-left w3-center w3-small" style="padding-left:5px; width:25%;">
									<strong>Product Name</strong><br>
									<span style="text-align:left;">' . $row["name"] . '</span><br>
								</div>
								<div class="w3-left w3-center w3-small" style="padding-left:5px; width:25%;">
									<strong>Quantity</strong><br>
									<input type="text" class="w3-border-0" name="pqty" size="5" value="' . $row["qty"] . '">
								</div>
								<div class="w3-left w3-center w3-small" style="padding-left:5px; width:25%;">
									<strong>Amount</strong><br>
									<span style="text-align:left; color:Red;">Rs. ' . $row["rate"] . '</span>
								</div>
                        	</div>';
				$total = $total + $row["rate"];
			}
			echo '<div class="w3-container w3-center" style="padding-top:8px">
                        <p class="w3-large w3-text-deep-orange"><strong>Total Amount: Rs. ' . $total . '</strong></p>
                     </div>';
			?>
		</div>
		<h3 align="center">Enter Your Delivery Address</h3>
		<div class="w3-container w3-card-2 w3-white w3-padding-16" style="width:60%; margin:0 auto;">
			<form id="form2" method="post" action="confirmorder.php">
				<input type="hidden" name="amount" required class="w3-input w3-border" value="<?php echo $total; ?>">
				<p><input type="text" name="name" required class="w3-input w3-border" placeholder="Enter Name"></p>
				<p><textarea name="address" required class="w3-input w3-border" placeholder="Enter Address"></textarea></p>
				<p><input type="text" name="city" required class="w3-input w3-border" placeholder="Enter City"></p>
				<p><input type="text" name="state" required class="w3-input w3-border" placeholder="Enter State"></p>
				<p><input type="text" name="pin" required class="w3-input w3-border" placeholder="Enter PIN"></p>
				<p><input type="text" name="phone" required class="w3-input w3-border" placeholder="Enter Phone No"></p>
				<p><input type="submit" name="submit" required class="w3-btn w3-block w3-red" value="Confirm Order"></p>
			</form>
		</div>
	</div>




	<!--Cart Starts-->
	<div id="cart" class="w3-modal">
		<div class="w3-modal-content w3-pale-green w3-opacity-off w3-card-4 w3-animate-zoom" style="width:700px;">
			<div class="w3-container" style="padding:32px; padding-bottom:8px;">
				<a href="#" onclick="document.getElementById('cart').style.display='none'" class="w3-display-topright w3-text-blue-gray" style="text-decoration:none;"><i class="fa fa-window-close w3-xxlarge"></i>&nbsp;&nbsp;</a>
				<h3 align="center" class="w3-border-bottom">My Cart</h3>
				<?php
				$cartid = 0;
				if (isset($_SESSION["cartid"])) {
					$cartid = $_SESSION["cartid"];
				}
				$tot = 0;
				$sql = "Select A.*,B.* from cart as A,items as B where A.cartid='$cartid' and A.itemid=B.itemid";
				$result = mysqli_query($con, $sql);
				$x = mysqli_num_rows($result);
				if ($x == 0) {
					echo '<center><img src="images/cart-empty.png" style="width:50%;"></center>';
				} else {
					while ($row = mysqli_fetch_array($result)) {
						echo '<div class="w3-container w3-border-bottom" style="padding:8px">
						<div class="w3-left" style="width:30%">
							<img src="' . $row["image"] . '" style="width:50%;">
						</div>
						<div class="w3-left w3-small" style="padding-left:5px; width:50%;">
							<span style="text-align:left;">' . $row["name"] . '</span><br>
							<span style="text-align:left;">Quantity: ' . $row["qty"] . '</span><br>
							<span style="text-align:left; color:Red;">Rs. ' . $row["rate"] . '</span>
						</div>
						<div class="w3-left w3-center" style="padding-left:5px; padding-top:24px;">
							<a href="delfromcart.php?delid=' . $row["itemid"] . '" onclick="w3_open()"><button class="w3-pale-yellow w3-circle"><i class="fa fa-minus w3-large w3-text-red"></i></button></a>
						</div>
					</div>';
						$tot = $tot + $row["rate"];
					}
					echo '<div class="w3-container w3-center" style="padding:8px">
				<p class="w3-large w3-text-deep-orange">Total Amount: Rs. ' . $tot . '</p>
				<p><a href="placeOrder.php?cartid=' . $cartid . '" class="w3-btn w3-block w3-blue-gray">Place Order</a>
			 </div>';
				}

				?>
			</div>
		</div>
	</div>

	<?php include 'footer.php' ?>
</body>

</html>
<?php
if (isset($_GET["save"])) {
	echo '<script> alert("Registration Completed");</script>';
}
if (isset($_GET["err"])) {
	echo '<script> alert("Invalid UserName or Password"); </script>';
}
if (isset($_GET["dupli"])) {
	echo '<script> alert("Please select a different username");</script>';
}
if (isset($_GET["log"])) {
	echo '<script> alert("You need to login first");</script>';
}
?>