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
</head>
  <body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Shop online</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="form-insert.php">Form Insert</a></li>
      <li><a href="login-form.php">Login</a></li>
      <li><a href="form-signup.php">Signup</a></li>
    </ul>
  </div>
</nav>
  		<div class="wrapper">
	    <form class="form-signin" method="POST" action="sigup.php">       
	      <h2 class="form-signin-heading">Đăng ký</h2>
	      <input type="text" class="form-control" name="username" placeholder="username"  autofocus="" />
	      <input type="password" class="form-control" name="password" placeholder="Password" /><br>
	      <input type="submit" name="" class="btn btn-default" value="Signup">   
	    </form>

	  </div>
  </body>
</html>
