<?php require_once 'includes/initialize.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, width=device-width" />
	<title>Hazraf Khan Resume Site</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto:700" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>

	<!-- Hamburger Menu -->
	<nav>
		<div id="menuToggle">

			<input type="checkbox" />

			<span></span>
			<span></span>
			<span></span>

			<ul id="menu">
				<li><a href="index.html">HOME</a></li>
				<li><a href="#nav_select">PORTFOLIO</a></li>
			</ul>
		</div>
	</nav>

	<!-- Background picture (static) -->
	<picture>
		<source media="(min-width: 960px)"
		sizes="100vh"
		class="back_img" 
		srcset="image/com_back_l.jpg 960w">

		<source media="(min-width: 666px)"
		sizes="100vh"
		class="back_img" 
		srcset="image/com_back_m.jpg 666w">

		<img src="image/com_back_s.jpg" alt="coffee cup and pencil"
		sizes="100vw"
		class="back_img" 
		srcset="image/com_back_s.jpg 320w">
	</picture>

	<!-- Navigation Bar -->
	<div class="logo_img"> 
		<a href="index.html"><img src="image/logo.png" alt="hazraf khan logo"></a>
	</div>
	<div class="bar_gap"></div>
	<nav class="nav_bar_page">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="portfolio.php">Portfolio</a></li>
		</ul>
	</nav>

	<!-- Background picture for portfolio page -->
	<div class="hidden_page">
		<picture>
			<source media="(min-width: 960px)"
			sizes="100vh"
			class="home_img" 
			srcset="image/port_l.jpg 960w">

			<source media="(min-width: 666px)"
			sizes="100vh"
			class="home_img" 
			srcset="image/port_m.jpg 666w">

			<img src="image/port_m.jpg" alt="mountain background"
			sizes="100vh"
			class="home_img" 
			srcset="image/port_m.jpg 320w">
		</picture>
	</div>

	<!-- Text for portfolio page -->
	<div class="home_page">
		<div class="title_box">
			<h1>Welcome to My Portfolio Page</h1>
			<div class="underline_2"></div>
			<p>Discover all my previous works and projects</p>
			<a href="#nav_select">View Portfolio</a>
		</div>
	</div>

	<!-- Portfolio Category Selection -->
	<div id="nav_select" class="nav_shift"></div>
	<nav class="nav_select_menu">
		<ul>
			<li><a href="#">Logo Design</a></li>
			<li><a href="#">Graphic Design</a></li>
			<li><a href="#">Engineering</a></li>
			<li><a href="#">Misc</a></li>
		</ul>
	</nav>
	<div class="underline_3">
		<div class="underline_3_1"></div>
	</div>

	<!-- Portfolio Section -->
	<div class="full_width back_white">
		<div class="wrapper portfolio_padding">

			<div class="wrapper_boxs">

				<?php
				$query = 'SELECT * ';
				$query .= 'FROM courses ';
				$query .= 'ORDER BY id ASC';

				$result = mysqli_query($connection, $query);

				if (!$result) {
					die('Database query failed.');
				}

				while ($course = mysqli_fetch_assoc($result)) {
					if ($course['courseVisible'] == 1) {
				?>

				<div class="boxs_port">
					<a href="portfolio_page.php?id=<?php echo $course['id']; ?>">
						<img src="<?php echo $course['courseImageSmall']; ?>" alt="<?php echo $course['courseTitle']; ?>">
						<div class="text_wrap_port">
							<p><?php echo $course['courseTitle']; ?></p>
						</div>
					</a>
				</div>

				<?php
        		  } // end if
       			 } // end while
       	 		mysqli_free_result($result);
        		?>

				
			</div>

		</div>
	</div>

	<!-- second gap section -->
	<div class="section_gap gap3">
		<p>Want to know how I can help you?</p>
		<a href="index.html"> Contact Me</a>
	</div>


	<!-- Footer section -->
	<div class="full_width back_white">
		<div class="wrapper">

			<div class="wrap_half">
				<div class="foot_wrap">
					<div class="resume blackblue">
						<form action="downloads/resume.pdf" target="blank">
							<button type="submit">Download my Latest Resume</button>
						</form>
					</div>
					<p>&copy; 2017 by M. Hazraf Khan</p>
				</div>
			</div>

			<div class="wrap_half">
				<nav class="social">
					<a href="https://www.facebook.com/mohammad.h.khan.5" target="blank"><img src="image/fb-icon.png" alt="fb logo"></a>
					<a href="https://www.instagram.com/hazrafkhan/" target="blank"><img src="image/ig-icon.png" alt="instagram logo"></a>
					<a href="https://www.linkedin.com/in/hazrafkhan" target="blank"><img src="image/li-icon.png" alt="linkedin logo"></a>
				</nav>
			</div>
		</div>
	</div>

	<!-- Smooth Scrolling Java Script-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="scripts/scripts.js"></script>
	<!-- Smooth Scrolling Ends-->

</body>
</html>