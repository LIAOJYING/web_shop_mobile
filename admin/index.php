<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>
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
		            <a class="navbar-brand" href="../index.php"><i class="glyphicon glyphicon-phone"></i> Thế giới di động</a>
		        </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
			</div><!-- /.container-fluid -->
	    </nav>
  		<div class="container">
		    <form class="form-signin" method="POST" action="login.php">       
		      <h2 class="form-signin-heading">Login</h2>
		      <input type="text" class="form-control" name="username" placeholder="User Name"  autofocus="" id="user" />
		      <input type="text" class="form-control" name="password" placeholder="Your Password" id="pass" />
		      <input type="submit" name="login" class="btn btn-lg btn-primary btn-block" value="LOGIN">   
		    </form>
	  </div>
  </body>
</html>
<?php
	if (isset($_COOKIE['user'])) {
		$user = $_COOKIE['user'];
		$pass = $_COOKIE['pass'];

		echo "<script>document.getElementById('user').value='$user';
			document.getElementById('pass').value='$pass';
		</script>";
	}
?>
