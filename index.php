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
		<!--<link rel="stylesheet" href="css/moduleList/collapsible-tree-theme.css" />-->

		
		
		<?php includeScripts() ?>
		<script src="scripts/js/utils.js"></script>
		<script src="scripts/js/moment.min.js"></script>	
		<script src="scripts/js/calendar/fullcalendar.min.js"></script>
		<script src="scripts/js/calendar/odu_calendar.js"></script>
		<script src="scripts/js/upEvents/odu_upEvents.js"></script>
		<script src="scripts/js/pnotify.custom.js"></script>
		<script src="scripts/js/messages/odu_messages.js"></script>
		<script src="scripts/js/personalization/odu_preferences.js"></script>
		<script src="scripts/js/moduleList/odu_moduleList.js"></script>
		<script src="scripts/js/moduleList/jquery.ntm.js"></script>		

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
				//preferencesUrl = "sampleJson/samplePreferences.json";
				upEventsUrl = "sampleJson/sampleUpEvents.json";				
			}

			if (getUrlVars()["noAnn"] != 1){
				loadDataAndRun(announcementsUrl, processNotifications, "There was a problem loading the announcements");			
			}
			loadDataAndRun(smallCalendarUrl, writeSmallCalendar, "There was an error loading the small calendar events");
			loadDataAndRun(preferencesUrl, loadPreferences, "There was an error getting the preferences");
			loadDataAndRun(upEventsUrl, writeUpEvents, "There was a problem loading the upcoming events");
			
			//$(".demo").ntm();
			
			//displayChecksForCompletedAssignments("cat101/json/courseStatus.json");

			
			$("#odu_smallCalendarHeader").click(function(){
				$("#odu_smallCalendar").toggle();						
			});
			
			
			
		});
		
		
		</script>
	
		<style>
			#odu_moduleList div#tree-menu.tree-menu.demo ul{
				list-style-type: none !important;
				color: black;
				
			}
			#odu_moduleList div#tree-menu.tree-menu.demo ul a{
				color: black;
				
			}
		</style>
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
							<div id="odu_smallCalendar"></div>
						</div>
					</section>
					
					
					<section id="odu_upEventsSection">
						<h1 class="upEvents">Upcoming Events</h1>
						<div id="odu_upEventsWrapper" class="wrapper">
							<div id="odu_upEvents"></div>
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
							<div id="odu_moduleList">
							<div id="tree-menu" class="tree-menu demo">
							
								<ul><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 0 Overview and Course Logistics</a><ul><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 0.1 Welcome</a><ul><li><a href="#">0.1.0 Introduction</a></li><li><a href="#">0.1.1 Online Learning Orientation</a></li><li><a href="#">0.1.2 Technical Support</a></li></ul></li><li><a href="#">0.2 Summary</a></li><li><a href="#">0.R Resources</a></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 0.A Assignments</a><ul><li><a href="#">0.A.1 Send Test Email</a></li><li><a href="#">0.A.2 Module Feedback</a></li></ul></li></ul></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 1 Kitten Acquisition!</a><ul><li><a href="#">1.1 Overview</a></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 1.2 Factors to Consider When Choosing a Kitten</a><ul><li><a href="#">1.2.2 Responsibility</a></li><li><a href="#">1.2.3 Cost</a></li></ul></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 1.3 Kitten Rescue</a><ul><li><a href="#">1.3.1 Reasons to Rescue</a></li><li><a href="#">1.3.2 Hampton Roads Rescue Organizations</a></li></ul></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 1.4 Purchasing a Kitten</a><ul><li><a href="#">1.4.1 Reasons to Purchase A Kitten</a></li><li><a href="#">1.4.2 Where to Buy</a></li></ul></li><li><a href="#">1.5 Summary</a></li><li><a href="#">1.R Resources</a></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 1.A Assignments</a><ul><li><a href="#">1.A.1 Homework #1</a></li><li><a href="#">1.A.2 Discussion Forum #1</a></li><li><a href="#">1.A.3 Quiz #1</a></li><li><a href="#">1.A.4 Module Feedback</a></li></ul></li></ul></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 2 Caring for Your Kitten</a><ul><li><a href="#">2.1 Overview</a></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 2.2 Bringing Your Kitten Home</a><ul><li><a href="#">2.2.2 Transporting our Kitten</a></li><li><a href="#">2.2.3 Preparing the House</a></li></ul></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 2.3 Feeding and Grooming</a><ul><li><a href="#">2.3.1 Feeding Guidelines</a></li><li><a href="#">2.3.2 Grooming</a></li></ul></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 2.4 Entertaining</a><ul><li><a href="#">2.4.1 Toys</a></li><li><a href="#">2.4.2 Cat Nip</a></li><li><a href="#">2.4.3 Other Pets</a></li></ul></li><li><a href="#">2.5 Summary</a></li><li><a href="#">2.R Resources</a></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 2.A Assignments</a><ul><li><a href="#">2.A.1 Homework #2</a></li><li><a href="#">2.A.2 Discussion Forum #2</a></li><li><a href="#">2.A.3 Homework #3</a></li><li><a href="#">2.A.4 Module Feedback</a></li></ul></li></ul></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 3 Legal Requirements</a><ul><li><a href="#">3.1 Overview</a></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 3.2 Vaccinations</a><ul><li><a href="#">3.2.1 Initial</a></li><li><a href="#">3.2.2 Rabies</a></li></ul></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 3.3 City Regulations</a><ul><li><a href="#">3.3.1 Licensing</a></li><li><a href="#">3.3.2 Leash Laws</a></li><li><a href="#">3.3.3 Maximum Occupancy</a></li></ul></li><li><a href="#">3.4 Summary</a></li><li><a href="#">3.R Resources</a></li><li><a href="#"><i class="fa fa-caret-down fa-lg"></i> 3.A Assignments</a><ul><li><a href="#">3.A.1 Homework #4</a></li><li><a href="#">3.A.2 Discussion Forum #3</a></li><li><a href="#">3.A.3 Final Exam</a></li><li><a href="#">3.A.4 Module Feedback</a></li></ul></li></ul></li></ul>
								
								
								
								
								
								</div>
							</div>
						</div>
					</section>
				</div>
				<!--end right hand side -->


				<div class="clearFix"></div>
			</main>
		<div id="footer" class="footer"></div>
	</body>
</html>
