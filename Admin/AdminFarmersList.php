<?php
  include("../MasterPages/AdminHeader.php");
  ?>
  
  
 <h3>Registered Farmers List</h3>
 
 
 
 
  <?php
	
	$sql = "SELECT * FROM tblfarmers";

	include_once "../DB/db.php";
	
	$result=execute($sql);	
	
	
	if ($result->num_rows > 0) 
	{

?>



	 <table id="fulltable">
     
     <tr>
	 <th>Farmer Name</th>
	  <th>City</th>
     <th>Mobile</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['FarmerName']; ?></td>
	        <td> <?php echo $row['City']; ?></td>
	 <td> <?php echo $row['Mobile']; ?></td>
   <td><a href="AdminFarmerView.php?ID=<?php echo $row['ID']; ?>">View</a></td>
	</tr>
<?php
  }
?>
   </table>
   
  
    <?php
	}
	else
	{
	   echo "No Records Found";
	}
  include("../MasterPages/Footer.php");
  ?>
  