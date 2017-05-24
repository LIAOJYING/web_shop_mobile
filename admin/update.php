<?php 
	include 'db.php';

	if (isset($_GET['update'])) {
		$update=$_GET['update'];
		$sql="SELECT * FROM products WHERE id='$update'";
		$result=$conn->query($sql);
		extract($result->fetch());
	}

	if (isset($_POST['btn_update'])) {
		$name=$_POST['name'];
		$price=$_POST['price'];
		$summary=$_POST['summary'];

		$imgName=$_FILES['image']['name'];
		$imgFrom=$_FILES['image']['tmp_name'];

		if (!empty($imgName)) {
			$imgTo="../public/upload/product/";

			move_uploaded_file($imgFrom, $imgTo.$imgName);
		}
		else{
			$imgName=$image;
		}

		$sql_update="UPDATE products SET name=:name, price=:price, summary=:summary, image=:image WHERE id=:id";

		$result_update=$conn->prepare($sql_update);

		$result_update->bindParam(":id",$update);
		$result_update->bindParam(":name",$name);
		$result_update->bindParam(":price",$price);
		$result_update->bindParam(":summary",$summary);
		$result_update->bindParam(":image",$imgName);

		if ($result_update->execute()) {
			//echo "cap nhat thanh cong";
			header('Location:index.php');
		}
		else{
			echo "Cap nhat loi";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>UPDATE SAN PHAM</title>
	<meta charset="utf-8">
    <title>Signin Template for Bootstrap</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/ass/css/form-insert.css">
</head>
<body>
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
				<a class="navbar-brand" href="index.php."><i class="glyphicon glyphicon-phone"></i>ADMIN</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="form-insert.php"><i class="glyphicon glyphicon-shopping-cart"></i>INSERT</a>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
    </nav>
	<div class="container">
		    <form name="update-form" class="form-signin" method="POST" enctype="multipart/form-data">       
		      <h2 class="form-signin-heading">UPDATE PRODUCT</h2>
		      <input type="text" class="form-control" name="name"  value="<?php echo "$name";?>" />
		      <input type="text" class="form-control" name="price" value="<?php echo "$price";?>" />
		      <input type="text" class="form-control" name="summary" value="<?php echo "$summary";?>"/>
		      <td><img src="/ass/public/upload/product/<?php echo $image ?>" width=100px/></td>
		      <input type="file" class="form-control" name="image"/>
		      <input type="submit" name="btn_update" class="btn btn-lg btn-primary btn-block" value="UPDATE">   
		    </form>
	 </div>
</body>
</html>