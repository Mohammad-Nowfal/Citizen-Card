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
    
    $rows=mysqli_num_rows($result);
    
if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("location:home.html");
        } else {
            echo "Username or Password Incorrect";
}
}
?>
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