<?php

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="ccs";



//create connection
$conn=new mysqli($host, $dbusername, $dbpassword, $dbname);

session_start();

if($conn==false)
{
    die("Connection Error");
}


error_reporting(0);    

$user_id=$_POST['id'];
$sql="DELETE FROM register WHERE user_id=$user_id";


$s="select * from register where user_id = '$user_id'";
$result = mysqli_query($conn,$s);
$num=mysqli_num_rows($result);
if($num==0){
    die("Item Not Exists");
}


if ($_POST['submit']){
   if (mysqli_query($conn,$sql)) {
       echo "Data deleted successfully";
}
else{
    echo "Something went wrong";
}
  }

?>