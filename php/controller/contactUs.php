<?php
$txtName = filter_input(INPUT_POST, 'txtName');
$txtEmail = filter_input(INPUT_POST, 'txtEmail');
$txtPhone = filter_input(INPUT_POST, 'txtPhone');
$txtMessage = filter_input(INPUT_POST, 'txtMessage');
if (!empty($txtName)){
if (!empty($txtEmail)){
$host = "localhost";
$dbusername = "babis";
$dbpassword = "boohaha1!@#";
$dbname = "db_contact";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO tbl_contact(fldName,fldEmail,fldPhone,fldMessage)
values ('$txtName','$txtEmail','$txtPhone','$txtMessage')";
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
echo "txtEmail should not be empty";
die();
}
?>