<?php include_once 'scripts/mockupFunctions.php' ?>
<?php include_once 'scripts/globalVariables.php' ?>


<!doctype html>
<html>
	<head>
		<?php includeCsss() ?>
		<link href='calendar/fullcalendar.css' rel='stylesheet' />
		<link href='css/courseDashboard.css' rel='stylesheet'/>

		<?php includeScripts() ?>
		<script src='calendar/lib/moment.min.js'></script>	
		<script src='calendar/fullcalendar.min.js'></script>
		<style>
			.fc-time{
				display : none;
			}
			.fc-day-number{
				font-size: .7rem;
			}
		</style>

		
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
				
				$('#calendar').fullCalendar({
				    events: getEventsAtAGlance(obj),
				    height: 420,
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
				        	//element.find(".fc-title").prepend("<i class='material-icons md-small'>" + event.icon + "</i></a>");
				        	element.find(".fc-title").prepend("<i class='material-icons md-m'>" + event.icon + "</i></a>");

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
				            $("#eventContent").dialog({ modal: false, width:500});

				        });
				    }
				});

			});
		};
		</script>

	</head>
	
	<body>
		<div class="top"><?php writeTopHTML() ?></div>
	
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



		<div id="poop"></div>


	</body>
</html>
