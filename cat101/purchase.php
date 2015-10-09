<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>
<?php 
	$navPrevious = "whyAdopt.php";
	$navNext = "purchaseOverview.php";
	$showModuleProgress = 0;

	$pageTitle = "1.3 Purchasing a Kitten";
	
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
			
			<h2><?php echo $pageTitle ?></h2>
			
			<p>In this topic you will learn about:</p>
			<ul class="moduleList">
				<li><a href="purchaseOverview.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.3.1 Overview</a></li>
				<li><a href="buy.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.3.2 Reasons to Purchase A Kitten</a></li>
				<li><a href="whereBuy.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.3.3 Where to Buy</a></li>
				<li><a href="purchaseSummary.php"><?php echo $GLOBALS['listCheckMarkHidden'] ?>1.3.4 Summary</a></li>
			</ul>
				
		</div>
		
	</body>
</html>