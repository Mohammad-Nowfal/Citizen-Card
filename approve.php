<?php

$hostname="localhost"; //local server name default localhost
$username="root";  //mysql username default is root.
$password="";       //blank if no password is set for mysql.
$database="ccs";  //database name which you created

$con=mysqli_connect($hostname, $username, $password, $database);

if(! $con)
{
die('Connection Failed'.mysql_error());
}

$upload_id= $_GET['upload_id'];

$sql = "UPDATE upload SET action='APPROVED' WHERE `upload_id`='$upload_id'";

if ($con->query($sql) === TRUE) {
  echo "Approved successfully";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

mysqli_close($con);
?>