<?php

$username=$_POST['username'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$email=$_POST['email'];




if (!empty($username) || !empty($password)    || !empty($confirm_password) || !empty($email) )
{

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="ccs";



//create connection
$conn=new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('.mysqli_connect_errno() .') '
  . mysqli_connect_error());
}



else{
    
    $SELECT = "SELECT email from register where email = ? limit 1";

    $INSERT = "INSERT Into register(username ,password ,confirm_password ,email )values(?,?,?,?)"; 

//Prepare statement       
      $stmt= $conn->prepare($SELECT);
      $stmt->bind_param("s",$email);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum=$stmt->num_rows;

      //checking username
      if($rnum==0) { 
      $stmt->close();
      $stmt=$conn->prepare($INSERT);
      $stmt->bind_param("ssss",$username,$password,$confirm_password,$email);
      $stmt->execute();
      header("location:login.html");
      echo"New record inserted successfully";
     } else {
      echo"Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo"All fields are required";
 die();
}
?>