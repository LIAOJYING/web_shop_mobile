<meta charset="utf-8">
<?php 
	try {
		$conn = new PDO("mysql:host=localhost;dbname=shopvn","root","");
		
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$conn->query("SET NAMES 'utf8'");
		
		//$echo = "ket noi thanh cong";
	} catch (PDOException $ex) {
		echo "Loi khong the truy cap du lieu: " . $ex->getMessage();
	}
 ?>