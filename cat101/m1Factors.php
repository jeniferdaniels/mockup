<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>
<?php 
	$navPrevious = "";
	$navNext = "m1ConsiderOverview.php";
	$showModuleProgress = 0;

	$pageTitle = "1.1 Factors to Consider When Choosing a Kitten";
	
	$breadCrumbs = array(
		array("url"=>"../index.php", "displayTitle"=>"Home"),
		array("url"=>"../index.php", "displayTitle"=>"1. Choosing a Kitten"),
		array("url"=>"", "displayTitle"=>$pageTitle));
?>

<!doctype html>
<html>
	<head>
		<?php writeHead($pageTitle); ?>
		<script>$(document).ready(function(){$.ajax({url: "json/kitten.json"}).done(function(obj) {setTop(obj);});});</script>
	</head>
	
	<body>
		<?php writeTop($navNext, $navPrevious, $showModuleProgress, $breadCrumbs); ?>
	
		<div class="contentWrapper" id="contentWrapper">
			
			<h2><?php echo $pageTitle ?></h2>
			
			<p>In this topic you will learn about:</p>
			<ul class="moduleList">
				<li><a href="m1ConsiderOverview.php"><?php echo $GLOBALS['listCheckMark'] ?>1.1.1 Overview</a></li>
				<li><a href="m1Responsibility.php"><?php echo $GLOBALS['listCheckMark'] ?>1.1.2 Responsibility</a></li>
				<li><a href="m1Cost.php"><?php echo $GLOBALS['listCheckMark'] ?>1.1.3 Cost</a></li>
				<li><a href="m1ConsiderSummary.php"><?php echo $GLOBALS['listCurrentSpotSmall'] ?>1.1.4 Summary</a></li>
			</ul>
				
		</div>
		
	</body>
</html>