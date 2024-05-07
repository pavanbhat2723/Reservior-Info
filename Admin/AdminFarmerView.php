<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	include_once "../DB/db.php";
	
	$ID=$_REQUEST['ID'];

	$sql = "SELECT * FROM tblfarmers where ID=$ID";
	$result=execute($sql);	
	
	if($row = $result->fetch_assoc())
 	{
 		$ID=$row['ID'];
		$FarmerName=$row['FarmerName'];
		$AddressLine1=$row['AddressLine1'];
		$AddressLine2=$row['AddressLine2'];
		$City=$row['City'];
		$Mobile=$row['Mobile'];
	}
?>

<?php


		if (isset($_POST['btnDelete']))
		{
			 $sql="DELETE FROM tblfarmers where ID=$ID";
			 $result=execute($sql);	
			 
			 if($result)
			 {
				 $sql="DELETE FROM tbllogin where UserID='$Mobile'";
				 $res=execute($sql);	

			 	echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
			 	echo "<meta http-equiv='refresh' content='0;url=AdminFarmersList.php'>";
			 }
			 else
			 {
				 echo "<script type='text/javascript'> alert('Action Not Processed');</script>";
			 	 echo "<meta http-equiv='refresh' content='0;url=AdminFarmersList.php'>";
			 }
		}
		
?>


  <?php
  include("../MasterPages/AdminHeader.php");
  ?>
  
  <h3>Farmers Details Page</h3>
  
            
<form id="frmUsers" name="frmUsers" method="post" action="" enctype="multipart/form-data">
           	<table id="minitable">
            	<tr>
                	<td style="width:35%;">ID </td>
                    <td><label id="l1"><?php echo $ID; ?></label></td>
                </tr>
       			
					
				<tr>
                	<td>Farmer Name</td>
                    <td><label id="l2"><?php echo $FarmerName; ?></label></td>
                </tr>
				
				<tr>
                	<td>Address Line1 </td>
                    <td><label id="l3"><?php echo $AddressLine1; ?></label></td>
                </tr>
				
                	
				<tr>
                	<td>Address Line2 </td>
                    <td><label id="l4"><?php echo $AddressLine2; ?></label></td>
                </tr>
				
				 <tr>
                	<td>City</td>
					<td><label id="l5"><?php echo $City; ?></label></td>
                </tr>
				
				
				  <tr>
                	<td>Mobile</td>
					<td><label id="l7"><?php echo $Mobile; ?></label></td>
                </tr>
				
				
                <tr>
                	<td colspan="2" style="text-align:center;">
                     <input type="submit" name="btnDelete" value="Delete" onClick="return confirm(' Are You Sure To Delete? ');"/>
					 
					 <button type="button" name="btnBack" onClick="window.location.href='AdminFarmersList.php'">Back</button>
                    </td>
                </tr>
                   
           </table>
           </form>
         
  
  
    <?php
  include("../MasterPages/Footer.php");
  ?>
  