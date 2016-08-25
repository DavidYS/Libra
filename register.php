<?php
session_start();
if( isset($_SESSION['user_id']) ){
	header("Location: /");
}
require 'database.php';
$message = '';
if(!empty($_POST['email']) && !empty($_POST['password'])):
	// Enter the new user in the database
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', $_POST['password']);
	if( $stmt->execute() ):
		$message = 'Successfully created new user';
	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;
endif;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Libra | Register</title>
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
		<section id='log'>
		<?php if(!empty($message)): ?>
		<p><?= $message ?></p>

	<?php endif; ?>

	<h1>Register</h1>
	<span>or <a href="login.php">login here</a></span>

	<form action="register.php" method="POST">

		<input type="text" placeholder="Enter your email" name="email"><span id='email'></span>
		<input type="password" placeholder="Enter your password" name="password"><span id = 'pass'></span>
		<input type="password" placeholder="Repeat your password" name="cpassword"><span id='cpass'></span>
		<input type="submit">
	
	</form>
	<div style='height:2000px'>
	</div>
	<script src='js/jquery-2.1.3.min.js'></script>
	<script src='js/functions.js'></script>
	<script src='js/verify.js'></script>
</body>
</html>

		<?php endif; ?>
		</section>
		<?php if(!isset($_SESSION['user_id'])) { ?>
		<h1>Register</h1>
		<span>or <a href="login.php">login here</a></span>
		<form action="register.php" method="POST">
			<input type="text" placeholder="Enter your email" name="email">
			<input type="password" placeholder="and password" name="password">
			<input type="password" placeholder="confirm password" name="confirm_password">
			<input type="submit">
		</form>
		<?php } else { ?>
			<div class = 'welcome'>
				<h1>Welcome to Libra</h1>

		<?php } ?>
		<div style='height:2000px'>
		</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src='js/functions.js'></script>
	</body>
</html>

