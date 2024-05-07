   
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

 if (isset($_POST['btndelete']))
 {
	$sql="DELETE FROM tblreserviors where ID=$ID";
	$result=execute($sql);	
			 	
	if($result)
	{
		echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=AdminReserviorList.php'>";
	}
	else
	{
		echo "<script type='text/javascript'> alert('Action not processed');</script>";
	}
}
		
if (isset($_POST['btnupdate']))
{
	$Reservior=$_POST['txtReservior'];
	$River=$_POST['txtRiver'];
	$Location=$_POST['txtLocation'];
	$StorageCapacity=$_POST['txtStorageCapacity'];
	$Description=$_POST['txtDescription'];

	
	$sql="Update tblreserviors SET Reservior='$Reservior',River='$River',Location='$Location',StorageCapacity='$StorageCapacity',Description='$Description' where ID=$ID";
	$result=execute($sql);	
	if($result)
	{
		echo "<script type='text/javascript'> alert('Updated Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=AdminReserviorList.php'>";
	}
	else
	{
		echo "<script type='text/javascript'> alert('Action not processed');</script>";
	}
}
?>

<?php
  include("../Masterpages/AdminHeader.php");
?>
  
   <h3> Reservior Details</h3>

   <button type="button" name="btnBack" onClick="window.location.href='AdminReserviorList.php'">Back</button>

 
 <form id="frm" name="frm" method="post" action="">
           	<table id="minitable">
                 <tr>
                	<td>ID </td>
                    <td><label id="l1"><?php echo $ID; ?></label> <input type="text" name="txtID" readonly="readonly" class="hide" value="<?php echo $ID; ?>"/></td>
                </tr>
                
                 <tr>
                	<td> Reservior </td>
					<td><label id="l2"><?php echo $Reservior; ?></label> 
                    <input type="text" name="txtReservior" maxlength="100" class="hide" value="<?php echo $Reservior; ?>" /></td>
                </tr>
                
                
                   <tr>
                	<td> River </td>
                     <td><label id="l4"><?php echo $River; ?></label> 
                    <input type="text" name="txtRiver" maxlength="100" class="hide" value="<?php echo $River; ?>" /></td>
                </tr>
                

                <tr>
            	<td>Location</td>
                <td><label id="l7"><?php echo $Location; ?></label> 
                <textarea type="text" name="txtLocation" style="height:150px; width:200px;" class="hide"><?php echo $Location; ?></textarea></td>
           		 </tr>


                    <tr>
                	<td> Storage Capacity </td>
                     <td><label id="l4"><?php echo $StorageCapacity; ?></label> 
                    <input type="text" name="txtStorageCapacity" maxlength="100" class="hide" value="<?php echo $StorageCapacity; ?>" /></td>
                </tr>


                <tr>
            	<td>Description</td>
                <td><label id="l7"><?php echo $Description; ?></label> 
                <textarea type="text" name="txtDescription" style="height:200px; width:500px;" class="hide"><?php echo $Description; ?></textarea></td>
           		 </tr>
                
             <tr>
                	  <td>
                      
                <Input type="submit" name="btndelete" value="Delete" onclick="return confirmSubmit()" id="button"/>
                 <Input type="submit" class="hide" name="btnupdate" value="Update" onclick="return check(frm)" id="button"/></td>
                 <td>
               <button type="button" name="btnedit" onclick="addInput(this.form);" id="button">Edit</button>
              
               <button type="button" class="hide" name="btncancel" onclick="reloadPage()" id="button" >Cancel</button>
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

<style type="text/css">
input {display:block;}
.hide {display:none;} 

textarea {display:block;}
</style>