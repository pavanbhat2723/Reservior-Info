<?php
session_start();
$Mobile=$_SESSION['UserID'];

include_once "../DB/db.php";
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	$sql = "SELECT * FROM  tblfarmers where Mobile='$Mobile'";
	
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


if (isset($_POST['btnupdate']))
{
	$AddressLine1=$_POST['txtAddressLine1'];
	$AddressLine2=$_POST['txtAddressLine2'];
	$City=$_POST['txtCity'];
			
	 $sql="UPDATE `tblfarmers` SET `AddressLine1`='$AddressLine1',`AddressLine2`='$AddressLine2',`City`='$City' WHERE Mobile='$Mobile'";
	    	
	$res=execute($sql);	
		
	if($res)
	{
	
		echo "<script type='text/javascript'> alert('Updated Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=FarmerInfo.php'>";
	}
	else
	{
		echo "<script type='text/javascript'> alert('Action not processed');</script>";
	}
}
	
?>



  <?php
  include("../MasterPages/FarmerHeader.php");
  ?>
  
  <h3>Farmer Details Page</h3>
  
            
<form id="frminfo" name="frminfo" method="post" action="" enctype="multipart/form-data">
           	<table id="minitable">
            	<tr>
                	<td style="width:50%;">ID </td>
                    <td><?php echo $ID; ?></td>
                </tr>
       			
					
				<tr>
                	<td>Farmer Name</td>
                    <td><?php echo $FarmerName; ?></td>
                </tr>
				
				
				<tr>
                	<td>Address Line1 </td>
                    <td><label id="l3"><?php echo $AddressLine1; ?></label>
					 <input type="text" name="txtAddressLine1" maxlength="100" class="hide" value="<?php echo $AddressLine1; ?>"/>
					</td>
                </tr>
				
                	
				<tr>
                	<td>Address Line2 </td>
                    <td><label id="l4"><?php echo $AddressLine2; ?></label>
					 <input type="text" name="txtAddressLine2" maxlength="100" class="hide" value="<?php echo $AddressLine2; ?>"/>
					</td>
                </tr>
				
				 <tr>
                	<td>City </td>
                    <td><label id="l4"><?php echo $City; ?></label>
					 <input type="text" name="txtCity" maxlength="100" class="hide" value="<?php echo $City; ?>"/>
					</td>
                </tr>
				<tr>
                	<td>Mobile</td>
					<td><?php echo $Mobile; ?></td>
                </tr>
				
				
               <tr>
                	  <td>
                      
                 <Input type="submit" class="hide" name="btnupdate" value="Update" onclick="return check(frminfo)" id="button"/></td>
                 <td>
               <button type="button" name="btnedit" onclick="addInput(this.form);" id="button">Edit</button>
              
               <button type="button" class="hide" name="btncancel" onclick="reloadPage()" id="button" >Cancel</button>
                </td>
                </tr>
                   
			
			
           </table>
           </form>
         
  
  
    <?php
  include("../MasterPages/Footer.php");
  ?>
  
  <style type="text/css">
input {display:block;}
.hide {display:none;} 

textarea {display:block;}
</style>


 <script language="javascript">
function check(f)
{
if (f.txtAddressLine1.value.trim()=="")
{
alert("This AddressLine1 field can not be empty");
f.txtAddressLine1.focus();
return false ;
}
else
return true;
}

</script>
