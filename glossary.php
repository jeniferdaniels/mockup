<?php include_once 'scripts/mockupFunctions.php' ?>

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
					flatCourse = flattenCourse(obj);
					
					var glossaryId = (typeof $.QueryString["id"] !== undefined) ? $.QueryString["id"] : "3"; //default it to something for now 
					//TODO: make a default id and handle that
					glossary = getObjectFromArray(flatCourse, "id", glossaryId);
					glossaryIndex = flatCourse.indexOf(glossary);
										
					parent = getObjectFromArray(flatCourse, "id", glossary.parent);
					previous = flatCourse[glossaryIndex-1];
					next = flatCourse[glossaryIndex+1];

					useArrowsForNavigation(previous.url, next.url);
					
					$("#pageTitle").html(glossary.title);
					$("#content").html("glossary table goes here");					 
					$("#moduleCrumb").html("<a href='#'>" + parent.displayNumber + ". " + parent.title + "</a>");
					$("#thisCrumb").html(glossary.displayNumber + " " + glossary.title); 
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
						<div class="paper">
						<h2 id="pageTitle"></h2>
						<div id="content"></div>			
					</div>
				</div>
				<div id="toolBox"><?php writeTools(false, false, true, true, true) ?></div>
				<div id="footer" class="footer"></div>
		</div>
	</body>
</html>