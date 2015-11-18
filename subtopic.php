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
					$("#topicCrumb").html("<a href='index.php'>" + parent.displayNumber + " " + parent.title + "</a>");
					$("#thisCrumb").html(subtopic.displayNumber + " " + subtopic.title); 
					$("#prev").prop("href", previous.url);
					$("#next").prop("href", next.url);

					$("#editLink").click(function(){		
							$("body").toggleClass("editingMode");			
						}); //edit link										
					});// done 
				});//ready
		</script>
	</head>
	
	<body>
	
		<div class="navWrapper">
			<div id="navPrevious" class="navPrevious"><a id="prev" href=""><?php echo(icon("fa", "previous", "e", "")); ?></a></div>
			<div id="navNext" class="navNext"><a id="next" href=""><?php echo(icon("fa", "next", "e", "")); ?></a></div>
		</div>
	
	
		<div class="top" id="top"><?php writeTopHtml(); ?></div>
		

		<div class="breadCrumbWrapper" id="breadCrumbWrapper">
			<nav>
				<ul class="breadCrumbs" id="breadCrumbs">
					<li><a href="index.php">Home</a></li>
					<li id="moduleCrumb"></li>
					<li id="topicCrumb"></li>
					<li id="thisCrumb"></li>
				</ul>
			</nav>
		</div>



			<div class="wrapper">
				<div class="fakeEditor" id="fakeEditor"><img src="/mockups/images/CKEditorSample.png"></div>
				<div id="courseMaterial">
					<h2 id="pageTitle"></h2>
					<div id="content"></div>
				</div>
				<div id="toolBox"><?php writeTools(true, true, true, true) ?></div>
				<div id="footer" class="footer"></div>
			</div>
	</body>
	
</html>