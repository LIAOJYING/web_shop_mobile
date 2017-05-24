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
	<link rel="stylesheet" type="text/css" href="/ass/css/form-insert.css">
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
		    <form class="form-signin" method="POST" action="insert.php" enctype="multipart/form-data">       
		      <h2 class="form-signin-heading">Thêm Sản Phẩm</h2>
		      <input type="text" class="form-control" name="name" placeholder="Product Name"  autofocus="" />
		      <input type="text" class="form-control" name="price" placeholder="price" />
		      <input type="text" class="form-control" name="summary" placeholder="summary" />
		      <input type="file" class="form-control" name="image"/>
		      <input type="submit" name="" class="btn btn-lg btn-primary btn-block" value="ADD">   
		    </form>
	  </div>
  </body>
</html>
