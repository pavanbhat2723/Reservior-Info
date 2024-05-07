
<?php
 include_once "../DB/db.php";
include_once("../MasterPages/AdminHeader.php");
?>

	   <h3>Chief Engineers List</h3>
             
       <button type="button" name="btnadd" onClick="window.location.href='AdminChiefEngineersAdd.php'" style="width:200px;">Add Engineer</button>
   

       <?php

$sql = "SELECT * FROM tblengineers";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <tr><th>Chief Engineer</th>
	 <th>Mobile</th>
     <th>Reservior</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['ChiefEngineer']; ?></td>
	 <td> <?php echo $row['Mobile']; ?></td>
     <td> <?php echo $row['Reservior']; ?></td>
   <td><a class="btn" href="AdminChiefEngineersView.php?ID=<?php echo $row['ID']; ?>">View</a></td>
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