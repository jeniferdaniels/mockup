<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>
<?php 
	$navPrevious = "";
	$navNext = "m0Introduction.php";
	$showModuleProgress = 0;

	$pageTitle = "0.1 Welcome";
	
	$breadCrumbs = array(
		array("url"=>"index.php", "displayTitle"=>"Home"),
		array("url"=>"index.php?isExpanded=0,1,0,1", "displayTitle"=>"0. Overview and Course Logistics"),
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
				<ul>
					<li><?php echo $GLOBALS['listCheckMark'] ?><a href="m0Introduction.php">0.1.1 Introduction</a></li>
					<li><?php echo $GLOBALS['listCheckMark'] ?><a href="m0onlineLearningOritentation.php">0.1.2 Online Learning Orientation</a></li>
					<li><?php echo $GLOBALS['listCheckMark'] ?><a href="m0techSupport.php">0.1.3 Technical Support</a></li>
					<li><?php echo $GLOBALS['listCheckMark'] ?><a href="m0Summary.php">0.1.4 Summary</a></li>
				</ul>
				
		</div>
		
	</body>
</html>