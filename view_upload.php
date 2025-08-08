<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ccs";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
    
        $sql = "SELECT * from upload";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       
       if($resultCheck > 0){
        echo "<table border=1><tr>";
        echo "<th>upload id</th>";
        echo "<th>firstname</th>";
        echo "<th>lastname</th>";
        echo "<th>address</th>";
        echo "<th>phone</th>";
        echo "<th>Martial status</th>";
        echo "<th>Action</th>";
        echo "<th>approve</th>";
        echo "<th>reject</th>";

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
            echo "<td>".$row['action'] ."</td>";
            echo "<td><a href=approve.php?upload_id=".$u.">APPROVE</a></td>";
            echo "<td><a href=reject.php?upload_id=".$u.">REJECT</a></td>";
            }
            echo "</table>";
        }

        ?>