   
  <?php
include_once "../DB/db.php";

 $ID=$_GET['ID'];
 
 $sql = "SELECT * FROM tblreserviors where ID= $ID";
 $result=execute($sql);	
 if($row = $result->fetch_assoc())
 {
 	$ID=$row['ID'];
	$Reservior=$row['Reservior'];
	$River=$row['River'];
	$Location=$row['Location'];
	$StorageCapacity=$row['StorageCapacity'];
	$Description=$row['Description'];
 }
 ?>

<?php
  include("../Masterpages/FarmerHeader.php");
?>
  
   <h3> Reservior Details</h3>

   <button type="button" name="btnBack" onClick="window.location.href='FarmerReserviorsList.php'">Back</button>

 
 <form id="frm" name="frm" method="post" action="">
           	<table id="minitable">
                
                 <tr>
                	<td> Reservior </td>
					<td><?php echo $Reservior; ?></td>
                </tr>
                
                
                   <tr>
                	<td> River </td>
                     <td><?php echo $River; ?></td>
                </tr>
                

                <tr>
            	<td>Location</td>
                <td><?php echo $Location; ?></td>
           		 </tr>


                    <tr>
                	<td> Storage Capacity </td>
                     <td><?php echo $StorageCapacity; ?></td>
                </tr>


                <tr>
            	<td>Description</td>
                <td><?php echo $Description; ?></td>
           		 </tr>
                
                
           </table>

           <h3>  Channels List  </h3>
  
 <?php
include_once "../DB/db.php";
	
	
	$sql = "SELECT * FROM tblchannels where Reservior='$Reservior'";
				  
	$result = execute($sql);
?>

	<table id="fulltable">
     
     <tr><th>ID</th>
	 <th>Channel</th>
     </tr>
     
     <?php
while($row = mysqli_fetch_array($result))
  { ?>
     <tr>
      <td> <?php echo $row['ID']; ?></td>
	 <td> <?php echo $row['Channel']; ?></td>
   
	</tr>
<?php
  }
?>
   </table>
           </form>
  
   <?php
  include("../Masterpages/Footer.php");
  ?>
  
  