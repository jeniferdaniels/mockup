<?PHP include_once 'mockupFunctions.php' ?>
<?PHP 
	$pageTitle = "Assignments";
	$hId = "a";
	
	$boxes = array (
		array(
			"title" => "0. Overview",
			"boxId" => "overview",
			"isCollapsed" => 1,
			"isComplete" => 1,
			"urlInProgress" => "", 
			"content" => "module0AssignmentList.php"),
		array(
			"title" => "1. Fundamental Principles",
			"boxId" => "fund",
			"isCollapsed" => 0,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "module1AssignmentList.php"),
		array(
			"title" => "2. Bending of Beams",
			"boxId" => "bend",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "something.php",
			"content" => "moduleXAssignmentList.php"),
		array(
			"title" => "3. Shearing Stress",
			"boxId" => "shear",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "moduleXAssignmentList.php"),
		array(
			"title" => "4. Stress in Any Given Direction",
			"boxId" => "stress",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "moduleXAssignmentList.php"),
		array(
			"title" => "5. Design for Cyclic Loading",
			"boxId" => "cyclic",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "moduleXAssignmentList.php"),
		array(
			"title" => "6. Design of Shafts",
			"boxId" => "shafts",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "moduleXAssignmentList.php")
		);
	
	$showModuleProgress = 0;
	$showPrevNext = 0;

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
