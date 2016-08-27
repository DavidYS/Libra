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

	<header>
		<ul>
		<li><a href="/">Libra</a></li>
		<li><a href="/"></a></li>
		<li><a href="/"></a></li>
		<li><a href="/"></a></li>
		<li><a href="/"></a></li>
		</ul>
	<header>
    <div class="bg">
	  <div class="logo"></div>
	</div>


		<?php if( !empty($user) ): ?>

		<br />Welcome <?= $user['email']; ?>
		<br /><br />You are successfully logged in!
		<br /><br />
		<a href="logout.php">Logout?</a>
		<?php else: ?>
		<h1>Please Login or Register</h1>
		<a href="login.php">Login</a> or
		<a href="register.php">Register</a>


	<?php endif; ?>


		<div style='height:2000px'>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src='js/functions.js'></script>
		<script src='js/verify.js'></script>

	</body>
</html>

