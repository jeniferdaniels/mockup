<!doctype html>
<?PHP 
	$css = (isset($_GET['css'])? $_GET['css']: "oduColors.css");	
	$page = (isset($_GET['iFramePage'])? $_GET['iFramePage']: "testTags.php");	
?>
<?PHP include 'iconVariables.php' ?>
<html>
	<head>
		<title>Test</title>

		<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?PHP echo $css ?>">
	
		<!--fonts from Adobe Typekit -->
		<script src="https://use.typekit.net/scm3ciw.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>

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
	
video
		
	</body>
</html>
