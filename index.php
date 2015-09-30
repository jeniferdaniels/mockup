<?PHP include_once 'mockupFunctions.php' ?>
<?PHP 
	$boxes = array (
		array(
			"title" => "0. Overview",
			"boxId" => "overview",
			"isCollapsed" => 1,
			"isComplete" => 1,
			"urlInProgress" => "", 
			"content" => "contentHere.php"),
		array(
			"title" => "1. Fundamental Principles",
			"boxId" => "fundamental",
			"isCollapsed" => 0,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "module1List.php"),
		array(
			"title" => "2. Bending of Beams",
			"boxId" => "bending",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "something.php",
			"content" => "contentHere.php"),
		array(
			"title" => "3. Shearing Stress",
			"boxId" => "stress",
			"isCollapsed" => 1,
			"isComplete" => 1,
			"urlInProgress" => "",
			"content" => "contentHere.php"),
		array(
			"title" => "4. Stress in Any Given Direction",
			"boxId" => "direction",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php"),
		array(
			"title" => "5. Design for Cyclic Loading",
			"boxId" => "cyclic",
			"isCollapsed" => 1,
			"isComplete" => 1,
			"urlInProgress" => "",
			"content" => "contentHere.php"),
		array(
			"title" => "6. Design of Shafts",
			"boxId" => "shafts",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php")
		);
	
		$hId = "i";
		$showModuleProgress	= false;
		$showPrevNext = false;
?>

<!doctype html>
<html>
	<head>
		<?php writeHead(getCourseName()); ?>
	</head>
	
	<body>
		<?php writeTop($hId, $showModuleProgress, $showPrevNext); ?>
		
		<div class="contentWrapper indexContent">
			<?php 
				for ($i=0; $i<count($boxes); $i++)
					writeToggleBox($boxes[$i]);
			?>
		</div>
	</body>
</html>
