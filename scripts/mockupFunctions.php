<?php include_once 'globalVariables.php' ?>
<?php

function includeCsss(){
	echo '<meta charset="utf-8" />';
	echo '<link rel="stylesheet" type="text/css" href="' . $GLOBALS['mockupDirectory'] . 'css/reset.css">';
	echo '<link rel="stylesheet" type="text/css" href="' . $GLOBALS['mockupDirectory'] . 'fonts/font-awesome-4.4.0/css/font-awesome.min.css">';
	
	echo '<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" >';
	echo '<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">';
	echo '<link rel="stylesheet" type="text/css" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">';
	
	echo '<link rel="stylesheet" type="text/css" href="' . $GLOBALS['mockupDirectory'] . 'css/pleStyle.css">';
	echo '<link rel="stylesheet" type="text/css" href="' . $GLOBALS['mockupDirectory'] . 'css/courseMaterial.css">';
	echo '<link rel="stylesheet" type="text/css" href="' . $GLOBALS['mockupDirectory'] . 'css/navArrows.css">';
}

function includeScripts()
{
	echo '<script src="' . $GLOBALS['mockupDirectory'] . 'scripts/js/jquery-2.1.3.min.js"></script>';
	echo '<script src="' . $GLOBALS['mockupDirectory'] . 'scripts/js/kbNavigate.js"></script>';
	echo '<script src="' . $GLOBALS['mockupDirectory'] . 'scripts/js/queryStringFunctions.js"></script>';
	echo '<script src="' . $GLOBALS['mockupDirectory'] . 'scripts/js/courseFunctions.js"></script>';
	
}


function writeTopHtml()
{
	$menuIcon = icon("g", "menu", "l", "");
	$userIcon = icon("g", "user", "l", "topUpperButton");
	$chatIcon = icon("g", "chat", "l", "topUpperButton");
	$searchIcon = icon("g", "search", "l", "topUpperButton");
	

	
	echo '<div class="topWrapper">';
		echo'<header>';
			echo'<nav id="nav">';
				echo '<ul>';
					echo '<li><a href="#">' .$menuIcon .'</a>';
						echo '<ul>';
							echo '<li><a href="#">Announcements</a></li>';
							echo '<li><a href="assignments.php">Assignments</a></li>';
							echo '<li><a href="#">Ask A Question</a></li>';
							echo '<li><a href="#">Course Glossary</a></li>';
							echo '<li><a href="#">Course Progress</a></li>';
							echo '<li><a href="faculty.php">Faculty</a></li>';
							echo '<li><a href="#">Help</a></li>';
							echo '<li><a href="#">Notes</a></li>';
							echo '<li><a href="schedule.php">Schedule</a></li>';
							echo '<li><a href="syllabus.php">Syllabus</a></li>';
							echo '</ul>';
						echo '</li>';
					echo '<li><a href="#">' . $userIcon .'</a></li>';	
					echo '<li><a href="#">' .$chatIcon .'</a></li>';
					echo '<li><a href="#">'. $searchIcon . '</a></li>';
					echo '</ul>';
			echo '</nav>';
			echo '<div style="clear:both"></div>';
			echo '<div class="oduOnlineLogo"></div>';
			echo '<h1 id="courseTitle"></h1>';
			echo '<h2 id="courseInstructor">Instructor - </h2>';
		echo '</header>';
	echo '</div><!--end topWrapper-->';
}


function writeModuleProgressBar(){
	echo '<div class="moduleProgressWrapper">';
	echo '<progress class="moduleProgressBar" value="30" max="100" title="30%" id="moduleProgressBar"></progress>';
	echo '<div class="moduleProgressTitle">Module Progress</div>';
	echo '</div>';
}

function writeBreadCrumbs($breadCrumbs)
{
	
	if (!empty($breadCrumbs)){
	echo '<div class="breadCrumbWrapper">';
		echo '<nav>';
		echo '<ul class="breadCrumbs">';
			//stop short of last item because it will be text instead of a link
			for ($i = 0; $i < count($breadCrumbs)-1; $i++){
				echo '<li><a href="' . $breadCrumbs[$i]["url"] . '">' . $breadCrumbs[$i]["displayTitle"] . '</a>&nbsp;</li>';
			}	
			//not link
			echo '<li>' . array_pop($breadCrumbs)["displayTitle"] . '</a></li>';	
		echo '</ul>';
		echo '</nav></div>';
	}
	echo "\n";
}



function writeProvideFeedbackWidget(){
	echo '<div class="provideFeedback"><a href="#">Provide Feedback';
	echo $GLOBALS["iconPencilSmall"];
	echo '</a></div>';
}


function writeSuccessMessage($id, $string)
{
		echo '<div class="messageBoxSuccess" id="successBox' . $id . '" style="display:none">';
		echo $string;
		echo '</div>';
}


function writeDashWidgetTitle($title)
{
		echo '<h2>' . $title . '</h2>';
}

function writeFooter()
{
	//echo '<iframe src="../aaq.php" width="100%"></iframe>';	
	include "../aaq.php";
}

function writeCalendarModal(){
	
	echo '<div id="eventContent" title="Event Details" style="display:hidden; z-index: 3000">';
		echo '<div class="modalContentWrapper">';
			echo '<div class="icon" id="eventIcon">' .  icon("g", "assignment", "h", "liteGray") . '</div><h3 id="eventTitle"></h3>';
			
			echo '<br>';
			echo '<h5 id="assignmentDueHeader">Due - </h5>';
			echo '<div class="eventDateTime" id="eventDateTime"></div>';
			
			echo '<br>';
			echo '<h5 id="assignmentDeliverableHeader">Deliverable - </h5>';
			echo '<div class="assignmentDeliverables" id="assignmentDeliverables"></div>';
			echo '<p id="eventDescription"></p>';
		echo '</div><!-- modal content wrapper -->';
	echo '</div><!-- event content -->';
		
}

function writeUpcomingAssignment($id) {
	echo '<div id="assignment_' . $id . '" class="assignment">';
	echo '<div id="date_' . $id . '" class="dateWrapper">';
	echo '<h4>Jan</h4><h3>18</h3><h5>11:59pm</h5>';
	echo '</div>';//end dateWrapper
	echo '<h3>Assignment Title Here</h3>';
	echo '<div id="" class="deliverable">Deliverable Here</div>';
	echo '<p id="" class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>';
	//echo '<p class="readmore" id="readMore_' . $id . '"></p>';
	echo '</div>';
}

function writeTools($showGlossary, $showAAQ, $showFeedback, $showEdit){
	echo '<ul id="tools">';
	
	if ($showGlossary)
		echo '<li><dt><a id="glossaryLink" title="glossary">' . icon("fa", "glossary", "l", "") . '<dd>Glossary</dd></dt></a></li>';	
	if ($showAAQ)
		echo '<li><dt><a id="aaqLink" title="Ask A Question">' . icon("g", "aaq", "l", "") . '<dd>Ask A Question</dd></dt></a></li>';
	if ($showFeedback)
		echo '<li><dt><a id="feedbackLink" title="Give Feedback">' . icon("g", "feedback", "l", "") . '<dd>Give Feedback</dd></dt></a></li>';
	
	echo '<li><dt><a id="printLink" title="print">'. icon("g", "print", "l", "") . '<dd>Print</dd></dt></a></li>';
	if ($showEdit)
		echo '<li><dt><a id="editLink" title="edit">'. icon("g", "edit", "l", "") . '</a><dd>Edit</dd></dt></li>';
	
	
	echo '</ul>';
}





?>