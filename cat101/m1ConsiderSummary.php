<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>
<?php 
	$navPrevious = "m1Cost.php";
	$navNext = "m1AssignmentA.php";	
	$showModuleProgress = 1;
	$pageTitle = "1.1.4 Summary";
	
	$breadCrumbs = array(
		array("url"=>"../index.php", "displayTitle"=>"Home"),
		array("url"=>"../index.php?isExpanded=0,1,0,0", "displayTitle"=>"1. Choosing a Kitten"),
		array("url"=>"m1factors.php", "displayTitle"=>"1.1 Factors to Consider When Choosing a Kitten"),
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
			<h2 id="subtopicTitle"><?php echo $pageTitle ?></h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>
			<footer><?php writeFooter() ?></footer>
		</div>

	</body>
</html>