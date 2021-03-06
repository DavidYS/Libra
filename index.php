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
					<a class="navbar-brand" href="index.php">
						<img alt="Brand" src="assets/images/brand.jpg">
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Find Books <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="library.php">Poetry</a></li>
									<li><a href="library.php">Short Story</a></li>
									<li><a href="library.php">Novel</a></li>
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
<hr>
					<div class="bg">
						<div class="logo"></div>
					</div>
	<hr>
					<section class='log'>
						<?php if( isset($_SESSION['user_id']) ) { ?>
							<br /><h3>Welcome <?= $user['email']; ?></h3>
							<br /><p>You are successfully logged in!</p>
							<br /><a href="logout.php">Logout?</a>

					



								<?php } else { ?>
									<h1>Please Login or Register</h1>
									<a href="login.php">Login</a> or
									<a href="register.php">Register</a>
									<?php } ?>

								<p class='promo'>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer varius magna ac lectus viverra pulvinar. Nulla lobortis nibh elementum, pulvinar nisl vitae, pretium erat. Curabitur luctus nulla enim, cursus pellentesque leo vehicula eget. Ut id sodales nunc, in placerat turpis. Ut gravida est in erat viverra, ut pharetra elit viverra. Proin suscipit rutrum felis id efficitur. Sed laoreet ligula nec mauris placerat, nec consectetur mi lobortis. Etiam elementum ultricies aliquet. Proin at varius nunc. Suspendisse non erat lacus. Aliquam ut auctor magna, id venenatis metus. Sed molestie ultrices tincidunt. Aenean fermentum ligula ac luctus consequat. Suspendisse porttitor ipsum at auctor posuere. Mauris at sem id magna sodales fermentum.</p>

								</section>
						        <hr>
        <div class="blog-posts row">
          <div class="post-1 col-xs-4">
            <h5>Poetry</h5><img src="assets/images/books.jpg">
            <p>Incididunt ut labore et dolore magna.</p>
            <p><a href="library.php">Read More</a></p>
          </div>
          <div class="col-xs-4 post-2">
            <h5>Short Story</h5><img src="assets/images/books.jpg">
            <p>Lorem ipsum dolor sit amet.</p>
            <p><a href="library.php">Read More</a></p>
          </div>
          <div class="col-xs-4 post-3">
            <h5>Drama</h5><img src="assets/images/books.jpg">
            <p>Duis aute irure dolor in reprehenderit.</p>
            <p><a href="library.php">Read More</a></p>
          </div>
        </div>
        <Hr>
	<p class='promo'>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer varius magna ac lectus viverra pulvinar. Nulla lobortis nibh elementum, pulvinar nisl vitae, pretium erat. Curabitur luctus nulla enim, cursus pellentesque leo vehicula eget. Ut id sodales nunc, in placerat turpis. Ut gravida est in erat viverra, ut pharetra elit viverra. Proin suscipit rutrum felis id efficitur. Sed laoreet ligula nec mauris placerat, nec consectetur mi lobortis. Etiam elementum ultricies aliquet. Proin at varius nunc. Suspendisse non erat lacus. Aliquam ut auctor magna, id venenatis metus. Sed molestie ultrices tincidunt. Aenean fermentum ligula ac luctus consequat. Suspendisse porttitor ipsum at auctor posuere. Mauris at sem id magna sodales fermentum.</p>
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
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
							<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
							<script src='js/functions.js'></script>
						</body>
						</html>