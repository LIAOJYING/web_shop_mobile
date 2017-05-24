<?php 
	include 'db.php';

	$sql = "SELECT * FROM products";
	$result = $conn->query($sql);

	if(isset($_GET['delete'])){
		$delete=$_GET['delete'];
		$sql_delete="DELETE FROM products WHERE id=:id";
		$result_delete=$conn->prepare($sql_delete);
		$result_delete->bindParam(':id',$delete);
		$result_delete->execute();
		header('Location:index.php');
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Signin Template for Bootstrap</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/ass/css/nav.css">
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
		<table border=1 class='table table-striped '>
			<thead>
		      <tr>
		      	<th>ID</th>
		        <th>Tên Sản Phảm</th>
		        <th>Giá</th>
		        <th>Summary</th>
		        <th>Ảnh</th>
		        <th>ADMIN</th>
		      </tr>
		    </thead>
		    <?php
				foreach ($result as $row) {
			?>
			<tr>
				<td><?php echo $row['id'] ?></td>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo $row['price'] ?></td>
				<td><?php echo $row['summary'] ?></td>
				<td><img src="../public/upload/product/<?php echo $row['image'] ?>" width=100px/></td>
				<td>
					<a href="update.php?update=<?php echo $row['id'];?>"><button class="btn btn-primary" value="Sửa">Sửa</button></a>
					<a href="?delete=<?php echo $row['id']?>"><button class="btn btn-danger">Xóa</button></a>
				</td>
				
			</tr>
				<?php	
		}
	 	?>
	 	</table>
</body>
</html>
