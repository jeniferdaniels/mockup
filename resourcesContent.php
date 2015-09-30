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
			
			<h2 class="contentTitle"><?php echo $pageTitle ?></h2>
			
			<br><br>
			<mark>list goes here</mark>
				
		</div>
		
	</body>
</html>
