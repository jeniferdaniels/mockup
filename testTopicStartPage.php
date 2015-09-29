<?PHP include_once 'iconVariables.php' ?>
<?PHP include_once 'mockupFunctions.php' ?>

<?PHP
	$css = (isset($_GET['css'])? $_GET['css']: "oduColors.css");	
	$page = (isset($_GET['iFramePage'])? $_GET['iFramePage']: "testTags.php");	
	$pageTitle = "1.2 Course Introduction and Statistical Equilibrium";

	$nav = array(
		"prevUrl" 	=> 'testHome.php?css='. $css,		
		"nextUrl" 	=> 'testTextContent.php?css=' . $css
	);

	$breadCrumbs = array (
		array ("url" => "testHome.php?css=". $css, "title" => 'Home'),
		array ("url" => "testHome.php?css=". $css, "title" => "1. Fundamental Principles"),
		array ("url" => "", "title" => $pageTitle)
		
	);
	
	
	$showModuleProgress = 1;
?>

<!doctype html>
<html>
	<head>
		<?php writeHead('Test Text Content', $css); ?>
	</head>
	
	<body>
		<?php writeTop($nav, 'MET 320 - Design of Machine Elements', $breadCrumbs, $showModuleProgress,$css); ?>
		<?php writeCssChanger('testTextContent.php', $css); ?>

			

	
		<div class="contentWrapper">
			
			<h2 class="contentTitle"><?php echo $pageTitle ?></h2>
			<br>
			<p>In this topic you will learn about:</p>
				<ul class="moduleContentList someOtherList">
					<li><a href="testTextContent.php?css=<?php echo $css ?>">1.2.1 Introduction to Design of Machine Elements </a><mark>Working</mark></li>
					<li><a href="testVideoContent.php?css=<?php echo $css ?>">1.2.2 Defining Engineering and the Design Process </a><mark>Working</mark></li>
					<li><a href="#">1.2.3 Stages of Design</a></li>
					<li><a href="#">1.2.4 Utilizing Machine Design Information and Standards</a></li>
					<li><a href="#">1.2.5 Computational Tools</a></li>
					<li><a href="#">1.2.6 Defining Statistical Equilbrium</a></li>
				</ul>
			
		<br><br>
		<mark>Because this is a topic header page, it would normally not contain content. The content above would be generated</mark>	

			
		</div>
	
	
		
		
	</body>
</html>

