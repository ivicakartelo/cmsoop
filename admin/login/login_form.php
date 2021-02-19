<?php
include_once ("administrator.php");

	if (isset($_POST["submit"])) 
	{
		$username = $_POST["username"];
		$psw = $_POST["psw"];
	
		$admin = new Administrator();
		$admin->login($username, $psw);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Bootstrap 4 Website Example https://www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_template1 -->
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Blog</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="../../index.php">Home</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="admin/index.php">Admin</a>
      </li>  
    </ul>  
</nav>

<div class="container" style="margin-top:30px">
  
	<h2>Login</h2>
	<form action="login_form.php" method="post">
    <div class="form-group">
    <p><input type="text" class="form-control form-control-lg" name="username" placeholder="Enter username 'a'" /></p>
		<p><input type="password" class="form-control form-control-lg" name="psw" placeholder="Enter password 'a'" /></p>
    </div>
		<p><input type="submit" class="btn btn-primary" name="submit" value="Login"></p>
  </form>
      
</div><!-- container end -->

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>
</body>
</html>