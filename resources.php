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
					
					var resourceId = (typeof $.QueryString["id"] !== undefined) ? $.QueryString["id"] : "3"; //default it to something for now 
					//TODO: make a default id and handle that
					resource = getObjectFromArray(flatCourse, "id", resourceId);
					resourceIndex = flatCourse.indexOf(resource);
										
					parent = getObjectFromArray(flatCourse, "id", resource.parent);
					previous = flatCourse[resourceIndex-1];
					next = flatCourse[resourceIndex+1];

					useArrowsForNavigation(previous.url, next.url);
					
					$("#pageTitle").html(resource.title);
					$("#content").html("resource table goes here");					 
					$("#moduleCrumb").html("<a href='#'>" + parent.displayNumber + ". " + parent.title + "</a>");
					$("#thisCrumb").html(resource.displayNumber + " " + resource.title); 
					$("#prev").prop("href", previous.url);
					$("#next").prop("href", next.url);	

					console.log("next" + next.title + " " + next.url + "id " + next.id);				
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
					<div id="content"></div>			
				</div>
			
				<div id="toolBox"><?php writeTools(false, false, true, true, false) ?></div>
				<div id="footer" class="footer"></div>
		</div>
	</body>
</html>