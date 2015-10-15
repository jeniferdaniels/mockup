<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>

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
			"title" => "0. Overview and Course Logistics",
			"boxId" => "overview",
			"isCollapsed" => $isExpandedListArray[0],
			"isComplete" => $isDoneList[0],
			"dates" => "1/10/2015 - 1/15/2015", 
			"content" => "m0List.php"),
		array(
			"title" => "1. Choosing a Kitten",
			"boxId" => "factor",
			"isCollapsed" => $isExpandedListArray[1],
			"isComplete" => $isDoneList[1],
			"dates" => "1/15/2015 - 1/23/2015",
			"content" => "m1List.php"),
		array(
			"title" => "2. Caring for Your Kitten",
			"boxId" => "care",
			"isCollapsed" => $isExpandedListArray[2],
			"isComplete" => $isDoneList[2],
			"dates" => "1/23/2015 - 1/30/2015",
			"content" => "m2List.php"),
		array(
			"title" => "3. Legal Requirements of Owning Kittens",
			"boxId" => "legal",
			"isCollapsed" => $isExpandedListArray[3],
			"isComplete" => $isDoneList[3],
			"dates" => "1/30/2015 - 2/7/2015",
			"content" => "m3List.php")
		);
?>

<!doctype html>
<html>
	<head>
		<?php writeCourseDashboardHead(""); ?>

		
		<script>
			
			$(document).ready(function(){
				recurringCalendar();
				//overwrite the stupid thing.
				document.getElementById("oduCal").style ="height: 355px";
			});
		</script>
	</head>
	
	<body>
		<?php writeTop($navNext, $navPrevious, $showModuleProgress, ""); ?>
		<div class="contentWrapper dash">		
			<?php 
				for ($i=0; $i<count($boxes); $i++)
					writeSuccessMessage($i, "You have successfully completed module " . $i . "."); 
			
				if ($msg=="done1")
					echo "<script>document.getElementById('successBox1').style.display='inline-block';</script>";
			?>
			
		
			<div class="scheduleContentWrapper">
				<?php writeDashWidgetTitle("Schedule At a Glance", true); ?>
				<div id='calendar'></div>
			</div>
			
			<div class="courseContentWrapper">
				<?php writeDashWidgetTitle("Course Content", false); ?>
				<?php 
					for ($i=0; $i<count($boxes); $i++)
						writeToggleBox($boxes[$i]);
				?>
			</div>
		
		</div>
	</body>
</html>
