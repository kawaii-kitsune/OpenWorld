<?php ?>
<script>
console.log('entered');
</script>
<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "db_contact";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  ?>
<script>
console.log('COnnection not Successfull')
</script>
<?php
  die("Connection failed: " . $conn->connect_error);
}
?>
<script>
console.log('COnnection Successfull')
</script>
<?php

$pinId=$_GET['pinId'];
$sql = "UPDATE `pinscoord` SET available=false WHERE `pinscoord`.`id` = $pinId;";
if ($conn->query($sql) === TRUE) {
  ?>
<?php
    echo "Record altered successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
$conn->close();
header('Location: http://localhost/OpenWorld');
?>