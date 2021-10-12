<?php
$txtName = filter_input(INPUT_POST, 'txtName');
$txtΧ = filter_input(INPUT_POST, 'txtΧ');
$txtY = filter_input(INPUT_POST, 'txtY');
if (!empty($txtName)){
if (!empty($txtΧ)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "db_contact";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO pinscoord(fldName,x,y)
values ('$txtName','$txtΧ','$txtY')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "txtName should not be empty";
die();
}
}
else{
echo "txtΧ should not be empty";
die();
}
header('Location: http://localhost/OpenWorld');
?>