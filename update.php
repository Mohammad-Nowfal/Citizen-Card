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

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$email = $_POST['email'];


$s="select *from register where email='$email'";
$result=mysqli_query($con, $s);
$num=mysqli_num_rows($result);
if($num==0){
    die("Not exists");
}


$sql = "UPDATE register SET username='$username', password='$password', confirm_password='$confirm_password' WHERE email='$email'";

if ($con->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

mysqli_close($con);
?>