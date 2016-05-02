<?php include_once '../scripts/mockupFunctions.php'; ?>
<?php 
	$navPrevious = "#";
	$navNext = "#";	
	$showModuleProgress = 1;
	$pageTitle = "#.X Assignment Name Here";
	
	$breadCrumbs = array(
		array("url"=>"index.php", "displayTitle"=>"Home"),
		array("url"=>"index.php", "displayTitle"=>"#. Module Name Here"),
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
			
			<div class="fa fa-calendar fa-2x displayInlineBlock urgent"></div><h2 class="contentTitle displayInlineBlock">Assignment - <?php echo $pageTitle ?></h2>
			<div class="assignmentDetailsWrapper">
				<strong>Due - </strong><time class="displayInlineBlock dueTime">January 18, 2015 at 11:59 PM</time>
				<br>
				<strong>Deliverables - </strong> Essay submitted via Blackboard
			</div>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>			
			<p>What are some benefits to owning a kitten? Write a 300 word essay and submit it via Blackboard.</p>
				
				
			<?php  echo icon("g", "check", "l", "")?>
				
			</div>	
		</div>
		
	</body>
</html>