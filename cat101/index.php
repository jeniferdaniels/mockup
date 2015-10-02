<?php include_once 'mockupFunctions.php' ?>
<?php include_once 'iconVariables.php' ?>
<?php 
	$isExpandedList = (isset($_GET['isExpanded'])? $_GET['isExpanded']: "0,1,0,0");
	$isDoneList = (isset($_GET['isDone'])? $_GET['isDone']: "1,0,0,0");
	$msg = (isset($_GET['msg'])? $_GET['msg']: "none");
	
	//if the querystring is corrupt, set them all closed
	if ($isExpandedList != "")
		$isExpandedListArray = explode(",", $isExpandedList);
	else
		$isExpandedListArray = array(0,0,0,0);
		
	if ($isDoneList != "")
		$isDoneList = explode(",", $isDoneList);
	else
		$isDoneList = array(0,0,0,0);
		
		
	$navPrevious = "";
	$navNext = "";
	$showModuleProgress = 0;
	$boxes = array (
		array(
			"title" => "0. Overview",
			"boxId" => "overview",
			"isCollapsed" => $isExpandedListArray[0],
			"isComplete" => $isDoneList[0],
			"urlInProgress" => "", 
			"content" => "module0List.php"),
		array(
			"title" => "1. Choosing a Kitten",
			"boxId" => "factor",
			"isCollapsed" => $isExpandedListArray[1],
			"isComplete" => $isDoneList[1],
			"urlInProgress" => "",
			"content" => "module1List.php"),
		array(
			"title" => "2. Caring for Your Kitten",
			"boxId" => "care",
			"isCollapsed" => $isExpandedListArray[2],
			"isComplete" => $isDoneList[2],
			"urlInProgress" => "something.php",
			"content" => "module2List.php"),
		array(
			"title" => "3. Legal Requirements",
			"boxId" => "legal",
			"isCollapsed" => $isExpandedListArray[3],
			"isComplete" => $isDoneList[3],
			"urlInProgress" => "",
			"content" => "module3List.php")
		);
?>

<!doctype html>
<html>
	<head>
		<?php writeHead(getCourseName()); ?>
	</head>
	
	<body>
		<?php writeTop($navNext, $navPrevious, $showModuleProgress, ""); ?>
		
		<div id="test">test</div>
		
		<div class="contentWrapper indexContent">
		<?php 
			for ($i=0; $i<count($boxes); $i++)
				writeSuccessMessage($i, "You have successfully completed module " . $i . "."); 
		
			if ($msg=="done1")
				echo "<script>document.getElementById('successBox1').style.display='inline-block';</script>";
		?>
		
		
		
		<?php 
			for ($i=0; $i<count($boxes); $i++)
				writeToggleBox($boxes[$i]);
			?>
		</div>
	</body>
</html>
