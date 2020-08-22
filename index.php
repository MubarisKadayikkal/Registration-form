<?php
include("db.php");
dbConnect();
if(isset($_POST['btnSubmit']))
{
	$txtItem    = $_POST['txtItem'];
	$txtPrice   = trim($_POST['txtPrice']);
	$sql = "SELECT * FROM tbl_items WHERE item_name='$txtItem'";
	$res = mysql_query($sql);
	$record = mysql_num_rows($res);
	if($record > 0)
	{
		echo "Item Already added....";
	}
	else
	{
		$sql = "INSERT INTO tbl_items(item_name,unit_price)VALUES('$txtItem','$txtPrice')";
		$res = mysql_query($sql);
		echo "Item added....";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <script>
	 function validation(){
		if(document.getElementById('txtItem').value=="")
		{
         alert("Please Enter Item");
		 document.getElementById('txtItem').focus();
		 return false;
        }
		else if(document.getElementById('txtPrice').value=="")
		{
         alert("Please Enter Price");
		 document.getElementById('txtPrice').focus();
		 return false;
        }
		 
        else{
          return true;
        }	
	 }
	</script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> </title>
  <!-- Tell the browser to be responsive to screen width -->
   
</head>
<body background="12.jpg" bgcolor="#FF0000">
<div>
    <form name="frmLogin"  id="frmLogin" action="" method="POST" onsubmit="return validation()" align="center">
      <div class="form-group has-feedback">
           
		  Enter Item <input type="text" name="txtItem" id="txtItem">  <br>
		  Enter Price <input type="text" name="txtPrice" id="txtPrice"> 
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
       
      <div class="row">
        <div class="col-xs-8">
           
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
		<br><br>
          <input type="submit" name="btnSubmit"  value=" ADD ITEM ">
        </div>
        <!-- /.col -->
      </div>
	  <div>
	    <table border="1" width="75%" align="center">
		   <tr>
		    <td>Sl No</td>
			<td>Item</td>
			<td>Price</td>
			<td>Action</td>
		   </tr>
		   <?php
		   $sl = 0;
		   $sql = "SELECT * FROM  tbl_items";
	$res = mysql_query($sql);
	$record = mysql_num_rows($res);
	if($record > 0)
	{ 
	   while($row=mysql_fetch_array($res)){$sl++;
	   ?>
	<tr>
		    <td><?php echo $sl; ?></td>
			<td><?php echo $row['item_name']; ?></td>
			<td><?php echo $row['unit_price']; ?></td>
			<td><a href="editItem.php?id=<?php echo $row['id']; ?>">Edit</a></td>
		   </tr>
		<?php
	     } 
	}
	?>
		</table>
	  </div>
    </form>
</body>
</html>