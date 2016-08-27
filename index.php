<?php
session_start();
require 'database.php';
if( isset($_SESSION['user_id']) ){
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$user = NULL;
	if( count($results) > 0){
		$user = $results;
	}
}
?>
<!DOCTYPE html>
<html>

				<head>
					<title>Libra | Buy online</title>
					<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
					<link rel="stylesheet" type="text/css" href="assets/css/style.css">
					<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
				</head>
				<body>
					<div class='cointainer-fluid'>
				<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand" href="#">
        <img alt="Brand" src="assets/images/brand.jpg">
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Find Books <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Adventure</a></li>
            <li><a href="#">Comedy</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Biography</a></li>
          </ul>
        </li>
      </ul> 
      
 		<?php if(!isset($_SESSION['user_id'])) { ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      </ul>
      <?php } else { ?>
      	<ul class='nav navbar-nav navbar-right'>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Your Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li><a href="#">History</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
      <?php } ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
						
						<div class="bg">
							<div class="logo"></div>
						</div>
						<?php if( isset($_SESSION['user_id']) ) { ?>
						<br />Welcome <?= $user['email']; ?>
						<br /><br />You are successfully logged in!
						<br /><br />
						<a href="logout.php">Logout?</a>
						<?php } else { ?>
						<h1>Please Login or Register</h1>
						<a href="login.php">Login</a> or
						<a href="register.php">Register</a>
						<?php } ?>


					</div>
				</div>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
				<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<script src='js/functions.js'></script>
				<script src='js/verify.js'></script>
			</body>
		</html>