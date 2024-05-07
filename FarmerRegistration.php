<?php  
  include_once "DB/db.php";
  ?>
  
   <?php
  if(isset($_REQUEST['btnSave']))
  {
	$FarmerName=$_POST['txtFarmerName'];
	$AddressLine1=$_POST['txtAddressLine1'];
	$AddressLine2=$_POST['txtAddressLine2'];
	$City=$_POST['txtCity'];
	$Mobile=$_POST['txtMobile'];
	
	$sql = "SELECT * FROM tbllogin WHERE UserID = '$Mobile'";	
	$ress=execute($sql);	
	if ($ress->num_rows > 0) 
	{
		echo "<script type='text/javascript'> alert('This Mobile number is already Registered.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=Login.php'>";
	}
	else
	{

		$sql="INSERT INTO `tblfarmers`(`FarmerName`, `AddressLine1`, `AddressLine2`, `City`, `Mobile`) VALUES ('$FarmerName','$AddressLine1','$AddressLine2','$City','$Mobile')";
		$res=execute($sql);	
	
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$password = substr(str_shuffle( $chars ), 0, 5);
		
		$insert="INSERT INTO `tbllogin` (`UserID`, `Password`, `UserType`) VALUES ('$Mobile', 		'$password', 'Farmer')";
		$res=execute($insert);
		$mobileno=$Mobile;
		$str="Your Login ID is ".$Mobile." and password is ".$password;
		
		if($res)
		{
			echo "<script type='text/javascript'> alert('Registered Successfully.$str');</script>";
			echo "<script type='text/javascript'>
window.open('http://s.exonics.co.in/api/sendmsg.php?user=chetanpuc&pass=chetan12345678&sender=CHETAN&phone=$mobileno&text=$str Message&priority=ndnd&stype=normal');</script>";
			echo "<meta http-equiv='refresh' content='0;url=Login.php'>";
		}
		else
		{
			echo "<script type='text/javascript'> alert('Action is not processed');</script>";
		}
	}
}
?>

  <?php  
  
  include("MasterPages/Header.php");
  ?>
  
  <h3>Register Farmer Here</h3>

                <form id="frmadd" name="frmadd" method="post" action="">
           	<table id="minitable">
            					
				<tr>
                	<td>Farmer Name</td>
					<td><input type="text" name="txtFarmerName" maxlength="100"/></td>
                </tr>
				
				<tr>
                	<td>Address Line1</td>
					<td><input type="text" name="txtAddressLine1" maxlength="100"/></td>
                </tr>
				
				<tr>
                	<td>Address Line2</td>
					<td><input type="text" name="txtAddressLine2" maxlength="100"/></td>
                </tr>
       			<tr>
                	<td>City</td>
					<td><input type="text" name="txtCity" maxlength="100"/></td>
                </tr>
				<tr>
                	<td>Mobile</td>
					<td><input type="text" name="txtMobile" maxlength="10" onKeyPress="return numbersonly(event, false)"/></td>
                </tr>
				
                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnSave" onClick="return check(frmadd)" value="Register" />
                    <button type="button" name="btncancel" onClick="window.location.href='Login.php'">Cancel</button>
   	
                    </td>
                </tr>
           </table>
           </form>
  
         			<?php
  include("MasterPages/Footer.php");
  ?>
  
  
  <script language="javascript">
function check(f)
{
if (f.txtFarmerName.value=="")
{
alert("This Farmer Name field can not be empty");
f.txtFarmerName.focus();
return false ;
}
else if (f.txtAddressLine1.value.trim()=="")
{
alert("This AddressLine1 field can not be empty");
f.txtAddressLine1.focus();
return false ;
}
else if (f.txtCity.value.trim()=="")
{
alert("This City field can not be empty");
f.txtCity.focus();
return false ;
}
else if (f.txtMobile.value.trim()=="" || checkmobile(f.txtMobile)==false)
{
alert("This Mobile field can not be empty");
f.txtMobile.focus();
return false ;
}

else
return true;
}

</script>
