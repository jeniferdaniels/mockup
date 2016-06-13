<?php include_once 'scripts/mockupFunctions.php' ?>

<?php //TODO: redo this page to use js ?>

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
					var disclaimer = "Marking an assignment as submitted, does not automatically submit the assignment via Blackboard.";
					var resubmit = "Click the checkmark again to mark the assignment as not submitted.";
					var submit = "Mark Assignment as Submitted";
					var submitted = "Assignment Submitted!";
					
					setTop(obj);
					document.title = getCourseTitle(obj);
					flatCourse = flattenCourse(obj);
					
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

					$("#checkmarkDisclaimer").html(disclaimer);
					$("#checkmarkCaption").html(submit);
					
					$("#editToolLink").click(function(){		
						$("body").toggleClass("editingMode");			
					}); //edit link

					$("#checkmarkWrapper").click(function(){
						console.log	("clicked");

						if ($("#checkmark").hasClass("disabled")){
							console.log("here");
							$("#checkmarkCaption").html(submitted);
							$("#checkmarkDisclaimer").html(resubmit);
							$("#checkmark").addClass("success");
							$("#checkmark").removeClass("disabled");
						}
						else{
							console.log("right here");
									
							$("#checkmarkCaption").html(submit);	
							$("#checkmarkDisclaimer").html(disclaimer);
							$("#checkmark").addClass("disabled");
							$("#checkmark").removeClass("success");
						}
						
						
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
				<div id="courseMaterial">
					<div class="paper">
						<div id="content">
							<div id="assignmentIcon" class="assignmentIcon"></div>
							<h1 id="pageTitle">Assignment</h1>
							<h3 id="assignmentTitle"></h3>
							
							<ul id="assignmentProperties" class="assignmentProperties">
								<li><div id="dueHeader">Due- </div><div id="due"></div></li>
								<li><div id="submitHeader">Submit via- </div><div id="submitVia"></div></li>
								<li><div id="deliverableHeader">Deliverable- </div><div id="deliverable"></div></li>
							</ul>
							
							<p id="description"></p>
							
							<div id="checkmarkWrapper" class="checkmarkWrapper">
								<div id="checkmark" class="checkmark disabled"><?php echo icon("g", "check", "h", "")?></div>
								<div id="checkmarkCaption" class="checkmarkCaption"></div>
								<div id="checkmarkDisclaimer" class="checkmarkDisclaimer"></div>
							</div>
							
							<div style="clear: both"></div>
						</div>
					</div>
				</div>
				
				<div id="toolBox"><?php writeTools(false, true, true, true, false) ?></div>
				<div id="footer" class="footer"></div>
			</div>
	</body>
</html>