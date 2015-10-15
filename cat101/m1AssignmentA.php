<?php include_once '../scripts/mockupFunctions.php'; ?>
<?php include_once '../scripts/globalVariables.php'; ?>
<?php 
	$navPrevious = "m1ConsiderSummary.php";
	$navNext = "m1Rescue.php";	
	$showModuleProgress = 1;
	$pageTitle = "1.A Homework #1";
	
	$breadCrumbs = array(
		array("url"=>"index.php", "displayTitle"=>"Home"),
		array("url"=>"index.php?isExpanded=0,1,0,1", "displayTitle"=>"1. Choosing a Kitten"),
		array("url"=>"", "displayTitle"=>$pageTitle));
?>

<!doctype html>
<html>
	<head>
		<?php writeHead($pageTitle); ?>
	</head>
	
	<body>
		<?php writeTop($navNext, $navPrevious, $showModuleProgress, $breadCrumbs); ?>
	
		<div class="contentWrapper" id="contentWrapper">
			
			<div class="fa fa-calendar fa-2x displayInlineBlock urgent"></div><h2 class="contentTitle displayInlineBlock">Assignment - <?php echo $pageTitle ?></h2>
			<div class="assignmentDetailsWrapper">
				<strong>Due - </strong><time class="displayInlineBlock dueTime">January 18, 2015 at 11:59 PM</time>
				<br>
				<strong>Deliverables - </strong> Essay submitted via Blackboard
			</div>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>			
			<p>What are some benefits to owning a kitten? Write a 300 word essay and submit it via Blackboard.</p>
				
				
			<div class="assignmentDetailsCheckmarkWrapper">
				<div id="uncheckedMark">
					<a href="javascript:toggleDisplay('uncheckedMark', 'checkedMark');">
						Mark assignment as complete. 
						<?php echo $GLOBALS["assignmentCheckMarkUnchecked"] ?>
					</a>
				</div>
				
				<div id="checkedMark" style="display:none">
					Complete!
					<?php echo $GLOBALS["assignmentCheckMarkChecked"] ?>
				</div>
				
			</div>	
		</div>
		
	</body>
</html>