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
					<td>
                    <select name="cmbChannel">
        		    <option value="0">Select</option>
      				<?php
					   	$sql = "SELECT Channel FROM tblchannels where Reservior='$Reservior'";
    	   				$ress=execute($sql);	
					
					   	while($result = mysqli_fetch_assoc($ress))
        				{
	  			       		?>
				            <option <?php echo (isset($_REQUEST['cmbChannel']) ? (($_REQUEST['cmbChannel']== $result['Channel']) ? "Selected" : "") : "")  ?> value = "<?php echo $result['Channel']?>"><?php echo $result['Channel'] ?></option>
                                                        
        				<?php
        		
							}
					
						?>
                        </select>
						
                    </td>
                </tr>

                <tr>
                	<td>From Date</td>
					<td><input type="text" name="txtFromDate"/></td>
                </tr>

                <tr>
                	<td>To Date</td>
					<td><input type="text" name="txtToDate"/></td>
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

    $FromDate=date('Y-m-d', strtotime($_POST['txtFromDate']));
    $ToDate=date('Y-m-d', strtotime($_POST['txtToDate']));
    $Channel=$_POST['cmbChannel'];

$insert="INSERT INTO `tblwatertimetable`(`Reservior`, `Channel`, `FromDate`,
 `ToDate`) VALUES ('$Reservior','$Channel','$FromDate','$ToDate')";
$res=execute($insert);

if($res)
{
echo "<script type='text/javascript'> alert('Successfully Inserted');</script>";
echo "<meta http-equiv='refresh' content='0;url=EngineerWaterTimeTable.php'>";
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
  if(f.cmbChannel.value=="0")
   {
        alert("Select Channel");
        f.cmbChannel.focus();
		return false ;
    }
   else if(f.txtFromDate.value=="")
   {
        alert("From Date cannot be empty");
        f.txtFromDate.focus();
		return false ;
    }
    else if(f.txtToDate.value=="")
   {
        alert("To Date cannot be empty");
        f.txtToDate.focus();
		return false ;
    }
	else
		return true;

}
</script>
