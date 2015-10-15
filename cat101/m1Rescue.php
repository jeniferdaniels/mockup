<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>
<?php 
	$navPrevious = "m1AssigmentA.php";
	$navNext = "m1RescueOverview.php";
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
		<?php writeHead($pageTitle); ?>
	</head>
	
	<body>
		<?php writeTop($navNext, $navPrevious, $showModuleProgress, $breadCrumbs); ?>
	
		<div class="contentWrapper" id="contentWrapper">
			
			<h2><?php echo $pageTitle ?></h2>
			
			<p>In this topic you will learn about:</p>
			<ul class="moduleList">
				<li><a href="m1RescueOverview.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.2.1 Overview</a></li>
				<li><a href="m1Reason.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.2.2 Reasons to Rescue</a></li>
				<li><a href="m1Orgs.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.2.3 Hampton Roads Rescue Organizations</a></li>
				<li><a href="m1RescueSummary.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.2.4 Summary</a></li>
			</ul>
				
		</div>
		
	</body>
</html>