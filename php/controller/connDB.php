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