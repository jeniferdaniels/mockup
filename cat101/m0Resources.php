<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>
<?php 
	$navPrevious = "m0AssignmentA.php";
	$navNext = "m0Feedback.php";	
	$showModuleProgress = 1;
	$pageTitle = "0.2 Resources";
	
	$breadCrumbs = array(
		array("url"=>"index.php", "displayTitle"=>"Home"),
		array("url"=>"index.php?isExpanded=1,0,0,0", "displayTitle"=>"0. Overview and Course Logistics"),
		array("url"=>"", "displayTitle"=>$pageTitle));
?>

<!doctype html>
<html>
	<head>
		<?php writeHead($pageTitle); ?>
		<link rel="stylesheet" type="text/css" href="../css/resourceTableStyle.css">
		<script type="text/javascript" src="../scripts/js/jquery-latest.js"></script> 
		<script type="text/javascript" src="../scripts/js/jquery.tablesorter.js"></script> 
		<script>
		$(document).ready(function() 
				{ 
					$("#myTable").tablesorter();			
				} 
			); 
		</script>
	</head>
	
	<body>
		<?php writeTop($navNext, $navPrevious, $showModuleProgress, $breadCrumbs); ?>
	
		<div class="contentWrapper" id="contentWrapper">
			
			<h2><?php echo $pageTitle ?></h2>
		
			<div class="resourceTableWrapper">
			
			<table id="myTable" class="tablesorter"> 
				<thead> 
				<tr> 
					<th>Resource</th> 
					<th>Type</th> 
					<th>Size</th> 
				</tr> 
				</thead> 
				<tbody> 
				<tr> 
					<td><a href="resources/cat_edu.pdf"><?php echo $GLOBALS["iconFileTypePdfSmall"] ?> ASPCA Cat Care Flyer</a></td> 
					<td>PDF</td> 
					<td>126K</td> 
				</tr> 
				<tr> 
					<td><a href="https://www.youtube.com/watch?v=0Bmhjf0rKe8"><?php echo $GLOBALS["iconLinkSmall"] ?> Tickle Cat</a></td> 
					<td>Video</td> 
					<td>External Link</td> 
				</tr> 

				<tr> 
					<td><a href="www.chesapeakehumane.org"><?php echo $GLOBALS["iconLinkSmall"] ?> Chesapeake Humane Society</a></td> 
					<td>Website</td> 
					<td>External Link</td> 
				</tr> 

				<tr> 
					<td><a href="resources/jensCats.xlsx"><?php echo $GLOBALS["iconFileTypeExcelSmall"] ?> My Cats</a></td> 
					<td>Excel Spreadsheet</td> 
					<td>9K</td> 
				</tr> 
				
				
			</tbody> 
			</table> 
			
			
			
			
			
			</div>
		
		</div>
	</body>
</html>