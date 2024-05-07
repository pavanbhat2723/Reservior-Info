    
  <?php
include_once "../DB/db.php";
?>
        <?php
  include("../Masterpages/AdminHeader.php");
  ?>
  
  
  
  
   <h3> Add Reservior</h3>
 
 <form id="frm" name="frm" method="post" action="">
           	<table id="fulltable">
                            
                 <tr>
                	<td> Reservior </td>
					<td><input type="text" name="txtReservior" maxlength="100" /></td>
                </tr>

                <tr>
                	<td> River </td>
					<td><input type="text" name="txtRiver" maxlength="100" /></td>
                </tr>
                
                  <tr>
            	<td>Location</td>
                <td><textarea type="text" name="txtLocation" style="height:150px; width:200px;"></textarea></td>
           		 </tr>

                    <tr>
                	<td> Storage Capacity </td>
					<td><input type="text" name="txtStorageCapacity" maxlength="100" /></td>
                </tr>
              
                <tr>
            	<td>Description</td>
                <td><textarea type="text" name="txtDescription" style="height:300px; width:500px;"></textarea></td>
           		 </tr>

                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" class="button" onClick="return check(frm)" value="Add New">
                    <button type="button" name="btnadd" class="button" onClick="window.location.href='AdminReserviorList.php'">Cancel</button>
   	
                    </td>
                </tr>
           </table>
           </form>
  
   <?php
  include("../Masterpages/Footer.php");
  ?>
  
  
  <script language="javascript">
function check(f)
{
 	if(f.txtReservior.value=="")
	{
		alert("Enter Reservior");
        f.txtReservior.focus();
		return false ;
	}
	else if(f.txtRiver.value=="")
	{
		alert("Enter River");
        f.txtRiver.focus();
		return false ;
	}
	else if(f.txtLocation.value=="")
	{
		alert("Enter Location");
        f.txtLocation.focus();
		return false ;
	}
	else if(f.txtStorageCapacity.value=="")
	{
		alert("Enter Storage Capacity");
        f.txtStorageCapacity.focus();
		return false ;
	}
	else if (f.txtDescription.value=="")
   	{
        alert("Enter Description");
        f.txtDescription.focus();
		return false ;
    }
	
	else
		return true;

}
</script>


 <?php
if(isset($_REQUEST['btnsave']))
{
	$Reservior=$_POST['txtReservior'];
	$River=$_POST['txtRiver'];
	$Location=$_POST['txtLocation'];
	$StorageCapacity=$_POST['txtStorageCapacity'];
	$Description=$_POST['txtDescription'];

			
	$sql = "SELECT * FROM tblreserviors where Reservior='$Reservior'";
	$count=NumRows($sql);	
	if ($count > 0) 
	{
		echo "<script type='text/javascript'> alert('Reservior Already Exist');</script>";
	}
	else
	{
		$insert="INSERT INTO `tblreserviors`(`Reservior`, `River`, `Location`, `StorageCapacity`, `Description`) VALUES ('$Reservior','$River','$Location','$StorageCapacity','$Description')";
		$res=execute($insert);
		
		echo "<script type='text/javascript'> alert('Inserted Successfully.$str');</script>";
		echo "<meta http-equiv='refresh' content='0;url=AdminReserviorList.php'>";
	}
}
?>