<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "db_contact";
$GLTF = $_POST['GLTF'];
$id = $_GET['id'];
// Create connection
$conn = new mysqli($host , $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE pinscoord SET  GLTF='$GLTF' WHERE id=$id ";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
header('Location: http://localhost/OpenWorld');
?>