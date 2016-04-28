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
					//TODO: kludge so I dont have to open the json file to either change the url or add
					//an alt url or take the querystring part off the url
					//useArrowsForNavigation(previous.url, next.url);
					prevUrl = "subtopicAlt.php?id=" + previous.id;
					nextUrl = "subtopicAlt.php?id=" + next.id;
					console.log("nav urls Prev:" + prevUrl + " Next: " + nextUrl);
					useArrowsForNavigation(prevUrl, nextUrl);
										
					
					
					
					$("#pageTitle").html(subtopic.title);
					$("#content").load("cat101/" + subtopic.content);
					$("#moduleCrumb").html("<a href='index.php'>" + grandParent.displayNumber + ". " + grandParent.title + "</a>");
					$("#topicCrumb").html("<a href='" + parent.url + "'>" + parent.displayNumber + " " + parent.title + "</a>");							
					$("#thisCrumb").html(subtopic.displayNumber + " " + subtopic.title); 
					$("#prev").prop("href", prevUrl);
					$("#next").prop("href", nextUrl);
					
					
					//toolBoxFunctionality();																				
					});// done 
				});//ready
		</script>
	</head>
	
	<body class="bodyAlt">
		<div id="popWindow" class="displayNone"><?php writeDummyGlossaryTerms(10)?></div>
	
		<div class="navWrapper">
			<div id="navPrevious" class="navPrevious"><a id="prev" href=""><?php echo(icon("fa", "previous", "e", "")); ?></a></div>
			<div id="navNext" class="navNext"><a id="next" href=""><?php echo(icon("fa", "next", "e", "")); ?></a></div>
		</div>
	
	
		<div class="top" id="top"><?php writeTopHtml(); ?></div>
		

		<div class="odu_wrapper odu_wrapperAlt" id="odu_wrapper">
			<div class="odu_titleAlt"><h1 id="pageTitle"></h1></div>
			
			<div class="odu_toolbox odu_toolboxAlt" id="odu_toolbox">
				stuff goes here
			</div>
			<div class="odu_content odu_contentAlt" id="odu_content">
				<div class="odu_progressBarWrapper" id="odu_progressBarWrapper"></div>
				<div class="odu_paper odu_paperAlt" id="odu_paper">
					<div class="fakeEditor" id="fakeEditor"><img src="<?PHP echo WEB_ROOT ?>/images/CKEditorSample.png"></div>
					<?php writeProgressNavBar() ?>
						
						
					
					<div class="odu_stuff" id="content"></div>
				</div>
			</div>
			
			
			
		</div>

		
		<footer class="odu_footer"></footer>

			
			
	</body>
	
</html>