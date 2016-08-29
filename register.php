<?php
session_start();
if( isset($_SESSION['user_id']) ){
	header("Location: index.php");
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
       <a class="navbar-brand" href="index.php">
        <img alt="Brand" src="assets/images/brand.jpg">
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
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
        <li class='active'><a href="register.php">Register</a></li>
      </ul>
      <?php } else { ?>
      	<ul class='nav navbar-nav navbar-left'>
									<li><a href='#'>Become an Admin</a></li>
								</ul>
      <ul class='nav navbar-nav navbar-right'>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $user['email']; ?> <span class="caret"></span></a>
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

		<section class='log'>
		<?php if(!empty($message)): ?>
		<p><?= $message ?></p>

		<?php endif; ?>
		</section>
		<?php if(!isset($_SESSION['user_id'])) { ?>
		<h1>Register</h1>
		<span>or <a href="login.php">login here</a></span>
		<form action="register.php" method="POST" class='form-group'>

		<input type="text" placeholder="Enter your email" name="email"><span id='email'></span><br>
		<input type="password" placeholder="Enter your password" name="password"><span id = 'pass'></span><br>
		<input type="password" placeholder="Repeat your password" name="cpassword"><span id='cpass'></span><br>
		<input type="submit">
	
	</form>
		<?php } ?>
		 <footer>
      <div class="row footer-stuff">
        <div class="col-xs-3"><strong>FIND US ON</strong>
          <ul>
            <li><a href="">Twitter</a></li>
            <li><a href="">Facebook</a></li>
            <li><a href="">Pinterest</a></li>
            <li><a href="">Instagram</a></li>
          </ul>
        </div>
        <div class="col-xs-3"><strong>OTHER SITES</strong>
          <ul>
            <li><a href="">Wikipedia</a></li>
            <li><a href="">Scribd</a></li>
          	
          </ul>
        </div>
        <div class="columns six">
          <p>

		<?php if(!isset($_SESSION['user_id'])){ ?>
          <strong><a href='register.php'> Sign Up </a> for the newsletter</strong> 
         <?php } else { ?>
         	Welcome <?php $_SESSION['user_id'] ?>.
         <?php } ?>


          Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
      </div>
    </footer>


		</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src='js/functions.js'></script>
		<script src='js/verify.js'></script>
	</body>
</html>

