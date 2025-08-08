
<html>
    <body>
            <?php session_start(); $user_id=$_SESSION['user_id']; ?>     
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" readonly >
</body>
    </html>
<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ccs";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
    
        $sql = "SELECT * from upload where user_id=$user_id";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       
       if($resultCheck > 0){
        echo "<table border=1><tr>";
        echo "<th>upload id</th>";
        echo "<th>firstname</th>";
        echo "<th>lastname</th>";
        echo "<th>address</th>";
        echo "<th>phone</th>";
        echo "<th>marital_status</th>";
        echo "<th>UPLOAD</th>";
        echo "<th>action</th>";
        echo "</tr>";
        
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";            
            echo "<td>".$row['upload_id'] ."</td>";
            $u=$row['upload_id'];
            echo "<td>".$row['firstname'] ."</td>";
            echo "<td>".$row['lastname'] ."</td>";
            echo "<td>".$row['address'] ."</td>";
            echo "<td>".$row['phone'] ."</td>";
            echo "<td>".$row['marital_status'] ."</td>";
            echo "<td><a href=image_add.php?id=".$u.">UPLOAD</a></td>";
            echo "<td>".$row['action'] ."</td>";
            }
            echo "</table>";
        }

        ?>