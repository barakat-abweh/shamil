<!DOCTYPE HTML>
<!--
	Prism by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Help us</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
                <link rel="stylesheet" href="../styles/aboutus.css" />
                <link href="../styles/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <link rel="stylesheet" href="../styles/homenavbar.css"/>
                <link rel="stylesheet" href="../styles/Logo.css"/>
                <link rel="stylesheet" href="../styles/style_login.css">
                <link rel="stylesheet" type="text/css" href="../styles/sweetalert.css"/>


		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
  <?php
      require_once '../includes/session.php';
        if ($session->isLoggedIn()) {
            require_once './homenavbar.php';
        }
        else{
            require_once './loginnavbar.php';
        }
      ?>
		<!-- Banner -->
			<section id="banner">
				<div class="inner split">
					<section>
						<h2>Welcome to Shamil website </h2>
					</section>
					<section>
						<p style="color: white">A site specializing in selling homes and land, will be moved for review or for booking</p>
						<ul class="actions">
							<li><a href="index.php" class="button special btn btn-success">Get started</a></li>
						</ul>
					</section>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner split">
					<section>
						<h2>Shamil Website :</h2>
						<p>An integrated site to display real estate in terms of houses and land, this site includes the seller who publishes what he has for sale, and the buyer reviews what the sellers published.
                        The buyer can recieve what he wants, and the seller will receive notice of the reservation, so we have included in this site what was mentioned above.</p>
						<ul class="actions">
							<li><a href="index.php" class="button alt btn btn-success">Get started ?</a></li>
						</ul>
					</section>
					<section>
                        
						<ul class="checklist">
                            <li>1. Trust between Seller and Buyer</li>
							<li>2. Easy to browse</li>
							<li>3. Speed in search</li>
							<li>4. Includes for real estate (houses, land)</li>
                        </ul>
                         <ul class="contact">
							<li class="fa-facebook"><a href="#">facebook.com/untitled-tld</a></li>
							<li class="fa-envelope"><a href="#">information@untitled.tld</a></li>
							<li class="fa-home">1234 Somewhere Road Suite 9823<br/>Nashville, TN 00000-0000</li>
						</ul>
					</section>
				</div>
			</section>

		<!-- Two -->
	
		<!-- Contact -->
			
		<!-- Footer -->
			<footer id="footer">
				<div class="copyright">
					&copy; SHAMIL. All rights reserved.
				</div>
			</footer>
                     <script src="../scripts/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../scripts/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../scripts/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../scripts/plugins.js"></script>
    <script src="../scripts/classy-nav.min.js"></script>
    <script src="../scripts/jquery-ui.min.js"></script>
    <!-- Active js -->
    <script src="../scripts/sweetalert.min.js"></script>
    <script src="../scripts/signin.js"></script>
     <script src="../scripts/profilesallerpage.js"></script>
	</body>
</html>