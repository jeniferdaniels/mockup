<?php include_once 'mockupFunctions.php' ?>
<?php include_once 'iconVariables.php' ?>
<?php 
	$navPrevious = "rescueSummary.php";
	$navNext = "purchase.php";	
	$showModuleProgress = 1;
	$pageTitle = "1.B Discussion Forum #1";
	
	$breadCrumbs = array(
		array("url"=>"index.php", "displayTitle"=>"Home"),
		array("url"=>"index.php?isExpanded=0,1,0,1", "displayTitle"=>"1. Choosing a Kitten"),
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
			
			<div class="fa fa-calendar fa-2x displayInlineBlock urgent"></div><h2 class="contentTitle displayInlineBlock">Assignment - <?php echo $pageTitle ?></h2>
			<div class="assignmentDetailsWrapper">
				<strong>Due - </strong><time class="displayInlineBlock dueTime">October 12, 2015 at 11:59 PM</time>
				<br>
				<strong>Deliverables - </strong> Comments on Blackboard Discussion Forum
			</div>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>			
			<p>Would you rescue a kitten?  Explain why?</p>
				
				
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