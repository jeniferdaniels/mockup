<?php include_once 'scripts/mockupFunctions.php' ?>

<?php //TODO: redo this page to use js ?>

<?php $subtopicId = (isset($_REQUEST['id'])? $_GET["id"] : "3");?>

<!doctype html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/pleStyle.css">	
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/ple-awesome/styles.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" />
	
	<link rel="stylesheet" type="text/css" href="css/navArrowStyle.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.4.custom.css">
	<link rel="stylesheet" type="text/css" href="css/calendar/fullcalendar.min.css"  />
	<link rel="stylesheet" type="text/css" href="css/courseHome.css" />
	<link rel="stylesheet" type="text/css" href="css/calendar/odu_calendar.css" />
	<link rel="stylesheet" type="text/css" href="css/upEvents/odu_upEvents.css" />
	<link rel="stylesheet" type="text/css" href="css/moduleList/moduleListStyle.css" />
	<link rel="stylesheet" type="text/css" href="css/pnotify.custom.css" />
	
	<script>DEBUG = true;</script>
	<script type="text/javascript" src="scripts/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="scripts/js/jquery-ui.min.js"></script>
	<!--<script type="text/javascript" src="<!-- string::webdir_assets --><!--js/_odu/courseFunctions.js"></script>	-->	
	<script type="text/javascript" src="scripts/js/utils.js"></script>
	<script type="text/javascript" src="scripts/js/moment.min.js"></script>	
	<script type="text/javascript" src="scripts/js/calendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="scripts/js/calendar/odu_calendar.js"></script>
	<script type="text/javascript" src="scripts/js/upEvents/odu_upEvents.js"></script>
	<script type="text/javascript" src="scripts/js/pnotify.custom.js"></script>
	<script type="text/javascript" src="scripts/js/messages/odu_messages.js"></script>
	<script type="text/javascript" src="scripts/js/personalization/odu_preferences.js"></script>
	<script type="text/javascript" src="scripts/js/moduleList/odu_moduleList.js"></script>
		
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