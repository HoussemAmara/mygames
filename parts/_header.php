<?php
	if (isset($_SESSION['username'])) { 
		// User is logged in, show their username in the navigation bar
		$username = $_SESSION['username'];
	}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8" />
	<meta name="description" content="Anime Template" />
	<meta name="keywords" content="Anime, unica, creative, html" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>MyGames</title>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>

	<!-- Css Styles -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
	<link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/plyr.css" type="text/css" />
	<link rel="stylesheet" href="css/nice-select.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
	<link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

    <!-- Header Section Begin -->
    <header class="header">
      	<div class="container">
        	<div class="row">
				<div class="col-lg-2">
					<div class="header__logo">
						<a href="./">
							<img class="logo-img" src="img/logo5.png" alt=""/>
						</a>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="header__nav">
						<nav class="header__menu mobile-menu">
							<ul>
								<li class="active"><a href="./">Home</a></li>
								<li><a href="./contact.php">Contacts</a></li>
								<li>
									<a>
										<span class="icon_profile"></span>
										<?php if(isset($username)){echo $username;} ?>
										<span class="arrow_carrot-down">
									</a>
									<ul class="dropdown">
										<?php if (isset($username)) { ?>
											<li><a href="./logout.php">Logout</a></li>
										<?php } else { ?>
											<li><a href="./signup.php">Sign Up</a></li>
											<li><a href="./login.php">Login</a></li>
										<?php } ?>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
        	<div id="mobile-menu-wrap"></div>
		</div>
    </header>
    <!-- Header End -->