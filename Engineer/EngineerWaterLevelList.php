<?php
session_start();
$Mobile=$_SESSION['UserID'];
?>

 <?php
include_once "../DB/db.php";

$sql = "SELECT * FROM tblengineers where Mobile='$Mobile'";
	
$result=execute($sql);	

if($row = $result->fetch_assoc())
 {
    $Reservior=$row['Reservior'];
}


if(isset($_GET['Mode'] ))
{
	if($_GET['Mode'] =="Delete") 
	{
		$sqldel="Delete from tblWaterLevels where ID='".$_REQUEST['ID']."' ";
		$ress=execute($sqldel);	
	
		if($ress)
		{
			echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
			echo "<meta http-equiv='refresh' content='0;url=EngineerWaterLevelList.php'>";
		}
		else
		{
			echo "<script type='text/javascript'> alert('Action not processed');</script>";
		}
	}
}

?>

  <?php
  include("../MasterPages/EngineerHeader.php");
  ?>
  
  
  <h3>  Water Level List  </h3>
  
  <button type="button" name="btnadd" onClick="window.location.href='EngineerWaterLevelAdd.php'">Add Water Level</button>
  
 <?php
include_once "../DB/db.php";
	
	
	$sql = "SELECT * FROM tblWaterLevels where Reservior='$Reservior'";
				  
	$result = execute($sql);
?>

	<table id="fulltable">
     
     <tr><th>Date</th>
	 <th>Inflow</th>
     <th>Outflow</th>
     <th>Current Levl</th>
     <th>Delete</th>
     </tr>
     
     <?php
while($row = mysqli_fetch_array($result))
  { ?>
     <tr>
     <td> <?php $date=date('d-m-Y', strtotime($row['UDate'])); echo $date; ?></td>
      <td> <?php echo $row['Inflow']; ?></td>
      <td> <?php echo $row['Outflow']; ?></td>
	 <td> <?php echo $row['CurrentCapacity']; ?></td>
   <td><a href="EngineerWaterLevelList.php?ID=<?php echo $row['ID']; ?>&Mode=Delete" onClick="return confirm(' Are You Sure To Delete? ');" >
  Delete</a>	 </td>
	</tr>
<?php
  }
?>
   </table>
 
 
  
    <?php
  include("../MasterPages/Footer.php");
  ?>
  