<?php
function dbConnect(){
  global $conn;
   $dbhost = "localhost";
   $dbuser ="root";
   $dbpass="";
   $dbname="sales";
   $conn = mysql_connect($dbhost,$dbuser,$dbpass);
   mysql_select_db($dbname);	
   
   //$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
 
  if(! $conn ) {
          die('Could not connect: ' . mysql_error());
  }
   
   
}
?>