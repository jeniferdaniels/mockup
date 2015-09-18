<?PHP include_once 'iconVariables.php' ?>
<?PHP include_once 'mockupFunctions.php' ?>
<?PHP 
	$css = (isset($_GET['css'])? $_GET['css']: "oduColors.css");	
	$page = (isset($_GET['iFramePage'])? $_GET['iFramePage']: "testTags.php");	

	$icons = array (
		"prev" 			=> $iconNavPrevious,
		"next" 			=> $iconNavNext,
		"menu" 			=> $iconHamburgerMenu,
		"notification" 	=> $iconNotification,
		"user" 			=> $iconUser			
	);

	$nav = ""; 
	$breadCrumbs = "";
	
	$boxes = array (
		array(
			"title" => "1. Overview",
			"isCollapsed" => 1,
			"isComplete" => 1,
			"urlInProgress" => ""),
		array(
			"title" => "2. Fundamental Principles",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => ""),
		array(
			"title" => "3. Bending of Beams",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "something.php"),
		array(
			"title" => "4. Shearing Stress",
			"isCollapsed" => 1,
			"isComplete" => 1,
			"urlInProgress" => ""),
		array(
			"title" => "5. Stress in Any Given Direction",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => ""),
		array(
			"title" => "6. Design for Cyclic Loading",
			"isCollapsed" => 1,
			"isComplete" => 1,
			"urlInProgress" => ""),
		array(
			"title" => "7. Design of Shafts",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "")
		);
			
?>

<!doctype html>
<html>
	<head>
		<?php writeHead('Test Text Content', $css); ?>
	</head>
	
	<body>
		<?php writeTop($icons, $nav, 'MET 320 - Design of Machine Elements', $breadCrumbs); ?>
		<?php writeCourseInfoMenu() ?>
		
		
		<div class="contentWrapper">
		<a href="testTextContent.php?css=<?php echo $css ?>">DummyLink To text</a>
			<?php 
				for ($i=0; $i<count($boxes); $i++)
					writeBox($boxes[$i]["title"], $boxes[$i]["isCollapsed"], $boxes[$i]["isComplete"]);
			?>
		</div>
		
	</body>
</html>
