<?PHP include_once 'mockupFunctions.php' ?>

<?PHP
	$hId = (isset($_GET['hId'])? $_GET['hId']: "i");
	$pageTitle = $hId . " " . getPageTitle($hId);
	
	$showModuleProgress = 1;
	$showPrevNext = 1;
?>

<!doctype html>
<html>
	<head>
		<?php writeHead($pageTitle); ?>
	</head>
	
	<body>
		<?php writeTop($hId, $showModuleProgress, $showPrevNext); ?>
	
		<div class="contentWrapper" id="contentWrapper">
			
			<div class="fa fa-calendar fa-2x displayInlineBlock"></div><h2 class="contentTitle displayInlineBlock">Assignment - <?php echo $pageTitle ?></h2>
			<p><div class="due displayInline">Due -</div><time class="displayInlineBlock dueTime">Month DD, YYYY at HH:MM AM/PM</time></br></p>
			<p><div class="deliverable displayInline">Deliverables - </div> Solved Homework Problems</p>
			
			
			<p class="assignmentDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nu
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nu</p>
				
		</div>
		
	</body>
</html>
