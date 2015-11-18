<?php include_once 'scripts/mockupFunctions.php' ?>
<?php include_once 'scripts/globalVariables.php' ?>
<?php $subtopicId = (isset($_REQUEST['id'])? $_GET["id"] : "3");?>

<!doctype html>
<html>
	<head>
		<?php  includeCsss (); ?>
		<?php  includeScripts (); ?>
		
		<script>
			$(document).ready(function(){
				$.ajax({
					url: "cat101/json/kitten.json"
				}).done(function(obj) {
					setTop(obj);
					document.title = getCourseTitle(obj);
					flatCourse = flatten(obj);

					var topicId = (typeof $.QueryString["id"] !== undefined) ? $.QueryString["id"] : "3"; //default it to something for now 
					//TODO: make a default id and handle that
					topic = getObjectFromArray(flatCourse, "id", topicId);
					topicIndex = flatCourse.indexOf(topic);
										
					parent = getObjectFromArray(flatCourse, "id", topic.parent);
					previous = flatCourse[topicIndex-1];
					next = flatCourse[topicIndex+1];

					useArrowsForNavigation(previous.url, next.url);
					
					$("#pageTitle").html(topic.title);
					$("#subtopicList").html(writeSubtopicList(getSubtopics(flatCourse, topicIndex))); 
					$("#moduleCrumb").html("<a href='index.php'>" + parent.displayNumber + ". " + parent.title + "</a>");
					$("#thisCrumb").html(topic.displayNumber + " " + topic.title); 
					$("#prev").prop("href", previous.url);
					$("#next").prop("href", next.url);					
					});
				});
		</script>
	</head>
	
	<body>
		<div class="navWrapper">
			<div id="navPrevious" class="navPrevious"><a id="prev" href=""><?php echo(icon("fa", "previous", "e", "")); ?></a></div>
			<div id="navNext" class="navNext"><a id="next" href=""><?php echo(icon("fa", "next", "e", "")); ?></a></div>
		</div>
	
	
		<div class="top"><?php writeTopHtml(); ?></div>
		

		<div class="breadCrumbWrapper">
			<nav>
				<ul class="breadCrumbs">
					<li><a href="index.php">Home</a></li>
					<li id="moduleCrumb"></li>
					<li id="thisCrumb"></li>
				</ul>
			</nav>
		</div>



			<div class="wrapper">
				<div id="courseMaterial">
					<h2 id="pageTitle"></h2>
					<div id="content">In this topic you will learn the following:
						<ul id="subtopicList" class="subtopicList"></ul>
					</div>
				</div>
				<div id="tools"><?php writeTools(false, false, true, false) ?></div>
				<div id="footer" class="footer"></div>
			</div>
	</body>
</html>