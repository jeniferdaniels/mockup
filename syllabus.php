<?PHP include_once 'mockupFunctions.php' ?>
<?PHP 
	$hId = (isset($_GET['hId'])? $_GET['hId']: "i");
	$pageTitle = "Syllabus";

	
	$boxes = array (
		array(
			"title" => "Course Readings",
			"boxId" => "readings",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "", 
			"content" => "contentHere.php"),
		array(
			"title" => "Course Description",
			"boxId" => "description",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php"),
		array(
			"title" => "Course Goals and objectives",
			"boxId" => "goals",
			"isCollapsed" => 0,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "goals.php"),
		array(
			"title" => "How the Course Works",
			"boxId" => "how",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php"),
		array(
			"title" => "Student Responsibilities",
			"boxId" => "student",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php"),
		array(
			"title" => "Grading Criteria",
			"boxId" => "grades",
			"isCollapsed" => 0,
			"isComplete" => 0,
			"urlInProgress" => "gradingCriteria.php",
			"content" => "grading.php"),
		array(
			"title" => "Course Policies",
			"boxId" => "coursePolicies",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php"),
		array(
			"title" => "University Policies",
			"boxId" => "univsersityPolicies",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php")
		);
	
	$showModuleProgress = 0;
	$showPrevNext = 0;
	$hId = "s";
?>

<!doctype html>
<html>
	<head>
		<?php writeHead($pageTitle); ?>
	</head>
	
	<body>
		<?php writeTop($hId, $showModuleProgress, $showPrevNext); ?>
	
		<div class="contentWrapper">
			
			<h2 class="contentTitle"><?php echo $pageTitle ?></h2>

			<?php 
				for ($i=0; $i<count($boxes); $i++)
					writeToggleBox($boxes[$i]);
			?>
		</div>
	</body>
</html>
