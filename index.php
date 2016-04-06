<?php include_once 'scripts/mockupFunctions.php' ?>
<?php include_once 'scripts/globalVariables.php' ?>


<!doctype html>
<html>
	<head>
		<?php includeCsss() ?>
		<link href="css/calendar/fullcalendar.min.css" rel="stylesheet" />
		<link href="css/calendar/odu_calendar.css" rel="stylesheet" />
		<link href="css/messages.css" rel="stylesheet"/>
		<link href="css/courseDashboard.css" rel="stylesheet"/>
		<link href="css/pnotify.custom.css" rel="stylesheet"/>

		<?php includeScripts() ?>
		<script src="scripts/js/utils.js"></script>
		<script src="scripts/js/moment.min.js"></script>	
		<script src="scripts/js/calendar/fullcalendar.min.js"></script>
		<script src="scripts/js/calendar/odu_calendar.js"></script>
		<script src="scripts/js/pnotify.custom.js"></script>
	

		<script>
		$(document).ready(function(){

			var scheduleUrl = "schedule.php";
			writeSmallCalendar("sampleJson/sampleCalendarEvents.json", scheduleUrl);



			
			makeCourseDashboard("cat101/json/kitten.json");
			displayChecksForCompletedAssignments("cat101/json/courseStatus.json");
			
			new PNotify({
				title: 'New Thing',
				text: 'Just to let you know, something happened and it was a notice.',
				hide: false
			});
			new PNotify({
				title: 'New Thing',
				text: 'Just to let you know, something happened and it was some info.',
				type: 'info',
				hide: false				
			});
			new PNotify({
				title: 'New Thing',
				text: 'Just to let you know, something happened and it was a success.',
				type: 'success',
				hide: false
			});
			new PNotify({
				title: 'New Thing',
				text: 'Just to let you know, something happened and it was an error.',
				type: 'error',
				hide: false
			});
			
			
			
			
			});
		
		function makeCourseDashboard(url) {
			$.ajax({	
		        url: url
		    }).done(function(obj) {
		    	setTop(obj);
		    	$("#courseContent").html(writeCourseContent(flattenCourse(obj)));

		    	//in production, do this programmatically
				$("#title_1209").click(function(){
					$("#title_1209").toggleClass("marginBottom20");
					$("#moduleContentList_1210").toggleClass("displayNone");
					$("#module_1209_collapsed").toggleClass("displayNone");
					$("#module_1209_expanded").toggleClass("displayNone");	
				});						
				
				$("#title_1").click(function(){
					$("#title_1").toggleClass("marginBottom20");
					$("#moduleContentList_2").toggleClass("displayNone");
					$("#module_1_collapsed").toggleClass("displayNone");
					$("#module_1_expanded").toggleClass("displayNone");	
				});	

				$("#title_21").click(function(){
					$("#title_21").toggleClass("marginBottom20");
					$("#moduleContentList_22").toggleClass("displayNone");
					$("#module_21_collapsed").toggleClass("displayNone");
					$("#module_21_expanded").toggleClass("displayNone");	
				});	
				
				$("#title_42").click(function(){
					$("#title_42").toggleClass("marginBottom20");
					$("#moduleContentList_43").toggleClass("displayNone");
					$("#module_42_collapsed").toggleClass("displayNone");
					$("#module_42_expanded").toggleClass("displayNone");	
				});	

    	
				$('#eventContent').hide();  //modal
				
				

			});
		};
		</script>

	</head>
	
	<body>
		<div class="top"><?php writeTopHTML() ?></div>
	
		<div class="contentWrapper dash" id="dash">
			<div id="announcement" class="odu_msgError"><div class="odu_msgClose" id="close_announcement">X</div>This is a sample error message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aajdshf dsajfkh askjh askjdfskadf kj kjasdhfkjashdfk;j a s a sjkfa asfjksfhak  jsahdf ka kjsfh;askdjh;aksjdh ksa  kjsdfhkasdh f;ksdafh ask haksfkjsdhfk. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</div>
			<div id="announcement1" class="odu_msgSuccess">This is a sample success message.</div>
			<div id="announcement2" class="odu_msgWarning">This is a sample warning message.</div>
			<div id="announcement3" class="odu_msgInfo">This is a sample infomational message.</div>			
		
			<div id="leftHandSide">
				<div id="odu_smallCalendarContainer">
					<div id="odu_smallCalendar"></div>
				</div>
				
				<div id="odu_upcomingEventsContainer">
					<h1>Upcoming Events </h1>
					
					
					<?php for ($i = 1; $i<4; $i++){ ?>
						<div id="assignment_5" class="odu_upcomingEvent">
							<div class="dateTitleWrapper">
								<div class="date">
									Jan
									<h2>18</h2>
									<time>11:59 pm</time>
								</div>
								
								<h3><a href="#">Assignment: A.1 itle Here dfjk  sdkjf sakdjfl ksjdflk dasfj sdljflska jsdkjdlsj</a></h3>
							</div>
							
							<div class="clearFix"></div>
							
							<p id="" class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula</p>
							<a href="#" class="readmore">More ></a>
						</div>
					<?php } ?>
					</div>
				
								
			</div><!-- end left hand side -->
			
			<div id="rightHandSide" class="courseContent">		
				<div id="courseContent"></div>
			</div>

			<div id="footer" class="footer"></div>
		</div>

	</body>
</html>
