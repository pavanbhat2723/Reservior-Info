<?php
session_start();
?>

   <?php
  include("MasterPages/Header.php");
  ?>


            <h3>Login Page</h3>


          <form id="frmLogin" name="frmLogin" method="post" action="">
           	<table id="minitable">
            	<tr>
                	<td style="width:38%;">User ID</td>
					<td><input type="text" name="txtusername"/></td>
                </tr>
       			
                <tr>
                	<td>Password</td>
					<td><input type="password" name="txtpassword"/></td>
                </tr>
                <tr>
                	<td colspan="2" style="text-align:center;">
                     <input type="submit" name="btnLogin" onClick="return check(frmLogin)" value="Login" />
                    </td>
                </tr>
                  <tr>
                  <td colspan="2" style="text-align:center;">
                     <button type="button" name="btnRegisterFarmer" onClick="window.location.href='FarmerRegistration.php'">New Farmer?</button>
                    </td>
				
                   
                </tr>
           </table>
           </form>


<?php
  include("MasterPages/Footer.php");
  ?>


<?php
if(isset($_REQUEST['btnLogin']))
{

	$user_name=$_REQUEST['txtusername'];
	$user_pwd=$_REQUEST['txtpassword'];
	
	$sql = "SELECT * FROM tbllogin WHERE UserID = '$user_name' AND Password = '$user_pwd'";

	include_once "DB/db.php";
	
	$ress=execute($sql);	
	$res=mysqli_num_rows($ress);
	
	
	if ($res>0) 
	{
    	/* fetch object array */
    	if ($row = $ress->fetch_row())
		 {
        	$UserType=$row[3];
			$UserID=$row[1];
    	}
	    /* free result set */
    	$ress->close();
	}

	if($res > 0 && $UserType=="Admin")
	{

		$_SESSION['UserType']=$UserType;
		$_SESSION['UserID']=$UserID;

		echo "<script type='text/javascript'> alert('Login Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=Admin/AdminHome.php'>";
	
	}
	else if($res > 0 && $UserType=="ChiefEngineer")
	{

        $_SESSION['UserType']=$UserType;
		$_SESSION['UserID']=$UserID;
		
		echo "<script type='text/javascript'> alert('Login Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=Engineer/EngineerHome.php'>";
	}
	else if($res > 0 && $UserType=="Farmer")
	{
        $_SESSION['UserType']=$UserType;
		$_SESSION['UserID']=$UserID;
		
		echo "<script type='text/javascript'> alert('Login Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=Farmer/FarmerHome.php'>";
	}
	else
	{ 	
		echo "<script type='text/javascript'> alert('Invalid Login');</script>";	
	}
}
?>


<script language="javascript">
function check(f)
{
str=document.frmLogin.txtusername.value;
str1=document.frmLogin.txtpassword.value;
if(str=="")
{
alert("This username field can not be empty");
f.txtusername.focus();
return false ;
}
else if (str1=="")
{
alert("This password field can not be empty");
f.txtpassword.focus();
return false ;

}
}
</script>
