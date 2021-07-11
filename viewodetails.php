<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Item</title>
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
    	<b class="w3-large">Welcome Admin</b> &nbsp;&nbsp;&nbsp;
    	<a href="adminlogout.php" class="w3-btn w3-red w3-border w3-border-white w3-round-medium"><i class="fa fa-sign-out"></i> Logout</a>	
    </div>
</div>
<?php include "adminmenu.php"; ?>
<div class="w3-container w3-padding-24">
  <div class="w3-card-4 w3-light-gray w3-padding-16" style="width:70%; margin:0 auto;">
      <h4 align="center" class="w3-border-bottom">Customer Order Details</h4>
        <div class="w3-container">
          <table class="w3-table-all w3-small">
            <tr class="w3-red">
                <td>Item</td>
                <td>Quantity</td>
                <td>Rate</td>
            </tr>
            <?php
                include "connect.php";
                $oid=$_GET["oid"];
                $rec=mysqli_query($con,"Select cartid from orders where orderid='$oid'");
                $r=mysqli_fetch_array($rec);
                $cid=$r[0];
                $sql="Select A.*,B.name as cname,C.name as itemname from cart as A,users as B,items as C where A.cartid='$cid' and A.email=B.email and A.itemid=C.itemid";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($result))
                {
                  echo '<tr>';
                  echo '<td>'.$row["itemname"].'</td>';
                  echo '<td>'.$row[3].'</td>';
                  echo '<td>'.$row[4].'</td>';
                  echo '</tr>';
                }
            ?>
          </table>
        </div>
    </div>
</div>
</body>
</html>