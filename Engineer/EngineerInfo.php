<?php
session_start();
$Mobile=$_SESSION['UserID'];

include_once "../DB/db.php";
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	$sql = "SELECT * FROM tblengineers where Mobile='$Mobile'";
	
	$result=execute($sql);	
	
	if($row = $result->fetch_assoc())
 	{
 		$ID=$row['ID'];
		$ChiefEngineer=$row['ChiefEngineer'];
		$Address=$row['Address'];
		$Mobile=$row['Mobile'];
		$EmailID=$row['EmailID'];
		$Reservior=$row['Reservior'];
	}


    $sql = "SELECT * FROM tblreserviors where Reservior= '$Reservior'";
 $result=execute($sql);	
 if($row = $result->fetch_assoc())
 {
	$Reservior=$row['Reservior'];
	$River=$row['River'];
	$Location=$row['Location'];
	$StorageCapacity=$row['StorageCapacity'];
	$Description=$row['Description'];
 }

?>


<?php


if (isset($_POST['btnupdate']))
{
	
    $Address=$_REQUEST['txtAddress'];
    $EmailID=$_REQUEST['txtEmailid'];

			
    $sql="Update tblengineers SET Address='$Address',EmailID='$EmailID' where ID=$ID";
	    	
	$res=execute($sql);	
		
	if($res)
	{
	
		echo "<script type='text/javascript'> alert('Updated Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=EngineerInfo.php'>";
	}
	else
	{
		echo "<script type='text/javascript'> alert('Action not processed');</script>";
	}
}
	
?>



  <?php
  include("../MasterPages/EngineerHeader.php");
  ?>
  
  <h3>Engineer Details Page</h3>
  
            
<form id="frminfo" name="frminfo" method="post" action="" enctype="multipart/form-data">
           	<table id="minitable">
            	<tr>
                	<td style="width:40%;">ID </td>
                    <td><?php echo $ID; ?></td>
                </tr>
       			
				<tr>
                	<td>Cheif Engineer</td>
					<td><?php echo $ChiefEngineer; ?></label>
                    </td>
                </tr>
                
                <tr>
                	<td>Address</td>
                    <td><label id="l3"><?php echo $Address; ?></label> 
                       <textarea type="text" name="txtAddress" style="height:100px" class="hide"><?php echo $Address; ?></textarea></td>
                </tr>
                
                
               <tr>
                	<td>Mobile</td>
					<td><?php echo $Mobile; ?>
        </td>
                </tr>
                
                 <tr>
                	<td>EmailID</td>
                  <td>
                  <label id="l3"><?php echo $EmailID; ?></label> 
                  <input type="text" name="txtEmailid" maxlength="100" class="hide" value="<?php echo $EmailID; ?>"/></td>
                  <td>
                </tr>
             
             <tr>
                	<td>Reservior</td>
					<td><?php echo $Reservior; ?></td>
                </tr>
				
				
               <tr>
                	  <td>
                      
                 <Input type="submit" class="hide" name="btnupdate" value="Update" onclick="return check(frminfo)" id="button"/></td>
                 <td>
               <button type="button" name="btnedit" onclick="addInput(this.form);" id="button">Edit</button>
              
               <button type="button" class="hide" name="btncancel" onclick="reloadPage()" id="button" >Cancel</button>
                </td>
                </tr>
                   
			


            
                
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
if (f.txtAddress.value.trim()=="")
{
alert("This Address field can not be empty");
f.txtAddress.focus();
return false ;
}
else
return true;
}

</script>
