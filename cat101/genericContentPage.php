<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>
<?php 

?>

<!doctype html>
<html>
	<head>
		<?php writeHead($pageTitle); ?>
		<script>
			$(document).ready(function(){
				$.ajax({
					url: "json/kitten.json"
				}).done(function(obj) {
					setTop(obj);
					document.title = getCourseTitle(obj);
					flatCourse = flatten(obj);
					
					
					subTopic = getObjectFromArray(flatCourse, "id", 3);					
					parent = getObjectFromArray(flatCourse, "id", subTopic.parent);
					grandParent = getObjectFromArray(flatCourse, "id", parent.parent);
					previous = flatCourse[flatCourse.indexOf(subTopic)-1];
					next = flatCourse[flatCourse.indexOf(subTopic)+1];
					
					$("#pageTitle").html(subTopic.title);
					$("#content").html(subTopic.content);
					$("#moduleCrumb").html("<a href=#>" + grandParent.displayNumber + ". " + grandParent.title + "</a>");
					$("#topicCrumb").html("<a href=#>" + parent.displayNumber + "." + parent.title + "</a>");
					$("#thisCrumb").html(subTopic.displayNumber + "." + subTopic.title); 
					$("#prev").prop("href", previous.url);
					$("#next").prop("href", next.url);
					
					});
				});
		</script>
	</head>
	
	<body>
		<div class="top"><?php writeTopHtml(); ?></div>

		<div class="breadCrumbWrapper">
			<nav>
				<ul class="breadCrumbs">
					<li><a href="index.php">Home</a></li>
					<li id="moduleCrumb"></li>
					<li id="topicCrumb"></li>
					<li id="thisCrumb"></li>
				</ul>
			</nav>
		</div>

		 
	
		<div class="contentWrapper" id="contentWrapper">
			<h2 id="pageTitle"></h2>
			<p id="content"></p>
			<a id="prev" href="">Pre</a>
			<a id="next" href="">Next</a>
		</div>

	</body>
</html>