<?php
include_once "../DB/db.php";

 $ID=$_GET['ID'];
 $result = execute("SELECT * FROM tblengineers where ID= $ID");
 if($row = mysqli_fetch_array($result))
 {
 	$ID=$row['ID'];
	$ChiefEngineer=$row['ChiefEngineer'];
	$Address=$row['Address'];
	$Mobile=$row['Mobile'];
	$EmailID=$row['EmailID'];
	$Reservior=$row['Reservior'];
}

		if (isset($_POST['btndelete']))
		{
			 $sql="DELETE FROM tblengineers where ID=$ID";
	    	 execute($sql);
			 
			  $sql="DELETE FROM tbllogin where UserID='$EmailID'";
	    	 execute($sql);
			 
			 echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
			 echo "<meta http-equiv='refresh' content='0;url=AdminChiefEngineersList.php'>";
		}
		
		elseif (isset($_POST['btnupdate']))
		{
      $Address=$_REQUEST['txtAddress'];
      $Emailid=$_REQUEST['txtEmailid'];

		
			 $sql="Update tblengineers SET Address='$Address',EmailID='$Emailid' where ID=$ID";
	    	 execute($sql);
			 echo "<script type='text/javascript'> alert('Updated Successfully');</script>";
			 echo "<meta http-equiv='refresh' content='0;url=AdminChiefEngineersList.php'>";
		}
		
  include("../MasterPages/AdminHeader.php");
  ?>
  

<h3>Chief Engineer Details</h3>
  
   <button type="button" name="btnBack" onclick="window.location.href='AdminChiefEngineersList.php'">Go Back</button>
   
 <form id="frm" name="frm" method="post" action="">
           	<table id="minitable">
            	<tr>
                	<td>ID </td>
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
 if(f.txtAddress.value=="")
{
	alert("This Address field can not be Empty");
    f.txtAddress.focus();
	return false;
}
else if (f.txtEmailid.value=="" || checkemail(f.txtEmailid)==false)
{
   alert("This Email Id field can not be Empty");
   f.txtEmailid.focus();
   return false;
}
	else
		return true;

}
</script>
