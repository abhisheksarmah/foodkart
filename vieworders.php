<?php
    include "connect.php";
    if(isset($_GET["oid"]))
    {
        $oid=$_GET["oid"];
        $str="Select cartid from orders where orderid='$oid'";
        $rec=mysqli_query($con,$str);
        $row=mysqli_fetch_array($rec);
        $cartid=$row["cartid"];
        
        $str="update cart set status='Completed' where cartid='$cartid'";
        mysqli_query($con,$str);
        echo '<script>window.location.href="vieworders.php";</script>'; 
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Item</title>
		<link href="css/w3.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			.menu-icon{
				width:30px;
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
    	<b class="w3-large">Welcome Admin</b> &nbsp;&nbsp;&nbsp;
    	<a href="adminlogout.php" class="w3-btn w3-red w3-border w3-border-white w3-round-medium"><i class="fa fa-sign-out"></i> Logout</a>	
    </div>
</div>
<?php include "adminmenu.php"; ?>
<div class="w3-card w3-light-gray w3-padding-16" style="width:90%; margin:0 auto; margin-top:40px">
    	<h4 align="center"><b>Customer Orders List</b></h4>
<div class="w3-container w3-responsive" style="margin-top:40px; width:1000px; margin:30px 100px"  >
  
    <table class="w3-table-all w3-centered w3-hoverable w3-small">
        <tr class="w3-red">
           <th>Order ID</th>
           <th>Cusomer Name</th>
           <th>Order Date</th>
           <th>Amount (Rs.)</th>
           <th colspan="2">&nbsp;</th>
        </tr>
        
        <?php
				$sql="Select A.orderid,B.name,A.date,sum(C.rate) from orders as A,users as B,cart as C where A.cartid=C.cartid and C.status='ordered' and B.email=C.email group by C.email";
				$result=mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>".$row[0]."</td>";
						echo "<td>".$row[1]."</td>";
						echo "<td>".$row[2]."</td>";
						echo "<td>".$row[3]."</td>";
            echo '<td><a href="viewodetails.php?oid='.$row[0].'" class="w3-btn w3-green w3-round w3-small">View Order Details</a></td>';
            echo '<td><a href="vieworders.php?oid='.$row[0].'" class="w3-btn w3-red w3-round w3-small">Order Completed</a></td>';
						echo "</tr>";
					}
        ?>
       
    </table>
</div>
</div>
</body>
</html>