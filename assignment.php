<?php include_once 'scripts/mockupFunctions.php' ?>
<?php include_once 'scripts/globalVariables.php' ?>
<?php $subtopicId = (isset($_REQUEST['id'])? $_GET["id"] : "3");?>

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
					setTop(obj);
					document.title = getCourseTitle(obj);
					flatCourse = flatten(obj);
					
					var assignmentId = (typeof $.QueryString["id"] !== undefined) ? $.QueryString["id"] : "3"; //default it to something for now 
					//TODO: make a default id and handle that
					assignment = getObjectFromArray(flatCourse, "id", assignmentId);
					assignmentIndex = flatCourse.indexOf(assignment);
										
					parent = getObjectFromArray(flatCourse, "id", assignment.parent);
					previous = flatCourse[assignmentIndex-1];
					next = flatCourse[assignmentIndex+1];

					useArrowsForNavigation(previous.url, next.url);
					
					$("#assignmentTitle").html(assignment.title);
					$("#due").html(assignment.due);
					$("#submitVia").html(assignment.submitVia);
					$("#deliverable").html(assignment.deliverable);
					$("#description").html(assignment.description);
					
					 
					$("#moduleCrumb").html("<a href='#'>" + parent.displayNumber + ". " + parent.title + "</a>");
					$("#thisCrumb").html(assignment.displayNumber + " " + assignment.title); 
					$("#prev").prop("href", previous.url);
					$("#next").prop("href", next.url);
					$("#editLink").click(function(){		
						$("body").toggleClass("editingMode");			
					}); //edit link										
				});// done 
			});//ready
		</script>
	</head>
	
	<body>
		<div class="navWrapper">
			<div id="navPrevious" class="navPrevious"><a id="prev" href=""><?php echo(icon("fa", "previous", "e", "")); ?></a></div>
			<div id="navNext" class="navNext"><a id="next" href=""><?php echo(icon("fa", "next", "e", "")); ?></a></div>
		</div>
	
	
		<div class="top"><?php writeTopHtml(); ?></div>
		

		<div class="breadCrumbWrapper">
			<nav>
				<ul class="breadCrumbs">
					<li><a href="index.php">Home</a></li>
					<li id="moduleCrumb"></li>
					<li id="thisCrumb"></li>
				</ul>
			</nav>
		</div>



			<div class="wrapper">
				<div id="courseMaterial" class="paper">
					<h2 id="pageTitle">Assignment</h2>
					<div id="content">
						<div class="icon"><?php echo icon("g", "assignment", "h", "darkGray") ?></div>
						<h3 id="assignmentTitle"></h3>
						<br>
						<h5 id="dueHeader">Due-</h5><div id="due"></div>
						<br>
						<h5 id="submitHeader">Submit via-</h5><div id="submitVia"></div>
						<h5 id="deliverableHeader">Deliverable-</h5><div id="deliverable"></div>
						<br>
						<p id="description"></p>
						<br>
						
						<div id="checkmark"><?php echo icon("g", "check", "l", "success")?></div>
						
					
					</div>
				</div>
				<div id="toolBox"><?php writeTools(false, false, true, true, false) ?></div>
				<div id="footer" class="footer"></div>
			</div>
	</body>
</html>