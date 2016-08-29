<?php
session_start();
if( isset($_SESSION['user_id']) ){
	header("Location: index.php");
}
require 'database.php';
if(!empty($_POST['email']) && !empty($_POST['password'])):
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
$records->bindParam(':email', $_POST['email']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
$message = '';

if($_POST['password'] == $results['password'] ){
  $_SESSION['user_id'] = $results['id'];
  header("Location: index.php");
} else {
  $message = 'Sorry, those credentials do not match';
}
endif;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Libra | Login</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class='container-fluid'>
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
              <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
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
                <li class='active'><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
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
                </ul>  <?php } ?>
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
        <h1>Login</h1>
        <span>or <a href="register.php">register here</a></span>

        <form action="login.php" method="POST">

          <input type="text" placeholder="Enter your email" name="email"><br>
          <input type="password" placeholder="Enter your password" name="password"><br>

          <input type="submit">

        </form>
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

    </body>
    </html>

