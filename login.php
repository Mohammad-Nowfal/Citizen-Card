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
    
    $sql="select * from register where username='".$username."' AND password='".$password."' ";
    
    $result=mysqli_query($data,$sql);
    $fetch=mysqli_fetch_array($result);

    $rows=mysqli_num_rows($result);
    
if ($rows == 1) {

            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $fetch['user_id'];
            echo $_SESSION['user_id'];
            //Redirect to user dashboard page
            header("location:home.php");
        } else {
            echo "Username or Password Incorrect";
}
}
?>