<?php
session_start();
if( isset($_SESSION['user_id']) ){
	header("Location: /");
}
require 'database.php';
if(!empty($_POST['email']) && !empty($_POST['password'])):
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$message = '';
	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
		$_SESSION['user_id'] = $results['id'];
		header("Location: /");
	} else {
		$message = 'Sorry, those credentials do not match';
	}
endif;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Libra | Login</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	</head>
	<body>
	<div class='container-fluid'>
		<header>
			<ul>
				<li><a href="/">Libra</a></li>
				<li><a href="/"></a></li>
				<li><a href="/"></a></li>
				<li><a href="/"></a></li>
				<li><a href="/"></a></li>
			</ul>
		</header>
		<div class="bg">
			<div class="logo"></div>
		</div>
		<?php if(!empty($message)): ?>
		<p><?= $message ?></p>

	<?php endif; ?>

	<h1>Login</h1>
	<span>or <a href="register.php">register here</a></span>

	<form action="login.php" method="POST">

		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="Enter your password" name="password">

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
		<h1>Login</h1>
		<span>or <a href="register.php">register here</a></span>
		<form action="login.php" method="POST">
			<input type="text" placeholder="Enter your email" name="email">
			<input type="password" placeholder="and password" name="password">
			<input type="submit">
		</form>
		<div style='height:2000px'>
		</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src='js/functions.js'></script>
	</body>
</html>

