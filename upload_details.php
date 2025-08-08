<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ccs";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
	
$user_id=filter_input(INPUT_POST, 'user_id');
$firstname=filter_input(INPUT_POST, 'firstname');
$lastname=filter_input(INPUT_POST, 'lastname');
$address=filter_input(INPUT_POST, 'address');
$phone=filter_input(INPUT_POST, 'phone');
$marital_status=filter_input(INPUT_POST, 'marital_status');

	$sql="INSERT INTO `upload`(`user_id`,`firstname`,lastname,`address`,phone,`marital_status`)
	values('$user_id','$firstname','$lastname','$address','$phone','$marital_status')";

	
	if ($conn->query($sql)) {
		echo("Details uploaded succesfully");	
	}

?>