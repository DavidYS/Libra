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
			<header>
			<ul>
				<li><a href="/">Libra</a></li>
				<li><a href="/">Home</a></li>
				<li><a href="/">Books</a></li>
				<?php
					if( isset($_SESSION['user_id'])) { ?>
				<li><a href='/'>Become an Admin</a></li>
				<li><a href='logout.php'>Log Out</a></li>
				<?php } else { ?>
				<li><a href="/"></a>Login</li>
				<li><a href="/"></a>Register</li>
				<?php } ?>
			</ul>
		</header>
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
		<div style='height:2000px'>
		</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src='js/functions.js'></script>
	</body>
</html>