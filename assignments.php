<?php include_once 'scripts/mockupFunctions.php' ?>

<?php 
		
	$showModuleProgress = 0;
	$pageTitle = "Assignments";

	$breadCrumbs = array(
		array("url"=>"index.php", "displayTitle"=>"Home"),
		array("url"=>"", "displayTitle"=>$pageTitle));
	
?>

<!doctype html>
<html>
<head>
		<?php  includeCsss (); ?>
		
		<?php  includeScripts (); ?>
		
		
		<script>
			$(document).ready(function(){
				$.ajax({
					url: "cat101/json/kitten.json"
				}).done(function(obj) {

					//***************************************
					//set page content
					//***************************************
					setTop(obj);
					document.title = getCourseTitle(obj);

					
					toolBoxFunctionality();																				
					});// done 
				});//ready
		</script>
	</head>
	<body>
		<div class="top" id="top"><?php writeTopHtml(); ?></div>
	
		<div class="contentWrapper" id="contentWrapper">
			
			<h2><?php echo $pageTitle ?></h2>
			
			assignments go here
		</div>
	</body>
</html>
