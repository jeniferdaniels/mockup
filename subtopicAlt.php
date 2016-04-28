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

					//***************************************
					//set page content
					//***************************************
					setTop(obj);
					document.title = getCourseTitle(obj);
					flatCourse = flattenCourse(obj);

					var subtopicId = (typeof $.QueryString["id"] !== undefined) ? $.QueryString["id"] : "3"; //default it to something for now 
					//TODO: make a default id and handle that
					subtopic = getObjectFromArray(flatCourse, "id", subtopicId);					
					parent = getObjectFromArray(flatCourse, "id", subtopic.parent);
					grandParent = getObjectFromArray(flatCourse, "id", parent.parent);
					previous = flatCourse[flatCourse.indexOf(subtopic)-1];
					next = flatCourse[flatCourse.indexOf(subtopic)+1];

					useArrowsForNavigation(previous.url, next.url);
					
					$("#pageTitle").html(subtopic.title);
					$("#content").load("cat101/" + subtopic.content);
					$("#moduleCrumb").html("<a href='index.php'>" + grandParent.displayNumber + ". " + grandParent.title + "</a>");
					$("#topicCrumb").html("<a href='" + parent.url + "'>" + parent.displayNumber + " " + parent.title + "</a>");							
					$("#thisCrumb").html(subtopic.displayNumber + " " + subtopic.title); 
					$("#prev").prop("href", previous.url);
					$("#next").prop("href", next.url);
					
					
					//toolBoxFunctionality();																				
					});// done 
				});//ready
		</script>
	</head>
	
	<body style="margin-top: 140px">
		<div id="popWindow" class="displayNone"><?php writeDummyGlossaryTerms(10)?></div>
	
		<div class="navWrapper">
			<div id="navPrevious" class="navPrevious"><a id="prev" href=""><?php echo(icon("fa", "previous", "e", "")); ?></a></div>
			<div id="navNext" class="navNext"><a id="next" href=""><?php echo(icon("fa", "next", "e", "")); ?></a></div>
		</div>
	
	
		<div class="top" id="top"><?php writeTopHtml(); ?></div>
		

		<div class="odu_breadCrumbWrapper" id="odu_breadCrumbWrapper">
			<nav>
				<ul class="odu_breadCrumbs" id="odu_breadCrumbs">
					<li><a href="index.php">Home</a></li>
					<li id="moduleCrumb"></li>
					<li id="topicCrumb"></li>
					<li id="thisCrumb"></li>
				</ul>
			</nav>
		</div>




		<div class="odu_wrapper" id="odu_wrapper">
			<div class="odu_content" id="odu_content">
				<div class="odu_progressBarWrapper" id="odu_progressBarWrapper"></div>
				<div class="odu_paper" id="odu_paper">
					<div class="fakeEditor" id="fakeEditor"><img src="<?PHP echo WEB_ROOT ?>/images/CKEditorSample.png"></div>
					<?php writeProgressNavBar() ?>
						
						<h1 id="pageTitle"></h1>
					
					<div class="odu_stuff" id="content"></div>
				</div>
			</div>
			
			<div class="odu_toolbox" id="odu_toolbox">
				stuff goes here
			</div>
			
		</div>

		
		<footer class="odu_footer"></footer>

			
			
	</body>
	
</html>