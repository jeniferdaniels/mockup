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
	$pageTitle = "Assignments";
	
	
	$boxes = array (
		array(
			"title" => "0. Overview",
			"boxId" => "overview",
			"isCollapsed" => $isExpandedListArray[0],
			"isComplete" => $isDoneList[0],
			"urlInProgress" => "", 
			"content" => "module0AssignmentList.php"),
		array(
			"title" => "1. Choosing a Kitten",
			"boxId" => "factor",
			"isCollapsed" => $isExpandedListArray[1],
			"isComplete" => $isDoneList[1],
			"urlInProgress" => "",
			"content" => "module1AssignmentList.php"),
		array(
			"title" => "2. Caring for Your Kitten",
			"boxId" => "care",
			"isCollapsed" => $isExpandedListArray[2],
			"isComplete" => $isDoneList[2],
			"urlInProgress" => "something.php",
			"content" => "module2AssignmentList.php"),
		array(
			"title" => "3. Legal Requirements",
			"boxId" => "legal",
			"isCollapsed" => $isExpandedListArray[3],
			"isComplete" => $isDoneList[3],
			"urlInProgress" => "",
			"content" => "module3AssignmentList.php")
		);

	
	$breadCrumbs = array(
		array("url"=>"index.php", "displayTitle"=>"Home"),
		array("url"=>"", "displayTitle"=>$pageTitle));
	
?>

<!doctype html>
<html>
	<head>
		<?php writeHead(getCourseName()); ?>
	</head>
	
	<body>
		<?php writeTop($navNext, $navPrevious, $showModuleProgress, $breadCrumbs); ?>
	
		<div class="contentWrapper" id="contentWrapper">
			
			<h2 class="contentTitle"><?php echo $pageTitle ?></h2>
			
			<?php 
				for ($i=0; $i<count($boxes); $i++)
					writeToggleBox($boxes[$i]);
			?>
		</div>
	</body>
</html>