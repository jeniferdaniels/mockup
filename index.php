<?php include_once 'scripts/mockupFunctions.php' ?>
<?php include_once 'scripts/globalVariables.php' ?>


<!doctype html>
<html>
	<head>
		<?php writeCourseDashboardHead(""); ?>
		<link href='calendar/fullcalendar.css' rel='stylesheet' />
		<link href='css/courseDashboard.css' rel='stylesheet'/>
		
		
		<script src='calendar/lib/moment.min.js'></script>
		<script src='scripts/js/bootstrapmodal.min.js'></script>	
		<script src='calendar/lib/jquery.min.js'></script>		
		<script src="scripts/js/jquery-ui.min.js"></script>
		<script src='calendar/fullcalendar.min.js'></script>
		
		
		
		<script>
		$(document).ready(function(){
			makeCourseDashboard("cat101/json/kitten.json");
			
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

			<div id="footer"></div>
		</div>

		<!-- modal -->
		<?php  writeCalendarModal(); ?>

	</body>
</html>
