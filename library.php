
<?php
session_start();
require 'database.php';
if( isset($_SESSION['user_id']) ){


	class TableRows  {
		public $Id, $Author, $Title, $Genre, $Display;
		public function __construct(){
			$this->Display = '<tr><td>'.$this->Author.'</td><td>'.$this->Title.'</td><td>'.$this->Genre.'</td></tr>';


		}
	}
	$stmt = $conn->query("SELECT Author, Title, Genre FROM Books");
	$stmt->setFetchMode(PDO::FETCH_CLASS, 'TableRows');	
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
					<h3> <?php if(!isset($_SESSION['user_id'])) { ?> 
						<a href='login.php'>Sign In.</a> Read or Buy the newest books.</h3>
						<p class='promo'>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer varius magna ac lectus viverra pulvinar. Nulla lobortis nibh elementum, pulvinar nisl vitae, pretium erat. Curabitur luctus nulla enim, cursus pellentesque leo vehicula eget. Ut id sodales nunc, in placerat turpis. Ut gravida est in erat viverra, ut pharetra elit viverra. Proin suscipit rutrum felis id efficitur. Sed laoreet ligula nec mauris placerat, nec consectetur mi lobortis. Etiam elementum ultricies aliquet. Proin at varius nunc. Suspendisse non erat lacus. Aliquam ut auctor magna, id venenatis metus. Sed molestie ultrices tincidunt. Aenean fermentum ligula ac luctus consequat. Suspendisse porttitor ipsum at auctor posuere. Mauris at sem id magna sodales fermentum.</p>
							<?php } else { ?>
								<?php if(!empty($message)){ ?>
									<p><?= $message ?></p>
									<?php } ?>

									<h3>Welcome <?= $user['email']; ?></h3>
									<form method='POST' action='library.php'>
										<input type='text' name='bookFinder' placeholder='Books, Authors, Genre'>
										<input type='submit' class='btn btn-success'>

										<p class='promo'>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer varius magna ac lectus viverra pulvinar. Nulla lobortis nibh elementum, pulvinar nisl vitae, pretium erat. Curabitur luctus nulla enim, cursus pellentesque leo vehicula eget. Ut id sodales nunc, in placerat turpis. Ut gravida est in erat viverra, ut pharetra elit viverra. Proin suscipit rutrum felis id efficitur. Sed laoreet ligula nec mauris placerat, nec consectetur mi lobortis. Etiam elementum ultricies aliquet. Proin at varius nunc. Suspendisse non erat lacus. Aliquam ut auctor magna, id venenatis metus. Sed molestie ultrices tincidunt. Aenean fermentum ligula ac luctus consequat. Suspendisse porttitor ipsum at auctor posuere. Mauris at sem id magna sodales fermentum.</p>

											<h3>Read from your Device</h3>
											<div class='table-responsive container'>
												<table class='table table-striped table-hovered'>
											<tr><th>BookID</th><th>Author</th><th>Title</th></tr>
												
												<?php 	
												
											while($result = $stmt->fetch()){
													print($result->Display);
												}
								
												?>
												</table>
											</div>
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

														<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
														<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
													</body>
													</html>