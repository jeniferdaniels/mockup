<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>
<?php 
	$navPrevious = "whyGetAKitten.php";
	$navNext = "rescueOverview.php";
	$showModuleProgress = 0;

	$pageTitle = "1.2 Kitten Rescue";
	
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
			
			<h2 class="contentTitle"><?php echo $pageTitle ?></h2>
			
			<p>In this topic you will learn about:</p>
			<ul class="moduleList">
				<li><a href="rescueOverview.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.2.1 Overview</a></li>
				<li><a href="reason.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.2.2 Reasons to Rescue</a></li>
				<li><a href="orgs.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.2.3 Hampton Roads Rescue Organizations</a></li>
				<li><a href="rescueSummary.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.2.4 Summary</a></li>
			</ul>
				
		</div>
		
	</body>
</html>