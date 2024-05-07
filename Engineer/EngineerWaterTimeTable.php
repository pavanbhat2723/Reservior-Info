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
		$sqldel="Delete from tblwatertimetable where ID='".$_REQUEST['ID']."' ";
		$ress=execute($sqldel);	
	
		if($ress)
		{
			echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
			echo "<meta http-equiv='refresh' content='0;url=EngineerWaterTimeTable.php'>";
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
  
  
  <h3>  Water Release Schedules  </h3>
  
  <button type="button" name="btnadd" onClick="window.location.href='EngineerWaterTimeTableAdd.php'">Add Water Schedule</button>
  
 <?php
include_once "../DB/db.php";
	
	
	$sql = "SELECT * FROM tblwatertimetable where Reservior='$Reservior'";
				  
	$result = execute($sql);
?>

	<table id="fulltable">
     
     <tr><th>Channel</th>
	 <th>From</th>
     <th>To</th>
     <th>Delete</th>
     </tr>
     
     <?php
while($row = mysqli_fetch_array($result))
  { ?>
     <tr>
     <td> <?php echo $row['Channel']; ?></td>
     <td> <?php $date=date('d-m-Y', strtotime($row['FromDate'])); echo $date; ?></td>
     <td> <?php $date=date('d-m-Y', strtotime($row['ToDate'])); echo $date; ?></td>
   <td><a href="EngineerWaterTimeTable.php?ID=<?php echo $row['ID']; ?>&Mode=Delete" onClick="return confirm(' Are You Sure To Delete? ');" >
  Delete</a>	 </td>
	</tr>
<?php
  }
?>
   </table>
 
 
  
    <?php
  include("../MasterPages/Footer.php");
  ?>
  