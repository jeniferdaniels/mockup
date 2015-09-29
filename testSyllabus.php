<?PHP include_once 'iconVariables.php' ?>
<?PHP include_once 'mockupFunctions.php' ?>
<?PHP 
	$css = (isset($_GET['css'])? $_GET['css']: "oduColors.css");	
	$page = (isset($_GET['iFramePage'])? $_GET['iFramePage']: "testTags.php");	
	$pageTitle = "Syllabus";
	
	$boxes = array (
		array(
			"title" => "Course Readings",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "", 
			"content" => ""),
		array(
			"title" => "Course Description",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => ""),
		array(
			"title" => "Course Goals and objectives",
			"isCollapsed" => 0,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "goals.php"),
		array(
			"title" => "How the Course Works",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => ""),
		array(
			"title" => "Student Responsibilities",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => ""),
		array(
			"title" => "Grading Criteria",
			"isCollapsed" => 0,
			"isComplete" => 0,
			"urlInProgress" => "gradingCriteria.php",
			"content" => "grading.php"),
		array(
			"title" => "Course Policies",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => ""),
		array(
			"title" => "University Policies",
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
		
			<?php 
				for ($i=0; $i<count($boxes); $i++)
					writeToggleBox($boxes[$i]["title"], $boxes[$i]["content"], $boxes[$i]["isCollapsed"], $boxes[$i]["isComplete"], $css);
			?>
		</div>
	</body>
</html>
