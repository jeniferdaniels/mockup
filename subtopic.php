

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
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.4.custom.css">
	<link rel="stylesheet" type="text/css" href="css/calendar/fullcalendar.min.css"  />
	<link rel="stylesheet" type="text/css" href="css/courseHome.css" />
	<link rel="stylesheet" type="text/css" href="css/calendar/odu_calendar.css" />
	<link rel="stylesheet" type="text/css" href="css/upEvents/odu_upEvents.css" />
	<link rel="stylesheet" type="text/css" href="css/moduleList/moduleListStyle.css" />
	<link rel="stylesheet" type="text/css" href="css/pnotify.custom.css" />
	




	
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
<style>		
	.odu_navPrev{
		border: 1px solid red;
		color: orange;
		height: 50px;
		width: 50px;
		position: absolute;
		top: 200px;
		left:0px;
		content: "j";
	}
	.odu_navPrev::before{
		content: "h";
	}
</style>
		<div id="odu_navPrev" class="odu_navPrev"><a href="sdf"></a></div>
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