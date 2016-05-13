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
		<script src="scripts/js/personalization/odu_preferences.js"></script>

		<script>
		$(document).ready(function(){
			
			var announcementsUrl  = "http://ple1.odu.edu:4243/api/announcement;list=user";
			var smallCalendarUrl = "http://ple1.odu.edu:4243/api/calendar/201530/comm270a";
			var preferencesUrl   = "http://ple1.odu.edu:4243/api/preference/201530/comm270a";
			var upEventsUrl      = "http://ple1.odu.edu:4243/api/event/201530/comm270a"; 
		
			//put this in onload file
			function loadDataAndRun(url, funct, msg){
				$.ajax({
					url: url,
					type: 'GET',
					dataType: 'json',
					success: function(data) { funct(data) },
					error: function() { console.log(msg); },
					xhrFields: { withCredentials: true	},
					crossDomain: true
				});
			}
		
			//JMD: for testing, remove in production 
			if (getUrlVars()["noExternal"] == 1){
				announcementsUrl = "sampleJson/sampleAnnouncements.json";
				smallCalendarUrl = "sampleJson/sampleSmallCalendarEvents.json";
				preferencesUrl = "sampleJson/samplePreferences.json";
				upEventsUrl = "sampleJson/sampleUpEvents.json";				
			}

			if (getUrlVars()["noAnn"] != 1){
				loadDataAndRun(announcementsUrl, processNotifications, "There was a problem loading the announcements");			
			}
			//loadDataAndRun(smallCalendarUrl, writeSmallCalendar, "There was an error loading the small calendar events");
			//loadDataAndRun(preferencesUrl, loadPreferences, "There was an error getting the preferences");
			//loadDataAndRun(upEventsUrl, writeUpEvents, "There was a problem loading the upcoming events");
			
			
			
			//displayChecksForCompletedAssignments("cat101/json/courseStatus.json");

			
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
			<main class="odu_landing">
			
				<!--left hand side-->
				<div id="odu_landingLhs" class="odu_landingLhs">
					<section id="odu_smallCalendarSection">
						<h1 class="calendar">Calendar</h1>
						<div id="odu_smallCalendarWrapper" class="wrapper">
							<div id="odu_smallCalendar">Calendar here</div>
						</div>
					</section>
					
					
					<section id="odu_upEventsSection">
						<h1 class="upEvents">Upcoming Events</h1>
						<div id="odu_upEventsWrapper" class="wrapper">
							<div id="odu_upEvents">Upcoming Events here</div>
						</div>
					</section>
				</div>
				<!--end left hand side-->
				
				<!--right hand side-->
				<div id="odu_landingRhs" class="odu_landingRhs">
					
						<section id="odu_iconListSection">
							<ul>
								<li><a href="#" class="assignment"><span>Assignments</span></a></li>
								<li><a href="#" class="announcements"><span>Announcements</span></a></li>
								<li><a href="#" class="faculty"><span>Faculty</span></a></li>
								<li><a href="#" class="glossary"><span>Glossaries</span></a></li>
								<li><a href="#" class="notes"><span>Notes</span></a></li>
								<li><a href="#" class="resources"><span>Resources</span></a></li>
								<li><a href="#" class="syllabus"><span>Syllabus</span></a></li>
							</ul>
						</section>
					

					<section id="odu_moduleListSection">
						<h1 class="moduleList">Modules</h1>
						<div id="odu_moduleListWrapper" class="wrapper">
							<div id="odu_moduleList">module list here</div>
						</div>
					</section>
				</div>
				<!--end right hand side -->


				<div class="clearFix"></div>
			</main>
		<div id="footer" class="footer"></div>
	</body>
</html>
