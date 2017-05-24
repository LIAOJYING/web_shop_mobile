<meta charset="utf-8">
<?php 
	include "db.php";

	$username = $_POST['username'];
	$password = $_POST['password'];


	$sql = "INSERT INTO user (username,pass) VALUES ('$username', '$password')";
	$result = $conn->exec($sql);


	if ($result==1) {
		header("Location: login-form.php");
	}else{
		echo "that bai";
	}

 ?>