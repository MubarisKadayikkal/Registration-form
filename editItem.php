<?php

include("db.php");
dbConnect();

 $id = $_GET['id'];  // GETS URL VALUES
 
 //TAKE DATA FROM CORRESPONDING id
 $sql = "SELECT * FROM tbl_items WHERE id='$id'";
 $res = mysql_query($sql);
 $record = mysql_num_rows($res);
 $row = mysql_fetch_array($res);
 $item_name 	= $row['item_name'];
 $unit_price	= $row['unit_price'];
 


if(isset($_POST['btnSubmit'])){
	
	$txtItem    = $_POST['txtItem'];
	$txtPrice   = trim($_POST['txtPrice']);
	$hidId   = $_POST['hidId'];
	$sql = "SELECT * FROM tbl_items WHERE item_name='$txtItem' AND id!='$hidId'";
	$res = mysql_query($sql);
	$record = mysql_num_rows($res);
	if($record > 0)
	{
		echo "Item Already added....";
	}
	else
	{
		$sql = "UPDATE tbl_items SET item_name='$txtItem',unit_price='$txtPrice' WHERE id='$hidId'";
		$res = mysql_query($sql);
		echo "Item updated....";
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
<body >

    <form name="frmLogin"  id="frmLogin" action="" method="POST" onsubmit="return validation()">
      <div class="form-group has-feedback">
           
		  Enter Item <input type="text" name="txtItem" id="txtItem" value="<?php echo  $item_name; ?>">  <br>
		  Enter Price <input type="text" name="txtPrice" id="txtPrice" value="<?php echo  $unit_price; ?>"> 
		  <input type="hidden" name="hidId" id="hidId" value="<?php echo  $id; ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
       
      <div class="row">
        <div class="col-xs-8">
           
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
		<br><br>
          <input type="submit" name="btnSubmit"  value=" Update">
        </div>
        <!-- /.col -->
      </div>
	  
	  
	   
	  
    </form>


</body>
</html>
