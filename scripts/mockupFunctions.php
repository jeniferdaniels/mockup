<?php include_once 'globalVariables.php' ?>
<?php

function writeHead($pageTitle){
	echo "\t\t", '<link rel="stylesheet" type="text/css" href="/mockups/css/reset.css">';
	echo "\n\t\t", '<link rel="stylesheet" type="text/css" href="/mockups/fonts/font-awesome-4.4.0/css/font-awesome.min.css">';
	echo "\n\t\t", '<link rel="stylesheet" type="text/css" href="/mockups/css/pleStyle.css">';
	echo "\n\t\t", '<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">';
	echo "\n\t\t", '<script src="../calendar/lib/moment.min.js"></script>';
	echo "\n\t\t", '<script src="../calendar/lib/jquery.min.js"></script>';
	echo "\n\t\t", '<script src="/mockups/scripts/js/url.js"></script>';
	echo "\n\t\t", '<script src="/mockups/scripts/js/toggleDisplay.js"></script>';
	echo "\n\t\t", '<script src="/mockups/scripts/js/courseFunctions.js"></script>';
	echo "\n\t\t", '<script>$(document).ready(function(){populateCourseTitle("json/kitten.json");});</script>';
	echo "\n";
}

function writeCourseDashboardHead($pageTitle){
	writeHead($pageTitle);
	//calendar scripts
	echo "\n", '<link href="../calendar/fullcalendar.css" rel="stylesheet">';
	echo "\n", '<link href="../calendar/fullcalendar.print.css" rel="stylesheet" media="print">';

	echo "\n", '<script src="../calendar/fullcalendar.min.js"></script>';
	echo "\n", '<script type="text/javascript" src="../scripts/js/calendarDemo.js"></script>';
	echo "\n", '<script type="text/javascript" src="https://www.odu.edu/etc/designs/odu/clientlibs.js"></script>';
	echo "\n", '<link rel="stylesheet" href="../css/calendarDemo.css" type="text/css">';
	echo "\n";
}

function writeNavArrows($navNext, $navPrevious)
{
	echo '<div class="navWrapper">';
		writePreviousNavArrow($navPrevious);
		writeNextNavArrow($navNext);
	echo '</div><!--end nav wrapper-->';
}

function writePreviousNavArrow($url)
{
	if (!empty($url)){
		echo '<div class="navPrevious"><a href="' . $url . '"><div class="fa fa-angle-left fa-5x"></div></a></div>';
	}
}

function  writeNextNavArrow($url)
{
	if (!empty($url)){
		echo '<div class="navNext"><a href="' . $url . '"><div class="fa fa-angle-right fa-5x"></div></a></div>';
	}

}

function writeTop($navNext, $navPrevious, $showModuleProgress, $breadCrumbs){	
	writeNavArrows($navNext, $navPrevious);
	echo "\r\n\t\t", '<div class="top">';
		writeTopHtml();
		writeBreadCrumbs($breadCrumbs);
	echo "\r\n\t\t", '</div><!--end top-->';
}

function writeTopHtml()
{
	echo "\n\t\t\t", '<div class="topWrapper">';
	echo "\n\t\t\t\t", '<header>';
	echo "\n\t\t\t\t\t", '<nav id="nav">';
	echo "\n\t\t\t\t\t\t", '<ul>';
	echo "\n\t\t\t\t\t\t\t", '<li><a href="#"><i class="fa fa-bars fa-lg fa-fw"></i></a>';
	echo "\n\t\t\t\t\t\t\t\t", '<ul>';
	echo "\n\t\t\t\t\t\t\t\t\t", '<li><a href="#">Announcements</a></li>';
	echo "\n\t\t\t\t\t\t\t\t\t", '<li><a href="#">Ask A Question</a></li>';
	echo "\n\t\t\t\t\t\t\t\t\t", '<li><a href="#">Glossary</a></li>';
	echo "\n\t\t\t\t\t\t\t\t\t", '<li><a href="faculty.php">Faculty</a></li>';
	echo "\n\t\t\t\t\t\t\t\t\t", '<li><a href="#">Notes</a></li>';
	echo "\n\t\t\t\t\t\t\t\t\t", '<li><a href="#">Notifications</a></li>';
	echo "\n\t\t\t\t\t\t\t\t\t", '<li><a href="schedule.php">Schedule</a></li>';
	echo "\n\t\t\t\t\t\t\t\t\t", '<li><a href="syllabus.php">Syllabus</a></li>';
	echo "\n\t\t\t\t\t\t\t\t", '</ul>';
	echo "\n\t\t\t\t\t\t\t", '</li>';
	echo "\r\n\t\t\t\t\t\t\t", '<li><a href="#"><i class="fa fa-user fa-lg fa-fw"></i></a></li>';	
	echo "\n\t\t\t\t\t\t\t", '<li><a href="#"><i class="fa fa-comments fa-lg fa-fw"></i></a></li>';
	echo "\n\t\t\t\t\t\t\t", '<li><a href="#"><i class="fa fa-search fa-lg fa-fw"></i></a></li>';
	echo "\n\t\t\t\t\t\t", '</ul>';
	echo "\n\t\t\t\t\t", '</nav>';
	echo "\n\t\t\t\t\t", '<div class="pleLogo"></div>';
	echo "\n\t\t\t\t\t", '<h1 id="courseTitle"></h1>';
	echo "\n\t\t\t\t\t", '<h2 id="courseInstructor"></h2>';
	echo "\n\t\t\t\t", '</header>';
	echo "\n\t\t\t", '</div><!--end topWrapper-->';
	echo "\n";
}


function writeModuleProgressBar(){
	echo '<div class="moduleProgressWrapper">';
	echo '<progress class="moduleProgressBar" value="30" max="100" title="30%" id="moduleProgressBar"></progress>';
	echo '<div class="moduleProgressTitle">Module Progress</div>';
	echo '</div>';
}

function writeBreadCrumbs($breadCrumbs)
{
	echo "\r\n";
	if (!empty($breadCrumbs))
	{
	echo "\r\n\t\t", '<div class="breadCrumbWrapper">';
		echo '<nav>';
		echo '<ul class="breadCrumbs">';
			//stop short of last item because it will be text instead of a link
			for ($i = 0; $i < count($breadCrumbs)-1; $i++)
			{
				echo '<li><a href="' . $breadCrumbs[$i]["url"] . '">' . $breadCrumbs[$i]["displayTitle"] . '</a>&nbsp;</li>';
			}	
			//not link
			echo '<li>' . array_pop($breadCrumbs)["displayTitle"] . '</a></li>';	
		echo '</ul>';
		echo '</nav></div>';
	}
	echo "\n";
}

//**********************************************************************
//BUTTONS
//**********************************************************************
function writeChatButton(){
	echo $GLOBALS["iconChatLarge"];
	echo '<script>document.getElementById("iconChat").className += " topUpperButton";</script>';
}

function writeNotepadButton(){
	echo $GLOBALS["iconNotepadLarge"];
	echo '<script>document.getElementById("iconNotepad").className += " topUpperButton";</script>';
}

function writeNotificationButton(){
	echo $GLOBALS["iconNotificationLarge"];
	echo '<script>document.getElementById("iconNotification").className += " topUpperButton";</script>';
}

function writeSearchButton(){
	echo $GLOBALS["iconSearchLarge"];
	echo '<script>document.getElementById("iconSearch").className += " topUpperButton";</script>';
}

function writeUserButton(){
	echo $GLOBALS["iconUserLarge"];
	echo '<script>document.getElementById("iconUser").className += " topUpperButton";</script>';
}

function writeAaqButton()
{
	echo $GLOBALS["aaqButton"];
}

function writeRatingButton()
{
	echo '<div class="rateContent"><a href="#">Rate content';
	echo $GLOBALS["iconRating"];
	echo '</a></div>';
}

function writeToggleBox($box){
	$boxTitle = $box["title"];
	$boxId = $box["boxId"];
	$boxDates = $box["dates"];
	$isCollapsed = $box["isCollapsed"];
	$isComplete = $box["isComplete"];
	$content = $box["content"];
	//$dates = $box["dates"];

	
	if (!$isComplete)
		$checkmark = '<div class="fa fa-check-circle fa-2x success blockCheckMark" style="visibility:hidden" id="' .$boxId . '_check"></div>';
	else
		$checkmark = '<div class="fa fa-check-circle fa-2x success blockCheckMark" id="' .$boxId . '_check"></div>';
	
	if ($isCollapsed){
		$collapsedStyle = 'style="display:none"';
		$expandedStyle = "";
	}
	else{
		$collapsedStyle = "";
		$expandedStyle = 'style="display:none"';
	}
	
	
	echo '<div class="boxWrapper">';
	echo $checkmark;
	echo '<div class="toggleBox collapsed" id="' .$boxId . '_collapsed"' . $collapsedStyle . '><a href="javaScript:toggleBox(\'' . $boxId . '\');" class="boxTitle">' . $GLOBALS["iconCollapsedMedium"] . ' ' .  $boxTitle . '</a><date>' .  $boxDates . '</date></div>';
	echo '<div class="toggleBox expanded" id="' .$boxId . '_expanded"' . $expandedStyle . '><a href="javaScript:toggleBox(\'' . $boxId . '\');" class="boxTitle"><i class="fa fa-angle-double-down fa-lg"></i> ' . $boxTitle . '</a><date>' .  $boxDates . '</date>';
	echo '<div>';
		include $content;
	echo '</div></div></div>';
}

function writeSuccessMessage($id, $string)
{
		echo '<div class="messageBoxSuccess" id="successBox' . $id . '" style="display:none">';
		echo $string;
		echo '</div>';
}


function writeDashWidgetTitle($title, $toggle)
{
		echo '<h2>' . $title . '</h2>';
		if ($toggle){
			echo '<div class="expandCollapseAllWrapper">';
			echo '<div id="calendarView" style="display:none"><a href="javascript:toggleDisplay(\'calendarView\', \'listView\'); expandAll();">Calendar View</a></div>';
			echo '<div id="collapseAll"><a href="javascript:toggleDisplay(\'calendarView\', \'listView\'); collapseAll();">List View</a></div>';
			echo '</div>';
		}
}
function writeFooter()
{
	//echo '<iframe src="../aaq.php" width="100%"></iframe>';	
	include "../aaq.php";
}

?>