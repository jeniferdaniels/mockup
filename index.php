<?php include_once 'scripts/mockupFunctions.php' ?>



<!doctype html>
<html>
	<head>
		<?php includeCsss() ?>
		<link rel="stylesheet" href="css/calendar/fullcalendar.min.css"  />
		<link rel="stylesheet" href="css/courseHome.css" />
		<link rel="stylesheet" href="css/calendar/odu_calendar.css" />
		<link rel="stylesheet" href="css/upEvents/odu_upEvents.css" />
		<link rel="stylesheet" href="css/moduleList/moduleListStyle.css" />
		<link rel="stylesheet" href="css/pnotify.custom.css" />
		<link href="https://file.myfontastic.com/mANwL9MeuPjGTDYjGjCNGA/icons.css" rel="stylesheet">
	
		
		
		<?php includeScripts() ?>
		<script type="text/javascript" src="scripts/js/utils.js"></script>
		<script type="text/javascript" src="scripts/js/moment.min.js"></script>	
		<script type="text/javascript" src="scripts/js/calendar/fullcalendar.min.js"></script>
		<script type="text/javascript" src="scripts/js/calendar/odu_calendar.js"></script>
		<script type="text/javascript" src="scripts/js/upEvents/odu_upEvents.js"></script>
		<script type="text/javascript" src="scripts/js/pnotify.custom.js"></script>
		<script type="text/javascript" src="scripts/js/messages/odu_messages.js"></script>
		<script type="text/javascript" src="scripts/js/personalization/odu_preferences.js"></script>
		<script type="text/javascript" src="scripts/js/moduleList/odu_moduleList.js"></script>
		<script type="text/javascript" src="scripts/js/odu_basicContent.js"></script>

		<script type="text/javascript">
		$(document).ready(function(){
			
			var announcementsUrl  = "http://ple1.odu.edu:4243/api/announcement;list=user";
			var smallCalendarUrl = "http://ple1.odu.edu:4243/api/calendar/201530/comm270a";
			//var preferencesUrl   = "http://ple1.odu.edu:4243/api/preference/201530/comm270a";
			var upEventsUrl      = "http://ple1.odu.edu:4243/api/event/201530/comm270a"; 
			var moduleListUrl      = "http://ple1.odu.edu:4243/api/modulenavigation/201530/comm270a"; 
		
			//put this in onload file
			//JMD: for testing, remove in production 
			if (getUrlVars()["noExternal"] == 1){
				announcementsUrl = "sampleJson/sampleAnnouncements.json";
				smallCalendarUrl = "sampleJson/sampleSmallCalendarEvents.json";
				//preferencesUrl = "sampleJson/samplePreferences.json";
				upEventsUrl = "sampleJson/sampleUpEvents.json";				
				moduleListUrl      = "sampleJson/sampleModuleListForNav.json"; 
			}

			
			//announcements
			if (getUrlVars()["noAnn"] != 1){
				$.ajax({
					url: announcementsUrl,
					type: 'GET',
					dataType: 'json',
					success: function(data) { processNotifications(data) },
					error: function() { console.log("There was a problem loading the announcements"); },
					xhrFields: { withCredentials: true	},
					crossDomain: true
				});//.done(function (data, status, jqXHR) {
				//	console.log(data);
				//});
			}
			
			//small calendar
			$.ajax({
				url: smallCalendarUrl,
				type: 'GET',
				dataType: 'json',
				success: function(data) { writeSmallCalendar(data) },
				error: function() { console.log("There was an error loading the small calendar events"); },
				xhrFields: { withCredentials: true	},
				crossDomain: true
			});
				
			//moduleList  
			$.ajax({
				url: moduleListUrl,
				type: 'GET',
				dataType: 'json',
				//format list after it has loaded.
				success: function(data) { writeModuleList(data, "moduleList", "odu_moduleList"); formatList("moduleList"); },
				error: function() { console.log("There was an error loading moduleList"); },
				xhrFields: { withCredentials: true	},
				crossDomain: true
			});

			//upcoming events
			$.ajax({
				url: upEventsUrl,
				type: 'GET',
				dataType: 'json',
				success: function(data) { writeUpEvents(data, "odu_upEventsWrapper") },
				error: function() { console.log("There was an error loading moduleList"); },
				xhrFields: { withCredentials: true	},
				crossDomain: true
			});
			var dummy = { "course_title": "Fluid Mechanics Cats", "course_number": "270a",  "course_subject": "COMM",  "semester_display": "Summer 2016", "faculties": [  { "preferred_name": "Gabe Miracle", "email": "grodrigu@odu.edu"  }, { "preferred_name": "J Daniels Cat", "email": "jdaniels@odu.edu" }]};	
			writePageHeader("#top", dummy);
			
		});
		
		
		</script>

	</head>
	
	<body>
		<div id="top" class="top"></div>

			<div id="odu_wrapper" class="odu_wrapper">
				<main class="odu_courseHome">
				
					<!--left hand side-->
					<div id="odu_courseHomeLhs" class="odu_courseHomeLhs">
						<section id="odu_smallCalendarSection">
							<h1 class="odu_sectionH1 calendar">Calendar</h1>
							<div id="odu_smallCalendarWrapper" class="wrapper">
								<div id="odu_smallCalendar"></div>
							</div>
						</section>
						
						
						<section id="odu_upEventsSection">
							<h1 class="odu_sectionH1 upEvents">Upcoming Events</h1>
							<div id="odu_upEventsWrapper" class="wrapper"></div>
						</section>
					</div>
					<!--end left hand side-->
					
					<!--right hand side-->
					<div id="odu_courseHomeRhs" class="odu_courseHomeRhs">
						
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
							<h1 class="odu_sectionH1 moduleList">Modules</h1>
							<div id="odu_moduleListWrapper" class="wrapper">
								<div id="odu_moduleList"></div>	<!--expecting id=moduleList for list inside for css-->
							</div>
						</section>
					</div>
					<!--end right hand side -->


					<div class="clearFix"></div>
				</main>
			</div>
		<div id="footer" class="footer"></div>
	</body>
</html>
