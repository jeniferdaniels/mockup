<?php include_once 'scripts/mockupFunctions.php' ?>
<?php include_once 'scripts/globalVariables.php' ?>
<!doctype html>
<html>
	<head>
		<?php  includeCsss (); ?>
		<?php  includeScripts (); ?>
					
		<link href='calendar/fullcalendar.css' rel='stylesheet' />
		<link href='calendar/fullcalendar.print.css' rel='stylesheet' media='print' />		
		<style>
			.fc-center h2{ font-size: 1.4em; }
			#eventContent{ z-index: 999; }
		</style>


		<script src='calendar/lib/moment.min.js'></script>
		<script src='scripts/js/bootstrapmodal.min.js'></script>	
		<script src='calendar/lib/jquery.min.js'></script>		
		<script src="scripts/js/jquery-ui.min.js"></script>
		<script src='calendar/fullcalendar.min.js'></script>
		

		<script>
		$(document).ready(function(){
			populateSchedule("cat101/json/kitten.json");
			});
		
		function populateSchedule(url) {
			$.ajax({	
		        url: url
		    }).done(function(obj) {
		    	setDocumentTitle(obj);
				setTop(obj);
				$('#eventContent').hide();
				$('#calendar').fullCalendar({
				    events: getEvents(obj),
				    height: 750,
				    defaultDate: '2015-01-18',
				    header: {
				        left: 'prev',
				        center: 'title',
				        right: 'month,basicWeek,basicDay, next'
				    },		    
				    eventRender: function (event, element) {
				        element.attr('href', 'javascript:void(0);');
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
		<div class="top" id="top"><?php writeTopHtml(); ?></div>
			<div class="breadCrumbWrapper" id="breadCrumbWrapper">
			<nav>
				<ul class="breadCrumbs" id="breadCrumbs">
					<li><a href="index.php">Home</a></li>
					<li id="thisCrumb">Schedule</li>
				</ul>
			</nav>
		</div>
		
		
		
			<div class="wrapper">
				<div id="courseMaterial">
					<div class="paper">
						<h2 id="pageTitle">Schedule</h2>
						<div id="calendar"></div>
					</div>					
				</div>
				
				
				
				<div id="toolBox"><?php writeTools(false, false, false, true) ?></div>
				<div id="footer" class="footer"></div>
			</div>
		
		
		
		<!-- modal -->
		<?php writeCalendarModal() ?>
		
	</body>
</html>
