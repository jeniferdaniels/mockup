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

					//***************************************
					//set page content
					//***************************************
					flatCourse = flattenCourse(obj);
					var topicId = (typeof $.QueryString["id"] !== undefined) ? $.QueryString["id"] : "3"; //default it to something for now 

					//TODO: make a default id and handle that
					topic = getObjectFromArray(flatCourse, "id", topicId);
					topicIndex = flatCourse.indexOf(topic);
										
					parent = getObjectFromArray(flatCourse, "id", topic.parent);
					previous = flatCourse[topicIndex-1];
					next = flatCourse[topicIndex+1];
					
					$("#pageTitle").html(topic.title);
					console.log("title" + topic.title);
					$("#subtopicList").html(writeSubtopicList(getSubtopics(flatCourse, topicIndex))); 
					$("#moduleCrumb").html("<a href='index.php'>" + parent.displayNumber + ". " + parent.title + "</a>");
					$("#thisCrumb").html(topic.displayNumber + " " + topic.title); 
					
					$("#prev").prop("href", previous.url);
					$("#next").prop("href", next.url);
					console.log("nav urls Prev:" + previous.url + " Next: " + next.url);
					useArrowsForNavigation(previous.url, next.url);
										
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
				<div class="odu_breadCrumbWrapperAlt">				
					<nav>
						<ul class="odu_breadCrumbs">
							<li id="moduleCrumb"></li>
						</ul>
					</nav>
				</div>
			
			<div class="odu_toolbox odu_toolboxAlt" id="odu_toolbox">
				<?PHP writeToolsAlt(1) ?>
			</div>
			<div class="odu_content odu_contentAlt" id="odu_content">
				<div class="odu_paper odu_paperAlt" id="odu_paper">

				<div class="fakeEditor" id="fakeEditor"><img src="<?PHP echo WEB_ROOT ?>/images/CKEditorSample.png"></div>
					<?php writeProgressNavBar() ?>
					<div id="content">In this topic you will learn the following:
						<ul id="subtopicList" class="subtopicList" style="list-style: none;"></ul>
					</div>
				</div>
			</div>
			
			
			
		</div>

		
		<footer class="odu_footer"></footer>

			
			
	</body>
	
</html>