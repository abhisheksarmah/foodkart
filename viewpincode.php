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
    	<b class="w3-large">Welcome Admin  </b> &nbsp;&nbsp;&nbsp;
    	<a href="adminlogout.php" class="w3-btn w3-red w3-border w3-border-white w3-round-medium"><i class="fa fa-sign-out"></i> Logout</a>	
    </div>
</div>
<?php include "adminmenu.php"; ?>
<div class="w3-card w3-light-gray w3-padding-16" style="width:40%; margin:0 auto; margin-top:40px">
    	<h4 align="center"><b>Pincodes</b></h4>
        <div class="w3-container w3-small">
        	<form method="post" action="viewpincode.php">
                <table width="70%" border="0" align="center" cellspacing="2">
                    <tr>
                      <td width="30%">
                        <input type="text" name="pin" id="pin" class="w3-input w3-border" placeholder="Enter Pin to search">
                      </td>
                      <td width="15%"><input type="submit" name="Search" value="Go" class="w3-btn w3-indigo"></td>
                      <td width="15%"><input type="submit" name="Refresh" value="Refresh" class="w3-btn w3-indigo"></td>
                     </tr>
                </table>
            </form>
        </div>
<div class="w3-container w3-responsive" style="margin-top:40px; width:400px; margin:30px auto"  >
  
    <table class="w3-table-all w3-centered w3-hoverable w3-small">
        <tr class="w3-blue">
           <th>Pincode</th>
        </tr>
        
        <?php
            include('connect.php');
				if(isset($_POST["Search"]))
				{
					$pin=$_POST["pin"];
					$sql="Select pin from pincode where pin like '$pin%'";
				}
				else
				{
				$sql="select * from pincode";
				}
				$result=mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>".$row[0]."</td>";
						echo "</tr>";
					}
        ?>
       
    </table>
</div>
</div>



</body>
</html>