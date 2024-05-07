    
  <?php
include_once "../DB/db.php";
?>
        <?php
  include("../Masterpages/AdminHeader.php");
  ?>
  
  
  
  
   <h3> Add Chief Engineer</h3>
 
 <form id="frm" name="frm" method="post" action="">
           	<table id="fulltable">
                            
               <tr>
                	<td>Cheif Engineer</td>
					<td><input type="text" name="txtCheifEngineer" maxlength="100"/></td>
                </tr>
                
                <tr>
            	<td>Address</td>
                <td><textarea type="text" name="txtAddress" style="height:100px"></textarea></td>
           		 </tr>
                 
                  <tr>
                	<td>Mobile</td>
					<td><input type="text" name="txtMobile" maxlength="10"/></td>
                </tr>
                
                <tr>
                	<td>Email Id</td>
					<td><input type="text" name="txtEmailid" maxlength="100"/></td>
                </tr>
                
            	<tr>
                	<td>Reservior</td>
					<td><select name="cmbReservior">
      					<option value="0">-Select-</option>
  						<?php
								$sel="select * from tblreserviors";
								$from=execute($sel);
								while($ans=mysqli_fetch_object($from))
								{
								?>
								<option value="<?php echo $ans->Reservior; ?>"><?php echo $ans->Reservior; ?></option>
  								<?php } ?>
						</select> 
                   </td>
                </tr>
       			
                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" class="button" onClick="return check(frm)" value="Add New">
                    <button type="button" name="btnadd" class="button" onClick="window.location.href='AdminChiefEngineersList.php'">Cancel</button>
   	
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
 if(f.txtCheifEngineer.value=="")
   {
        alert("Chief Engineer Name cannot be empty");
        f.txtCheifEngineer.focus();
		return false ;
    }
	else if(f.txtAddress.value=="")
{
	alert("This Address field can not be Empty");
    f.txtAddress.focus();
	return false;
}
else if (f.txtMobile.value=="" || checkmobile(f.txtMobile)==false)
{
   alert("This Mobile No field can not be Empty");
   f.txtMobile.focus();
   return false;
}
else if (f.txtEmailid.value=="" || checkemail(f.txtEmailid)==false)
{
   alert("This Email Id field can not be Empty");
   f.txtEmailid.focus();
   return false;
}
  else if(f.cmbReservior.value=="0")
   {
        alert("Select Reservior");
        f.cmbReservior.focus();
		return false ;
    }
	
	else
		return true;

}
</script>


 <?php
if(isset($_REQUEST['btnsave']))
{
	$CheifEngineer=$_POST['txtCheifEngineer'];
	$Address=$_REQUEST['txtAddress'];
	$Mobile=$_REQUEST['txtMobile'];
	$Emailid=$_REQUEST['txtEmailid'];
    $Reservior=$_REQUEST['cmbReservior'];

			
	$sql = "SELECT * FROM tblengineers where Reservior='$Reservior'";
	$count=NumRows($sql);	
	if ($count > 0) 
	{
		echo "<script type='text/javascript'> alert('A engineer already exist for this reservior');</script>";
	}
	else
	{

        $insert="INSERT INTO `tblengineers` (`ChiefEngineer`, `Address`, `Mobile`, `EmailID`, `Reservior`)
					 VALUES ('$CheifEngineer','$Address','$Mobile','$Emailid','$Reservior')";

		$res=execute($insert);

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr(str_shuffle( $chars ), 0, 5);
        
        $insert="INSERT INTO `tbllogin`(`UserID`, `Password`, `UserType`) VALUES ('$Mobile','$password','ChiefEngineer')";
        $res = execute($insert);

        $mobileno=$Mobile;
        $str="Your Login ID is ".$Mobile." and password is ".$password;

        echo "<script type='text/javascript'> alert('Inserted Successfully.$str');</script>";
        echo "<meta http-equiv='refresh' content='0;url=AdminChiefEngineersList.php'>";
	
	}
}
?>