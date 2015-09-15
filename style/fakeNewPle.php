<!doctype html>
<?PHP 

	if (isset($_GET['css']))
		$css = $_GET['css'];
	else
		$css = "oduColors.css";		
?>
<?PHP include 'iconVariables.php' ?>
<html>
	<head>
		<title>Test</title>

		<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?PHP echo $css ?>">
	</head>
	
	<body>
	
		<header>
			<?php echo $iconHamburgerMenu ?>
			<div class="oduIcon">ODU ICON</div>
			<h1 class="courseTitle">MET 320 - Design of Machine Elements</h1>
			search
			<?php echo $iconNotification ?>
			<?php echo $iconUser ?>
		</header>
		
		<ul class="breadCrumbs">
			<li><a href="#">Home</a></li>
			<li><a href="#">2. Fundamental Principles</a></li>
			<li><a href="#">2.2 Course Introduction and Statistical Equilibrium</a></li>
			<li>2.2.1 Introduction to Design of Machine Elements</li>
		</ul>
	
		<div class="moduleProgress"><progress value="30" max="100"></progress></div>
	
		<div class="contentWrapper">
			<h2>Introduction to Design of Machine Elements</h2>
		
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est.</p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est.</p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est.</p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est.</p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est.</p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est.</p>
		
		</div>
		
	</body>
</html>

