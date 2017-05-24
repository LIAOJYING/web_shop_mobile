<?php
	include 'admin/db.php';
	session_start();

	if(isset($_POST["submit"])){
		foreach ($_POST['qty'] as $key => $value) {
			# code...
			if($value == 0 && is_numeric($value)){
				unset($_SESSION['cart'][$key]);
			} elseif($value>0 && is_numeric($value)){
				$_SESSION['cart'][$key] = $value;
			}
		}

		header("location: cart.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>SHOPPING CART</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wraper">
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-phone"></i> Thế giới di động</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                        if(isset($_SESSION['user']))
                        {
                            echo "<a href='logout.php'>LOGOUT</a>";
                        } else {
                            echo "<a href='login-form.php'>LOGIN</a>";
                        }

                    ?>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php
	$ok = 1;

	//Kiem tra xem co san pham trong gio hang khong
	if(isset($_SESSION['cart'])){

		foreach ($_SESSION['cart'] as $key => $value) {
			# code...
			if (isset($key)) {
				# code...
				$ok = 2; //Co san pham
			}
		}
	}
	if ($ok==2) {
		echo "<div class='container'>";
		echo "<h1>CART</h1>";
		echo '<form action="cart.php" method="post">';
		foreach ($_SESSION['cart'] as $key => $value) {
			//Lay ra $key (id cua san pham)
			$item[] = $key;
		}
		//Dua cac key ve dang chuoi
		$str = implode(",",$item);

		$sql = "SELECT * FROM products WHERE id in($str)";

		$result = $conn->query($sql);

		//Tong tien cua ca gio hang
		$tongtien = 0;
		//Liet ke cac san pham co trong gio hang
		while ($row = $result->fetch()) {
					echo "<div class='thumbnail'>";
						echo "<div class='' align='left'>";
							echo "<h3>$row[name]</h3>";
							echo "$row[summary]<br>";
							echo "Number: <input class='input-box' type='text' value='". $_SESSION['cart'][$row['id']] ."' name='qty[". $row['id'] ."]' />  
								<p class='input-lable'>Price: ". number_format($row['price']). " VND</p>";
						echo "<div align='right'>";
							echo "<p>Total: ".number_format($_SESSION['cart'][$row['id']]*$row['price'])." VND<br>";
							echo "<a class='btn btn-danger' href='delcart.php?item=".$row['id']."'>Delete Product</a></p>";
						echo "</div>";
					echo "</div>";
					echo "</div>";
			$tongtien += $_SESSION['cart'][$row['id']]*$row['price'];
		}

		//Hien thi tong tien cua gio hang

		echo "<div class='thumbnail'><strong><p align='right'> <span class='glyphicon glyphicon-usd'>Total:</span> ".number_format($tongtien)." VND</p></strong></div>";
		echo "<div class='procart'><input type='submit' name='submit' value='Update' class='btn btn-success' />  <a class='btn btn-warning' href='delcart.php?item=0'>Delete Cart</a>  <a class='btn btn-primary' href='index.php'>Buy Continue</a></div>";

		echo "</form>";
		echo "</div>";
	} else {
		echo "<div class='cart'><p align='center'>You have not any product. Please  <a href='index.php'>BUY</a> </p></div>";
	}
?>
</div>
</body>
</html>