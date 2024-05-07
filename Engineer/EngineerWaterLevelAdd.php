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
  include("../MasterPages/EngineerHeader.php");
  ?>
  
<h3>  Add Channel </h3>
 
 <form id="frm1" name="frm1" method="post" action="">
           	<table id="minitable">
            	<tr>
                	<td>Inflow</td>
					<td><input type="text" name="txtInflow"/></td>
                </tr>

                <tr>
                	<td>Outflow</td>
					<td><input type="text" name="txtOutlow"/></td>
                </tr>

                <tr>
                	<td>Current Level</td>
					<td><input type="text" name="txtCurrentCapacity"/></td>
                </tr>
       		
                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" onClick="return check(frm1)" value="Add New">
                    <button type="button" name="btncancel" onClick="window.location.href='EngineerWaterLevelList.php'">Cancel</button>
   	
                    </td>
                </tr>
           </table>
           </form>
  
  
  <?php
  include("../MasterPages/Footer.php");
  ?>
  
  
   <?php
if(isset($_REQUEST['btnsave']))
{

    $UDate=date('Y-m-d');

$insert="INSERT INTO `tblwaterlevels`(`Reservior`, `UDate`, `Inflow`, 
`Outflow`, `CurrentCapacity`) VALUES ('$Reservior','$UDate',
'".$_REQUEST['txtInflow']."','".$_REQUEST['txtOutlow']."',
'".$_REQUEST['txtCurrentCapacity']."')";
$res=execute($insert);

if($res)
{
echo "<script type='text/javascript'> alert('Successfully Inserted');</script>";
echo "<meta http-equiv='refresh' content='0;url=EngineerWaterLevelList.php'>";
}
else
{
echo "<script type='text/javascript'> alert('Query not executed');</script>";
}	
}
?>



<script language="javascript">
function check(f)
{
  if(f.txtInflow.value=="")
   {
        alert("Inflow cannot be empty");
        f.txtInflow.focus();
		return false ;
    }
   else if(f.txtOutlow.value=="")
   {
        alert("Outflow cannot be empty");
        f.txtOutlow.focus();
		return false ;
    }
    else if(f.txtCurrentCapacity.value=="")
   {
        alert("Current Capacity cannot be empty");
        f.txtCurrentCapacity.focus();
		return false ;
    }
	else
		return true;

}
</script>
