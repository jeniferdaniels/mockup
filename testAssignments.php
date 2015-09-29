<?PHP include_once 'iconVariables.php' ?>
<?PHP include_once 'mockupFunctions.php' ?>
<?PHP 
	$css = (isset($_GET['css'])? $_GET['css']: "oduColors.css");	
	$page = (isset($_GET['iFramePage'])? $_GET['iFramePage']: "testTags.php");	
	$pageTitle = "Assignments";
	
	$boxes = array (
		array(
			"title" => "0. Overview",
			"isCollapsed" => 1,
			"isComplete" => 1,
			"urlInProgress" => "", 
			"content" => ""),
		array(
			"title" => "1. Fundamental Principles",
			"isCollapsed" => 0,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "module1Assignments.php"),
		array(
			"title" => "2. Bending of Beams",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "something.php",
			"content" => ""),
		array(
			"title" => "3. Shearing Stress",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => ""),
		array(
			"title" => "4. Stress in Any Given Direction",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => ""),
		array(
			"title" => "5. Design for Cyclic Loading",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => ""),
		array(
			"title" => "6. Design of Shafts",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "")
		);
	
		$showModuleProgress	= false;
		
		$breadCrumbs = array (	
		array ("url" => "testHome.php?css=". $css, "title" => 'Home'),
		array ("url" => "somethingElse", "title" => $pageTitle)
	);
	
	
?>

<!doctype html>
<html>
	<head>
		<?php writeHead('Test Home', $css); ?>
	</head>
	
	<body>
		<?php writeTop("", 'MET 320 - Design of Machine Elements', $breadCrumbs, $showModuleProgress, $css); ?>
		
		<?php writeCssChanger('testHome.php', $css); ?>
		
		
		<div class="contentWrapper">
		<h2 class="contentTitle"><?php echo $pageTitle ?></h2>
		
			<?php 
				for ($i=0; $i<count($boxes); $i++)
					writeToggleBox($boxes[$i]["title"], $boxes[$i]["content"], $boxes[$i]["isCollapsed"], $boxes[$i]["isComplete"], $css);
			?>
		</div>
	</body>
</html>
