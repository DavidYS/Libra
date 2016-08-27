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
							<li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
							<li class="dropdown active" >
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Find Books <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="library.php">Action</a></li>
									<li><a href="library.php">Adventure</a></li>
									<li><a href="library.php">Comedy</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="library.php">Biography</a></li>
								</ul>
							</li>
						</ul> 

						<?php if(!isset($_SESSION['user_id'])) { ?>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="login.php">Login</a></li>
								<li><a href="register.php">Register</a></li>
							</ul>
							<?php } else { ?>
								<ul class='nav navbar-nav navbar-left'>
									<li><a href='#'>Become an Admin</a></li>
								</ul>
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
					<hr>
				

					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
					<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				</body>
				</html>