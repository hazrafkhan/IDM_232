<?php require_once 'includes/initialize.php'; ?>
<?php
  // Get the `id` from the URL parameter.
  $id = isset($_GET['id']) ? $_GET['id'] : null;

  // If no parameter is provided, redirect to the home page.
  if (!$id) redirect_to('index.html');
  else {
    // Parameter is provided.
    // Look for a matching ID in the database.
    $query = 'SELECT * ';
    $query .= 'FROM courses ';
    $query .= "WHERE id = '{$id}' ";
    $query .= 'LIMIT 1';

    $result = mysqli_query($connection, $query);

    if (!$result) {
      die('Database query failed.');
    }

  }
?>

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
				<li><a href="portfolio.php">PORTFOLIO</a></li>
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

	<!-- Portfolio Details -->
	<div id="portfolio_1" class="nav_shift"></div>

	<?php
      while ($course = mysqli_fetch_assoc($result)) {
    ?>

	<div class="full_width back_white">
		<div class="wrapper">

			<div class="wrap_half full_width img_align">
				<img class="portfolio_img" src="<?php echo $course['courseImageLarge']; ?>" alt="<?php echo $course['courseTitle']; ?>">
			</div>

			<div class="wrap_half">
				<div class="title"> <!-- Section title -->
					<h2><?php echo $course['courseTitle']; ?></h2>
				</div>
				<div class="info_icon">
					<ul>
						<li class="date_icon"><p><?php echo $course['courseDate']; ?></p></li>
						<li class="ctg_icon"><p><?php echo $course['courseCategory']; ?></p></li>
					</ul>
				</div>
				<div class="underline"></div>
				<p class="portfolio_text"><?php echo $course['courseDetails']; ?>
				</p>
			</div>

		</div>
	</div>

	<?php
	  $grabCategory = $course['courseCategory'];
      } // end while
      mysqli_free_result($result);
    ?>

	<div class="underline_3">
		<div class="underline_3_1"></div>
	</div>


	<!-- Other Portfolio -->

	<?php
    // Look for a matching ID in the database.
    $query = 'SELECT * ';
    $query .= 'FROM courses ';
    $query .= "WHERE courseCategory = '{$grabCategory}' ";
    $query .= 'LIMIT 3';

    $result = mysqli_query($connection, $query);

    if (!$result) {
      die('Database query failed.');
    }
    
    ?>

	<div class="full_width back_white">
		<div class="wrapper">

			<div class="title"> <!-- Section title -->
				<h2>Related portfolio.</h2>
				<div class="underline"></div>
			</div>

			<div class="wrapper_boxs">

				<?php
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
	
				<div class="boxs_viewport">
					<a href="portfolio.php">
						view all
					</a>
				</div>

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