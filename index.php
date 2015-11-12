<?php include_once 'scripts/mockupFunctions.php' ?>
<?php include_once 'scripts/globalVariables.php' ?>


<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="/mockups/css/reset.css">
		<link rel="stylesheet" type="text/css" href="/mockups/fonts/font-awesome-4.4.0/css/font-awesome.min.css">		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/mockups/css/pleStyle.css"><?php //has to be last or google will override icons?>
		<link href='calendar/fullcalendar.css' rel='stylesheet' />
		<link href='css/courseDashboard.css' rel='stylesheet'/>
		<link href='css/modal.css' rel='stylesheet'/>
		
		
		<script src="scripts/js/jquery-2.1.3.min.js"></script>
		<script src='calendar/lib/moment.min.js'></script>
		<script src='scripts/js/bootstrapmodal.min.js'></script>	
		<script src='calendar/lib/jquery.min.js'></script>		
		<script src="scripts/js/jquery-ui.min.js"></script>
		<script src='calendar/fullcalendar.min.js'></script>
		<script src="scripts/js/courseFunctions.js"></script>
		
		<script>

		$(document).ready(function(){
			makeCourseDashboard("cat101/json/kitten.json");
			displayChecksForCompletedAssignments("cat101/json/courseStatus.json");
			});
		
		function makeCourseDashboard(url) {
			$.ajax({	
		        url: url
		    }).done(function(obj) {
		    	setTop(obj);
		    	setCourseContent(obj);
				$('#eventContent').hide();
				$('#calendar').fullCalendar({
				    events: getEventsAtAGlance(obj),
				    height: 400,
				    fixedWeekCount: false,
				    defaultDate: '2015-01-18',
				    header: {
				        left: 'prev',
				        center: 'title',
				        right: 'next'
				    },		    
				    eventRender: function (event, element) {
				        element.attr('href', 'javascript:void(0);');

				        if(event.icon){
				        	element.find(".fc-title").prepend("<i class='material-icons md-small'>" + event.icon + "</i></a>");
				        }

				        
				        element.click(function() {

					        if (event.type == "assignment"){
								$("#assignmentDeliverables").html(event.deliverable);
						        $("#eventDateTime").html(moment(event.start).format('MMMM DD, YYYY h:mm A'));
								//these will not show if a module was clicked on first, so need to turn these back on
								$("#eventIcon").show();
								$("#assignmentDueHeader").show();
								$("#assignmentDeliverableHeader").show();
						        $("#assignmentDeliverables").show();
						        $("#assignmentCompletionStatus").show();
					        }
					        else{
								$("#eventIcon").hide();
								$("#assignmentDueHeader").hide();
						        $("#eventDateTime").html(moment(event.start).format('MMMM DD') + ' - ' + moment(event.end).format('MMMM DD, YYYY'));
								$("#assignmentDeliverableHeader").hide();
						        $("#assignmentDeliverables").hide();
						        $("#assignmentCompletionStatus").hide();
					        }
					        $("#eventTitle").html(event.type + " - " + event.title);
				            $("#eventDescription").html(event.description);
				            $("#eventContent").dialog({ modal: true, width:500});

				        });
				    }
				});
			});
		};
		</script>

	</head>
	
	<body>
		<?php writeTop("", "", "", "") ?>
	
		<div class="contentWrapper dash" id="dash">
			<div id="leftHandSide">
				<div class="scheduleAtAGlance">
					<h2>Schedule At a Glance</h2>
					<div id='calendar'></div>
					<a href="schedule.php">Full Schedule</a>
				</div>
				
				<div class="upcomingAssignments">
					<h2>Upcoming Assignments</h2>
						<?php for ($i=0; $i<=5; $i++) {writeUpcomingAssignment($i); } ?>
				</div><!-- end upcomingAssignments -->
				
			</div><!-- end left hand side -->
			
			<div id="rightHandSide" class="courseContent">		
				<h2>Course Content </h2>
				<div id="courseContent"></div>
			</div>

			<div id="footer" class="footer"></div>
		</div>

		<!-- modal -->
		<?php  writeCalendarModal(); ?>

	</body>
</html>
