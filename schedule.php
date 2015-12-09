<?php include_once 'scripts/mockupFunctions.php' ?>
<?php include_once 'scripts/globalVariables.php' ?>
<!doctype html>
<html>
	<head>
		<?php includeCsss() ?>
		<link href='css/fullcalendar.min.css' rel='stylesheet' />
		

		<?php includeScripts() ?>
		<script src='scripts/js/moment.min.js'></script>	
		<script src='scripts/js/fullcalendar.min.js'></script>
		
		<style>
			.fc-center h2{
				font-size: 1.4em;
				margin-left: 100px !important;
				font-family: "Open Sans", Georgia;
			 }

			 .fc-view-container{
			 	border-bottom: 1px solid #AAAAAA;
			 }
			 
			#eventContent{ 
				z-index: 999; 
			}
			#wrapper{
				margin: 150px auto 0;
			}
			
			.ui-icon-odu_left-chevron{
				background-image: url("images/leftChevron.svg") !important;
				background-repeat: no-repeat;
				background-size: 18px 18px;
				height: 18px;
				width: 18px;
			}
			
			.ui-icon-odu_right-chevron{
				background-image: url("images/rightChevron.svg") !important;
				background-repeat: no-repeat;
				background-size: 18px 18px;
				height: 18px;
				width: 18px;
			}
			.ui-state-default{
				border: 1px solid #CCC;
			}
			.ui-state-active{
				border: 1px solid black;
			}
		</style>
		
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
				    editable: true,	
				    height: 770,
				    defaultDate: '2015-01-18',
				    theme: true,
				    header: {
				        left: 'prev',
				        center: 'title',
				        right: 'month,basicWeek, next'
				    },
				    themeButtonIcons: {
						prev: 'odu_left-chevron',
						next: 'odu_right-chevron',
					},    
				    eventRender: function (event, element) {
				        element.attr('href', 'javascript:void(0);');

				      //event has properties: type, title, moduleNumber, start,	end, textColor,	description
				      //if assignment also deliverable, submitVia, icon

				      element.click(function() {
					        $("#modalTitle").html(event.type);
					        $('#modalTitle').css('textTransform', 'capitalize'); //upper case first letter of event type title
							$('#description').html(event.description);
					    	
					        if (event.type == "assignment"){
								$('#eventIcon').show();
								$('#assignmentTitle').html(event.title);
								$('#assignmentProperties').show();
								$('#due').show();
								$('#due').html(moment(event.start).format('MMMM DD, YYYY h:mm A'));
								$('#submitVia').show();
								$('#submitVia').html(event.submitVia);
								$('#deliverable').show();
								$('#deliverable').html(event.deliverable);
								$('#eventDate').hide(); //this is taken care of with the due date for an assignment
								$('#checkmarkWrapper').show();
								//TODO: cross check with list of completed items and mark accordingly	
					        }
					        else{
					        	$("#modalTitle").append(" " + event.moduleNumber);
								$('#eventIcon').hide();	
								$('#assignmentTitle').hide();	
								$('#assignmentProperties').hide();
								$('#eventDate').show();
								$("#eventDate").html(moment(event.start).format('MMMM DD') + ' - ' + moment(event.end).format('MMMM DD, YYYY'));
								$('#checkmarkWrapper').hide();
						   }
					       
				            $("#eventContent").dialog({ modal: false, width:500});

				        });
				    }
				});

				$('.fc-toolbar .fc-right .fc-button-group').prepend(
						$('<button id="scheduleListButton" class="fc-list-button ui-button ui-state-default ui-corner-left ui-state-default" type="button">list</button>'));

				$('#scheduleListButton').hover(function(){
					$('#scheduleListButton').toggleClass("ui-state-default");
					$('#scheduleListButton').toggleClass("ui-state-hover");
				});
				
				$("#editToolListItem").click(function(){				
					$("body").toggleClass("editingMode");
					$('#calendar').fullCalendar('editable', true);
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
						<h1 id="pageTitle">Schedule</h1>
						<div id="calendar"></div>
						<div id="jsonThingy"></div>
					</div>					
				</div>
				
				
				
				<div id="toolBox"><?php writeTools(false, false, false, true) ?></div>
				<div id="footer" class="footer"></div>
			</div>
		
		
		
		<!-- modal -->
		<?php writeCalendarModal() ?>
		
	</body>
</html>
