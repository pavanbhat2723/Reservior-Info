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
                	<td>Channel</td>
					<td><input type="text" name="txtChannel"/></td>
                </tr>
       		
                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" onClick="return check(frm1)" value="Add New">
                    <button type="button" name="btncancel" onClick="window.location.href='EngineerChannelList.php'">Cancel</button>
   	
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

include_once "../DB/db.php";

$insert="INSERT INTO `tblchannels`(`Channel`, `Reservior`) VALUES 
					  ('".$_REQUEST['txtChannel']."','$Reservior')";
$res=execute($insert);

if($res)
{
echo "<script type='text/javascript'> alert('Successfully Inserted');</script>";
echo "<meta http-equiv='refresh' content='0;url=EngineerChannelList.php'>";
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
  if(f.txtChannel.value=="")
   {
        alert("Channel cannot be empty");
        f.txtChannel.focus();
		return false ;
    }
	else
		return true;

}
</script>
