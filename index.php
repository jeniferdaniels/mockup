<?php include_once 'scripts/mockupFunctions.php' ?>



<!doctype html>
<html>
	<head>
		<?php includeCsss() ?>
		<link rel="stylesheet" href="css/calendar/fullcalendar.min.css"  />
		<link rel="stylesheet" href="css/calendar/odu_calendar.css" />
		<link rel="stylesheet" href="css/upcomingEvents/odu_upcomingEvents.css" />
		<link rel="stylesheet" href="css/courseLandingStyle.css" />
		<link rel="stylesheet" href="css/pnotify.custom.css" />

		
		
		<?php includeScripts() ?>
		<script src="scripts/js/utils.js"></script>
		<script src="scripts/js/moment.min.js"></script>	
		<script src="scripts/js/calendar/fullcalendar.min.js"></script>
		<script src="scripts/js/calendar/odu_calendar.js"></script>
		<script src="scripts/js/pnotify.custom.js"></script>
		<script src="scripts/js/messages/odu_messages.js"></script>

		<script>
		$(document).ready(function(){

			//calendar
			writeSmallCalendar("sampleJson/sampleSmallCalendarEvents.json");
			
			
			
			
			displayChecksForCompletedAssignments("cat101/json/courseStatus.json");

			//announcements
			$.ajax({
				url: 'http://ple1.odu.edu:4243/api/announcement;list=user',
				type: 'GET',
				dataType: 'json',
				success: function(data) { processNotifications(data)},
				error: function() { console.log("There was an error getting the announcements"); },
				xhrFields: { withCredentials: true	},
				crossDomain: true
			});

			
			$("#odu_smallCalendarHeader").click(function(){
				$("#odu_smallCalendar").toggle();						
			});
			
		});
		
		
		</script>
	
	</head>
	
	<body>
		<div class="top"><?php writeTopHTML() ?></div>

		<header></header>
		<div id="odu_wrapper" class="odu_wrapper">
			<div id="odu_landingContent" class="odu_landingContent">
			
				<!--left hand side-->
				<div id="odu_landingLhs" class="odu_landingLhs">		
					<div id="odu_smallCalendarWrapper" class="wrapper">
						<h1 class="calendar" id="odu_smallCalendarHeader">Calendar</h1>
						<div id="odu_smallCalendar"></div>
					</div>
					
					<div id="odu_upEventsWrapper" class="wrapper">
						<h1 class="upEvents">Upcoming Events</h1>
						<div style="padding: 10px">
						
					</div>
					</div>
				</div>
				<!--end left hand side-->
				
				
				<div id="odu_landingRhs" class="odu_landingRhs">
					<div id="odu_SyllabusWrapper" class="wrapper">
						<h1 class="syllabus">Syllabus</h1>
						
					</div>

					<div id="odu_ModulesWrapper" class="wrapper">
						<h1 class="modules">Modules</h1>
							
					</div>

					
				

				</div>						
				<div class="clearFix"></div>
			</div>
		<div id="footer" class="footer"></div>
	</body>
</html>
