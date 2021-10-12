<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "db_contact";
$id = $_GET['id'];
$url="";
// Create connection
$mysqli = mysqli_connect($host , $dbusername, $dbpassword, $dbname);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $query = Mysqli_Query($mysqli,"SELECT `GLTF` FROM `pinscoord` WHERE `id`='$id'") or die(mysql_error());
  if( ! mysqli_num_rows($query) ) 
  {
  echo 'No results found.';
  }
  else
  {   
   $bananas_array = mysqli_fetch_assoc($query);
   $bananas = $bananas_array['GLTF'];
   echo  $bananas;      
  }
$mysqli -> close();

?>