<?php
	session_start();	
	if(isset($_GET['item'])) {
		$item = $_GET['item'];
		if(isset($_SESSION['cart'][$item])) {
			unset($_SESSION['cart'][$item]);
		}elseif($item==0) {
			unset($_SESSION['cart']);
		}
	}	
	header('location:cart.php');
?>