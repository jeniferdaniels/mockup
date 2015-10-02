<?php include_once 'mockupFunctions.php' ?>
<?php include_once 'iconVariables.php' ?>
<?php 
	$navPrevious = "";
	$navNext = "";	
	$showModuleProgress = 0;
	$pageTitle = "Syllabus";
	
	$breadCrumbs = array(
		array("url"=>"index.php", "displayTitle"=>"Home"),
		array("url"=>"", "displayTitle"=>$pageTitle));
	
	$boxes = array (
		array(
			"title" => "Course Readings",
			"boxId" => "readings",
			"isCollapsed" => 0,
			"isComplete" => 0,
			"urlInProgress" => "", 
			"content" => "contentHere.php"),
		array(
			"title" => "Course Description",
			"boxId" => "description",
			"isCollapsed" => 0,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php"),
		array(
			"title" => "Course Goals and objectives",
			"boxId" => "goals",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "goals.php"),
		array(
			"title" => "How the Course Works",
			"boxId" => "how",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php"),
		array(
			"title" => "Student Responsibilities",
			"boxId" => "student",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php"),
		array(
			"title" => "Grading Criteria",
			"boxId" => "grades",
			"isCollapsed" => 0,
			"isComplete" => 0,
			"urlInProgress" => "gradingCriteria.php",
			"content" => "grading.php"),
		array(
			"title" => "Course Policies",
			"boxId" => "coursePolicies",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php"),
		array(
			"title" => "University Policies",
			"boxId" => "univsersityPolicies",
			"isCollapsed" => 1,
			"isComplete" => 0,
			"urlInProgress" => "",
			"content" => "contentHere.php")
		);

		
?>	

<!doctype html>
<html>
	<head>
		<?php writeHead(getCourseName()); ?>
		<script>
			function expandAll(){
				showItem("readings_expanded");
				showItem("description_expanded");
				showItem("goals_expanded");
				showItem("how_expanded");
				showItem("student_expanded");
				showItem("grades_expanded");
				showItem("coursePolicies_expanded");
				showItem("univsersityPolicies_expanded");
				
				dontShowItem("readings_collapsed");
				dontShowItem("description_collapsed");
				dontShowItem("goals_collapsed");
				dontShowItem("how_collapsed");
				dontShowItem("student_collapsed");
				dontShowItem("grades_collapsed");
				dontShowItem("coursePolicies_collapsed");
				dontShowItem("univsersityPolicies_collapsed");	
			}
			
			function collapseAll(){
				
				dontShowItem("readings_expanded");
				dontShowItem("description_expanded");
				dontShowItem("goals_expanded");
				dontShowItem("how_expanded");
				dontShowItem("student_expanded");
				dontShowItem("grades_expanded");
				dontShowItem("coursePolicies_expanded");
				dontShowItem("univsersityPolicies_expanded");
				
				showItem("readings_collapsed");
				showItem("description_collapsed");
				showItem("goals_collapsed");
				showItem("how_collapsed");
				showItem("student_collapsed");
				showItem("grades_collapsed");
				showItem("coursePolicies_collapsed");
				showItem("univsersityPolicies_collapsed");	
				
			}
		</script>
	</head>
	
	<body>
		<?php writeTop($navNext, $navPrevious, $showModuleProgress, $breadCrumbs); ?>
	
		<div class="contentWrapper" id="contentWrapper">
			
			<h2 class="contentTitle"><?php echo $pageTitle ?></h2>
			
			<div class="expandCollapseAllWrapper">
				<div id="expandAll" style="display:none">
					<a href="javascript:toggleDisplay('expandAll', 'collapseAll'); expandAll();">Expand All</a>
					
				</div>
				
				<div id="collapseAll">
					<a href="javascript:toggleDisplay('expandAll', 'collapseAll'); collapseAll();">Collapse All</a>
				</div>
			</div>
			
			<?php 
				for ($i=0; $i<count($boxes); $i++)
					writeToggleBox($boxes[$i]);
			?>
		</div>
	</body>
</html>
