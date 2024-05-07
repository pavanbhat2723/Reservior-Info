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



?>

  <?php
  include("../MasterPages/FarmerHeader.php");
  ?>
  
  
  <h3>  Water Release Schedules  </h3>
  

  <form id="frm" name="frm" method="post" action="">  
  <table id="minitable">
  <tr>
                	<td>Reservior</td>
					<td>
                        <select name="cmbReservior" onChange="check1()">
        		    <option value="0">Select</option>
      				<?php
					   	$sql = "SELECT distinct(Reservior) FROM tblreserviors";
    	   				$query_result = execute($sql);
					   	while($result = mysqli_fetch_assoc($query_result))
        				{
	  			       		?>
				            <option <?php echo (isset($_REQUEST['cmbReservior']) ? (($_REQUEST['cmbReservior']== $result['Reservior']) ? "Selected" : "") : "")  ?> value = "<?php echo $result['Reservior']?>"><?php echo $result['Reservior'] ?></option>
                                                        
        				<?php
        		
							}
					
						?>
                        </select>
                   </td>
                </tr>
</table>

<?php
			if(isset($_REQUEST['cmbReservior']))
	{
		if($_REQUEST['cmbReservior']!='0')
		{
		?>

 <?php
	$sql = "SELECT * FROM tblwatertimetable where Reservior='". $_REQUEST['cmbReservior']."'";
				  
	$result = execute($sql);
?>

	<table id="fulltable">
     
     <tr><th>Channel</th>
	 <th>From</th>
     <th>To</th>
     </tr>
     
     <?php
while($row = mysqli_fetch_array($result))
  { ?>
     <tr>
     <td> <?php echo $row['Channel']; ?></td>
     <td> <?php $date=date('d-m-Y', strtotime($row['FromDate'])); echo $date; ?></td>
     <td> <?php $date=date('d-m-Y', strtotime($row['ToDate'])); echo $date; ?></td>
   
	</tr>
<?php
  }
?>
   </table>
 
 <?php
 }
  }
  ?>

</form>
 
 
  
    <?php
  include("../MasterPages/Footer.php");
  ?>
  
<script type="text/javascript">
function check1() {
     document.frm.submit()
}
</script>
  