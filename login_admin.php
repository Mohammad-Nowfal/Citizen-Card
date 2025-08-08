<?php

$host="localhost";
$user="root";
$password="";
$db="ccs";

session_start();

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("Connection Error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    $sql="select * from adminlogin where username='".$username."' AND password='".$password."' ";
    
    $result=mysqli_query($data,$sql);
    
    $rows=mysqli_num_rows($result);
    
if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("location:admin_home.html");
        } else {
            echo "Username or Password Incorrect";
}
}
?>