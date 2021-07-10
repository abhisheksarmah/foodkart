<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Print Bill</title>
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="css/w3.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cute+Font" rel="stylesheet">
	<style>
		body {
			font-family: 'Montserrat', sans-serif;
		}
	</style>
</head>
<?php
include "connect.php";
$bid = $_GET["bid"];
$str = "Select A.*,B.name as hname from booking as A,hotels as B where A.bid='$bid' and A.hid=B.id";
$result = mysqli_query($con, $str);
$row = mysqli_fetch_array($result);
$name = $row["name"];
$hotel = $row["hname"];
$rtype = $row["roomtype"];
$nor = $row["noroom"];
$amount = $row["amount"];
$bookdate = $row["bookdate"];
?>

<body>
	<div class="content border" style="max-width:1000px; margin-top:24px;">
		<div class="container padding-16 center bottombar light-gray">
			<div class="container padding-16">

				<span class="padding round-medium xlarge">Hotel Booking Acknowledgement<br>
					<h1 class="w-50">Assam Hotel</h1>
				</span>
			</div>
		</div>
		<div class="container padding-16 bottombar">
			<div class="left left-align" style="padding-left:32px; line-height:2.0;">
				<strong>Booking ID:</strong> <?php echo $bid; ?><br>
				<strong>Customer Name:</strong> <?php echo $name; ?><br>
				<strong>Hotel Name:</strong> <?php echo $hotel; ?><br>
				<strong>No. of Rooms:</strong> <?php echo $nor; ?>
			</div>
			<div class="right right-align" style="padding-right:32px; line-height:2.0;">
				<strong>Booking Date:</strong> <?php echo $bookdate; ?><br>
				<br>
				<strong>Room Type:</strong> <?php echo $rtype; ?><br>
				<strong>Amount Paid:</strong> Rs. <?php echo $amount; ?>.00
			</div>
		</div>
		<div class="container padding-16 center light-gray">
			Thank you for booking a hotel with AssamHotels
		</div>
	</div>

	<p class="text-center mt-3">
		<a href="#" onClick="window.print();" class="btn btn-outline-warning">Print Now <i class="fa fa-print" aria-hidden="true"></i></a>
		<a href="index.php" class="btn btn-outline-danger">Go Back <i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
	</p>

</body>

</html>