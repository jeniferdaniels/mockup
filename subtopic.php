

<!doctype html>
<html>
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<title>XXXXX:XXXXX</title>
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/pleStyle.css">	
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" >
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<link rel="stylesheet" type="text/css" href="css/navArrowStyle.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.4.custom.css">
	<link rel="stylesheet" type="text/css" href="css/calendar/fullcalendar.min.css"  />
	<link rel="stylesheet" type="text/css" href="css/courseHome.css" />
	<link rel="stylesheet" type="text/css" href="css/courseHome.css" />
	<link rel="stylesheet" type="text/css" href="css/calendar/odu_calendar.css" />
	<link rel="stylesheet" type="text/css" href="css/upEvents/odu_upEvents.css" />
	<link rel="stylesheet" type="text/css" href="css/moduleList/moduleListStyle.css" />
	<link rel="stylesheet" type="text/css" href="css/pnotify.custom.css" />
	
	<script type="text/javascript" src="scripts/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="scripts/js/jquery-ui.min.js"></script>
	<!--<script type="text/javascript" src="<!-- string::webdir_assets --><!--js/_odu/courseFunctions.js"></script>	-->	
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


	<script type="text/javascript" src="scripts/js/onLoad.js"></script>
	<script>
		$(document).ready(function(){		
			//string is formatted /courses/201502/cat101/
			tempCoursePath = "/courses/201402/bnal206/".split("/"); //kludge to simulate special string in template.html on ple system
			tempCourseNumber = tempCoursePath[tempCoursePath.length-2];	//-2 because its the second to last item in the array due to the / at the end
			dummy = getCourseAttributes(tempCourseNumber);

			$(document.body).promise().done(function(){	//idfk this works
				writePageHeader("#odu_top", dummy);

			})
			.then(function(){  

			});
		});
	</script>
	
	</head>
	
	<body>
		<div id="errorMsg" class="errorMsg"></div>
		<!--add later <div id="popWindow" class="displayNone">Glossary</div>-->
	
		<div class="navWrapper">
			<div id="navPrevious" class="navPrevious"><a id="prev" href="#"><i class="fa fa-fw fa-angle-left fa-5x "></i></a></div>
			<div id="navNext" class="navNext"><a id="next" href="#"><i class="fa fa-fw fa-angle-right fa-5x "></i>></a></div>
		</div>
	
	
		<div class="odu_top" id="odu_top"></div>
		

		<div class="odu_wrapper" id="odu_wrapper">
			<h1 id="pageTitle">Page Title</h1>
			
			
			
			
			
			
			<div class="odu_breadCrumbWrapperAlt">
				<nav>
					<ul class="odu_breadCrumbs" id="odu_breadCrumbs">
						<li id="moduleCrumb">Module Crumb</li>
						<li id="topicCrumb">Topic Crumb</li>
						<li id="subTopicCrumb">Subtopic Crumb</li>
					</ul>
				</nav>
			</div>
			
			<div class="odu_toolbox odu_toolboxAlt" id="odu_toolbox">
				<div id="odu_toolboxAlt" class="odu_toolboxAlt">
					<ul id="odu_toolsAlt" class="odu_toolsAlt">
						<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Home</span></a></li>
						<li><a href=="#"><i class="fa fa-2x fa-ban"></i><span>Syllabus</span></a></li>
						<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Modules</span></a></li>
						<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Calendar</span></a></li>
						<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Ask A Question</span></a></li>
						<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Notes</span></a></li>
						<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Print</span></a></li>
						<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Edit</span></a></li>
						<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Admin Tools</span></a></li>
						</ul>
					</div>
				</div>
			<div class="odu_content odu_contentAlt" id="odu_content">
				<div class="odu_paper" id="odu_paper">
					<div class='odu_progressNavBar'>
						<a href='#'></a>
						<a href='#'></a>
						<a href='#'></a>
						<a href='#'></a>
						<a href='#'></a>
						<a href='#'></a>
						<a href='#' class='new'></a>
						<a href='#' class='new'></a>
						<a href='#' class='new'></a>
						<a href='#' class='new'></a>
						<a href='#' class='new'></a>
						<a href='#' class='new'></a>
						<a href='#' class='new'></a>
						<a href='#' class='new'></a>
					</div>
					
					<div class="odu_stuff" id="content">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique. 
					</div>
				</div>
			</div>
			
			
			
		</div>

		
		<footer class="odu_footer"></footer>

			
			
	</body>
	
</html>