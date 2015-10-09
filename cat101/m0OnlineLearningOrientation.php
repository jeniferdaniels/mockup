<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>
<?php 
	$navPrevious = "m0Introduction.php";
	$navNext = "m0TechSupport.php";
	$showModuleProgress = 1;
	$pageTitle = "0.1.2 Online Learning Orientation";
	
	$breadCrumbs = array(
		array("url"=>"index.php", "displayTitle"=>"Home"),
		array("url"=>"index.php?isExpanded=0,1,0,1", "displayTitle"=>"0. Overview and Course Logistics"),
		array("url"=>"factors.php", "displayTitle"=>"0.1 Welcome"),
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
				
			   <p>Review the Online Learning Orientation, following all directions in the assignments and topics (i.e., complete the tasks and watch the videos). Use the Orientation to make sure you are prepared for taking your online course.</p>
			   <p><a href="">Online Learning Orientation</a></p>
			   <p>You are required to review this Orientation only ONCE! (If you completed it in a prior session or are taking multiple online courses, you DO NOT need to review it again.) After you complete the Orientation, please submit the Orientation Survey, so future students can benefit from your comments.</p>
			</div>
				
		<footer><?php writeFooter() ?></footer>
		
	</body>
</html>