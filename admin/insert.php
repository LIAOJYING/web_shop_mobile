<meta charset="utf-8">
<?php 
	include "db.php";

	$name = $_POST['name'];
	$price = $_POST['price'];
	$summary = $_POST['summary'];

	$imgName = $_FILES['image']['name'];
	$imgFrom = $_FILES['image']['tmp_name'];
	$imgTo = 'public/upload/product/';

	move_uploaded_file($imgFrom, $imgTo.$imgName);

	$sql = "INSERT INTO products (name,price,summary,image) VALUES ('$name', '$price','$summary','$imgName')";
	$result = $conn->exec($sql);
	header('Location:index.php');

	// if ($result==1) {
	// 	echo "Thanh cong";
	// }else{
	// 	echo "that bai";
	// }

 ?>