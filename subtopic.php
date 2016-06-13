

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

	<div class="higherBreadCrumbWrapper">
		<ul class="odu_breadCrumbs higherBreadcrumbs" id="odu_breadCrumbs">
			<li>Module Crumb!!!!!!!!!!!!!!</li>
			<li>Topic Crumb</li>
			<li>Subtopic Crumb</li>
		</ul>
	</div>
		
	<!--look into moving this-->
		<div class="navWrapper">
			<div id="navPrevious" class="navPrevious"><a id="prev" href="#"><i class="fa fa-fw fa-angle-left fa-5x "></i></a></div>
			<div id="navNext" class="navNext"><a id="next" href="#"><i class="fa fa-fw fa-angle-right fa-5x "></i>></a></div>
		</div>	
	<!--add later <div id="popWindow" class="displayNone">Glossary</div>-->	
		<div id="errorMsg" class="errorMsg"></div>
		<div id="odu_top" class="odu_top"></div>
		<div id="odu_wrapper" class="odu_wrapper">
			<h1 id="odu_pageTitle" class="odu_pageTitle">Page Title</h1>
						

			
			
			<nav class="odu_toolbox" id="odu_toolbox">
				<ul id="odu_toolboxList" class="odu_toolboxList">
					<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Home</span></a></li>
					<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Syllabus</span></a></li>
					<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Modules</span></a></li>
					<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Calendar</span></a></li>
					<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Ask A Question</span></a></li>
					<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Notes</span></a></li>
					<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Print</span></a></li>
					<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Edit</span></a></li>
					<li><a href="#"><i class="fa fa-2x fa-ban"></i><span>Admin Tools</span></a></li>
				</ul>
			</nav>

			<section id="odu_contentSection" class="odu_contentSection">
				<div id="odu_contentWrapper" class="odu_contentWrapper">
					<div id="odu_content" class="odu_content"></div>
				</div>
			</section>
			
			<div class="clearFix"></div>
			
		</div>

		
		<footer class="odu_footer"></footer>

			
			
	</body>
	
</html>