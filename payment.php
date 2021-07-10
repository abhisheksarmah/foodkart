<?php
session_start();
include "connect.php";
$bid = 3333;
$amount = 132213;
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>FoodStation</title>
	<link href="css/w3.css" type="text/css" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-png" href="favicon/assamhotel.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cute+Font" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
	<style>
		body {
			font-family: 'Montserrat', sans-serif;
			/*background-color:#DD4544;*/
		}

		.title {
			background-image: url(images/tbg.jpg);
			background-repeat: repeat-x;
		}

		label.error {
			color: #F00;
			font-size: x-small;
		}

		.menu {
			background-image: url(images/mbg.jpg);
			background-repeat: repeat-x;
		}

		.cute {
			font-family: 'Cute Font', cursive;
		}

		.sbg {
			background-image: url(images/sg.jpg);
			background-position: left;
			background-repeat: no-repeat;
			padding-left: 55px;
		}

		.r1 {
			border-top-left-radius: 20px;
			border-bottom-left-radius: 20px;
		}

		.r2 {
			border-top-right-radius: 20px;
			border-bottom-right-radius: 20px;
		}
	</style>
	<script type="text/javascript">
		function myFunction() {
			var x = document.getElementById("vmenu");
			if (x.className.indexOf("show") == -1) {
				x.className += " show";
			} else {
				x.className = x.className.replace(" show", "");
			}
		}

		$(document).ready(function() {
			jQuery(function($) {
				//$("#regno").mask("aa-99-a-9999"); ,{placeholder:" "});
				$("#cardno").mask("9999-9999-9999-9999", {
					placeholder: "_"
				});
				$("#valid").mask("99/99", {
					placeholder: "_"
				});
				$("#cvv").mask("999", {
					placeholder: "_"
				});
			});
		});
	</script>
</head>

<body class="indigo">
	<div class="container padding-16 small" id="welcome">
		<div class="card-4" style="max-width:600px; margin:24px auto;">
			<div class="container blue center border-bottom">
				<span class="tiny">Powered By</span>
				<img src="images/instamojo.png" style="width:60%">
			</div>
			<div class="container black center">
				<h4>Hotel Booking Payment</h4>
				<h4>Amount: Rs. <?php echo $amount; ?></h4>
			</div>

			<form class="container white" id="form1" name="form1" method="post" action="savepayment.php">

				<p align="center">
					<strong>Payment Method: Credit/Debit Card</strong><br>
				</p>
				<input name="bid" type="hidden" class="input border" value="<?php echo $_GET["bid"]; ?>">
				<input name="phone" type="hidden" class="input border" value="<?php echo $_GET["phone"]; ?>">
				<p>
					<label>Enter 16 digit Card No</label>
					<input class="input border" type="text" name="cardno" id="cardno" required>
				</p>
				<p>
					<label>Card Holder Name</label>
					<input name="cname" type="text" class="input border" id="cname" required>
				</p>
				<p>
					<label>Valid Upto</label>
					<input name="valid" type="text" class="input border" id="valid" required>
				</p>
				<p>
					<label>CVV</label>
					<input name="cvv" type="text" class="input border" id="cvv" required>
				</p>
				<p align="center">
					<input class="btn red hover-yellow" type="submit" name="submit" id="submit" value="Make Payment">
				</p>
			</form>
			<div class="container blue padding-16" align="center">
				Please do not refresh the page or click the back button
			</div>
		</div>
	</div>
</body>

</html>