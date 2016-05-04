<?php include_once 'scripts/mockupFunctions.php' ?>



<!doctype html>
<html>
	<head>
		<?php includeCsss() ?>
		<link rel="stylesheet" href="css/courseLandingStyle.css" />
		<link rel="stylesheet" href="css/pnotify.custom.css" />

		<?php includeScripts() ?>
		<script src="scripts/js/utils.js"></script>
		<script src="scripts/js/moment.min.js"></script>	
		<script src="scripts/js/calendar/fullcalendar.min.js"></script>
		<script src="scripts/js/calendar/odu_calendar.js"></script>
		<script src="scripts/js/pnotify.custom.js"></script>
		<script src="scripts/js/messages/odu_messages.js"></script>


	</head>
	
	<body>
		<div id="top"></div>

		<header></header>
		<div id="odu_wrapper" class="odu_wrapper">
			<div id="odu_landingContent" class="odu_landingContent">
				<div id="odu_landingLhs" class="odu_landingLhs">
					
					<div id="odu_calendarWrapper" class="wrapper">
						<h1 class="calendar">Calendar</h1>
						
					</div>
					
					<div id="odu_upEventsWrapper" class="wrapper">
						<h1 class="upEvents">Upcoming Events</h1>
						
					</div>
				</div>
				
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
