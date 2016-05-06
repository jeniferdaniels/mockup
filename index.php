<?php include_once 'scripts/mockupFunctions.php' ?>



<!doctype html>
<html>
	<head>
		<?php includeCsss() ?>
		<link rel="stylesheet" href="css/calendar/fullcalendar.min.css"  />
		<link rel="stylesheet" href="css/courseLandingStyle.css" />
		<link rel="stylesheet" href="css/calendar/odu_calendar.css" />
		<link rel="stylesheet" href="css/upEvents/odu_upEvents.css" />
		<link rel="stylesheet" href="css/moduleList/moduleListStyle.css" />
		<link rel="stylesheet" href="css/pnotify.custom.css" />

		
		
		<?php includeScripts() ?>
		<script src="scripts/js/utils.js"></script>
		<script src="scripts/js/moment.min.js"></script>	
		<script src="scripts/js/calendar/fullcalendar.min.js"></script>
		<script src="scripts/js/calendar/odu_calendar.js"></script>
		<script src="scripts/js/upEvents/odu_upEvents.js"></script>
		<script src="scripts/js/pnotify.custom.js"></script>
		<script src="scripts/js/messages/odu_messages.js"></script>

		<script>
		$(document).ready(function(){

			//preferences
			//PREFS can be globally accessible and used as ie: alert(PREFS['calendar']);...alert(PREFS['events']);
			PREFS = new Array();
			$.ajax({
				url: 'http://ple1.odu.edu:4243/api/preference/201530/comm270a',
				type: 'GET',
				dataType: 'json',
				success: function(data) { 
					for (i = 0; i < data.length; ++i) {
						PREFS[data[i].name] = data[i].value;						
					}
				},
				error: function() { console.log("There was an error getting the CalendarEvents"); },
				xhrFields: { withCredentials: true	},
				crossDomain: true
			});
			
			//calendar
			$.ajax({
				url: 'http://ple1.odu.edu:4243/api/calendar/201530/comm270a',
				type: 'GET',
				dataType: 'json',
				success: function(data) { writeSmallCalendar(data)},
				error: function() { console.log("There was an error getting the CalendarEvents"); },
				xhrFields: { withCredentials: true	},
				crossDomain: true
			});
			
			
			//upcoming events
			$.ajax({
				url: 'http://ple1.odu.edu:4243/api/event/201530/comm270a',
				type: 'GET',
				dataType: 'json',
				success: function(data) { writeUpEvents(data)},
				error: function() { console.log("There was an error getting the upcomingEvents"); },
				xhrFields: { withCredentials: true	},
				crossDomain: true
			});
			
			
			
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
			
			//LAZY
			$("#title_1209").click(function(){
				$("#moduleContentList_1210").toggle();
				$("#title_1209").toggleClass("marginBottom20");
			});
			$("#title_1").click(function(){
				$("#moduleContentList_2").toggle();
				$("#title_1").toggleClass("marginBottom20");

			});
			$("#title_21").click(function(){
				$("#moduleContentList_22").toggle();
				$("#title_21").toggleClass("marginBottom20");
			});
			$("#title_42").click(function(){
				$("#moduleContentList_43").toggle();
				$("#title_42").toggleClass("marginBottom20");
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
					<div id="odu_smallCalendarContainer" class="wrapper">
						<h1 class="calendar" id="odu_smallCalendarHeader">Calendar</h1>
						<div id="odu_smallCalendar"></div>
					</div>
					
					<div id="odu_upEventsContainer" class="wrapper">
						<h1 class="upEvents">Upcoming Events</h1>
						<div style="odu_upEventsWrapper" id="odu_upEventsWrapper"></div>
					</div>
				</div>
				<!--end left hand side-->
				
				
				<div id="odu_landingRhs" class="odu_landingRhs">
					<div id="odu_SyllabusContainer" class="wrapper">
						<h1 class="syllabus">Syllabus</h1>
						
					</div>

					<div id="odu_ModulesContainer" class="wrapper">
						<h1 class="modules">Modules</h1>
						<div id="odu_modulesWrapper"><?PHP writeModuleList() ?></div>
					</div>

					
				

				</div>						
				<div class="clearFix"></div>
			</div>
		<div id="footer" class="footer"></div>
	</body>
</html>
