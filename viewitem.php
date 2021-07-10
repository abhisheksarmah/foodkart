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
		</style>
        <script>
			function condel()
			{
				return confirm("Are You Sure?");
			}
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
    	<b class="w3-large">Welcome Admin  </b> &nbsp;&nbsp;&nbsp;
    	<a href="adminlogout.php" class="w3-btn w3-red w3-border w3-border-white w3-round-medium"><i class="fa fa-sign-out"></i> Logout</a>	
    </div>
</div>
<?php include "adminmenu.php"; ?>
<div class="w3-card w3-light-gray w3-padding-16" style="width:90%; margin:0 auto; margin-top:40px">
    	<h4 align="center"><b>ITEM LIST</b></h4>
        <div class="w3-container w3-small">
        	<form method="post" action="viewitem.php">
                <table width="80%" border="0" align="center" cellspacing="2">
                    <tr>
                      <td width="15%">
                      	<select class="w3-select w3-border w3-round-medium" name="category">
                            <option value="" disabled selected>Select Category</option>
                            <option value="Veg">Veg</option>
                            <option value="Non-Veg">Non-Veg</option>
                          </select>
                      </td>
                      <td width="10%">
                          <input type="submit" name="Search1" value="Go" class="w3-btn w3-indigo">
                      </td>
                      <td width="15%">
                      	<select class="w3-select w3-border w3-round-medium" name="type">
                            <option value="" disabled selected>Select Type</option>
                            <option value="Beverages">Beverages</option>
                            <option value="Starters">Starters</option>
                            <option value="MainCourse">Main Course</option>
                            <option value="Deserts">Deserts</option>
                            <option value="Salads">Salads</option>
                          </select>
                      </td>
                      <td width="10%"><input type="submit" name="Search2" value="Go" class="w3-btn w3-indigo"></td>
                      <td width="30%">
                        <input type="text" name="name1" id="name1" class="w3-input w3-border" placeholder="Enter Item Name">
                      </td>
                      <td width="10%"><input type="submit" name="Search" value="Go" class="w3-btn w3-indigo"></td>
                      <td width="10%"><input type="submit" name="Refresh" value="Refresh" class="w3-btn w3-indigo"></td>
                     </tr>
                </table>
            </form>
        </div>
<div class="w3-container w3-responsive" style="margin-top:40px; width:1000px; margin:30px auto"  >
  
    <table class="w3-table-all w3-centered w3-hoverable w3-small">
        <tr class="w3-blue">
           <th>Item Category</th>
           <th>Type</th>
           <th>Name</th>
           <th>Price (Rs.)</th>
           <th>Image</th>
           <th colspan="2" style="text-align:right">Action</th>
        </tr>
        
        <?php
            include('connect.php');
				if(isset($_POST["Search"]))
				{
					$name=$_POST["name1"];
					$sql="Select * from items where name like '$name%'";
				}
				else if(isset($_POST["Search1"]))
				{
					$cat=$_POST["category"];
					$sql="Select * from items where category='$cat'";
				}
				else if(isset($_POST["Search2"]))
				{
					$type=$_POST["type"];
					$sql="Select * from items where type='$type'";
				}
				else
				{
				$sql="select * from items";
				}
				$result=mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($result))
					{
						echo "<tr>";
						//echo "<td>".$row[0]."</td>";
						echo "<td>".$row[1]."</td>";
						echo "<td>".$row[2]."</td>";
						echo "<td>".$row[3]."</td>";
						echo "<td>".$row[5]."</td>";
						echo '<td><img src="'.$row[4].'" width="50" height="50"></td>';	
						echo '<td style="text-align:right;"><a href="itemupdate.php?id='.$row['itemid'].'" class="w3-btn w3-green w3-round w3-tiny">Edit</a></td>';
						echo '<td style="text-align:right;"><a href="delitem.php?id='.$row['itemid'].'" onClick="return condel();" class="w3-btn w3-red w3-round w3-tiny">Delete</a></td>';
						echo "</tr>";
					}
        ?>
       
    </table>
</div>
</div>



</body>
</html>