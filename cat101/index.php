<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>


<!doctype html>
<html>
	<head>
		<?php writeCourseDashboardHead(""); ?>
		<link href='../calendar/fullcalendar.css' rel='stylesheet' />
		<style>
			.fc-center h2{ font-size: 1.4em; }
			.fc-time {display: none; }
			.fc-title, .fc-day-number {font-size: .7rem;}
			#eventContent{ z-index: 999; }
		</style>
		
		
		<script src='../calendar/lib/moment.min.js'></script>
		<script src='../scripts/js/bootstrapmodal.min.js'></script>	
		<script src='../calendar/lib/jquery.min.js'></script>		
		<script src="../scripts/js/jquery-ui.min.js"></script>
		<script src='../calendar/fullcalendar.min.js'></script>
		
		
		<script>
		$(document).ready(function(){
			populateCourse("json/kitten.json");
			populateSchedule("json/kitten.json");

			var $el, $ps, $up, totalHeight;

			$(".upcomingAssignment .button").click(function() {
			      
			  totalHeight = 0

			  $el = $(this);
			  $p  = $el.parent();
			  $up = $p.parent();
			  $ps = $up.find("p:not('.readMore')");
			  
			  // measure how tall inside should be by adding together heights of all inside paragraphs (except read-more paragraph)
			  $ps.each(function() {
			    totalHeight += $(this).outerHeight();
			  });
			        
			  $up
			    .css({
			      // Set height to prevent instant jumpdown when max height is removed
			      "height": $up.height(),
			      "max-height": 9999
			    })
			    .animate({
			      "height": totalHeight
			    });
			  
			  // fade out read-more
			  $p.fadeOut();
			  
			  // prevent jump-down
			  return false;
			    
			});
			

			
			});
		
		function populateCourse(url) {
			$.ajax({	
		        url: url
		    }).done(function(obj) {
		    	setDocumentTitle(obj);
				setTop(obj);
				setCourseContent(obj);

			});
		};

		function populateSchedule(url) {
			$.ajax({	
		        url: url
		    }).done(function(obj) {
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
				        	element.find(".fc-title").prepend("<i class='fa fa-" + event.icon + "'></a>");
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
		<?php writeTop("", "", "", ""); ?>
		
		<div class="contentWrapper">		
			
		
			<div class="scheduleContentWrapper">
				<?php writeDashWidgetTitle("Schedule At a Glance"); ?>
				<div id='calendar'></div>
				<a href="schedule.php">Full Schedule</a>
		
				<?php writeDashWidgetTitle("Upcoming Assignments")?>
				
				<div id="" class="upcomingAssignment">	
					<div id="" class="upcomingAssignmentDateWrapper">
						<h2>Jan</h2>
						<h1>18</h1>
						<h3>11:59pm</h3>				
					</div>
					
					<h3>Assignment Title Here</h3>
					<div id="" class="upcomingAssignmentDeliverable">Deliverable Here</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>										
					<p class="readMore"><a href="#" class="button">Read More</a></p>
				</div>
					
				
	
				<a href="assignments.php">Full Assignment List</a>
		
		
		
		
			</div>
			
			<div class="courseContentWrapper">
				<?php writeDashWidgetTitle("Course Content"); ?>
				<div id="courseContent"></div>
			</div>
		
		</div>
		
		
		
		<!-- modal -->
		<?php writeCalendarModal() ?>
	</body>
</html>
