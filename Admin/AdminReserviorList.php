
<?php
 include_once "../DB/db.php";
include_once("../MasterPages/AdminHeader.php");
?>

	   <h3>Reserviors List</h3>
             
       <button type="button" name="btnadd" onClick="window.location.href='AdminReserviorAdd.php'" style="width:200px;">Add Reservior</button>
   

       <?php

$sql = "SELECT * FROM tblreserviors";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <tr><th>Reserviors</th>
	 <th>River</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['Reservior']; ?></td>
	 <td> <?php echo $row['River']; ?></td>
   <td><a class="btn" href="AdminReserviorView.php?ID=<?php echo $row['ID']; ?>">View</a></td>
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

  ?>

   <br>      
   
<?php

include_once("../MasterPages/Footer.php");
?>