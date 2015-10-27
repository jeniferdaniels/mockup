<?php include_once 'globalVariables.php' ?>
<?php

//abbreviated for newline and tab;
function nt($tabCount)
{
	$str = "\n";
	for ($i=0; $i<$tabCount; $i++)
		$str .= "\t";
	return $str; 
}

function writeHead($pageTitle){
	$tabOver = 2;
	echo nt($tabOver), '<meta charset="utf-8" />';
	echo nt($tabOver), '<link rel="stylesheet" type="text/css" href="/mockups/css/reset.css">';
	echo nt($tabOver), '<link rel="stylesheet" type="text/css" href="/mockups/fonts/font-awesome-4.4.0/css/font-awesome.min.css">';
	echo nt($tabOver), '<link rel="stylesheet" type="text/css" href="/mockups/css/pleStyle.css">';
	echo nt($tabOver), '<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">';
	echo nt($tabOver), '<script src="../calendar/lib/moment.min.js"></script>';
	echo nt($tabOver), '<script src="../calendar/lib/jquery.min.js"></script>';
	echo nt($tabOver), '<script src="/mockups/scripts/js/url.js"></script>';
	echo nt($tabOver), '<script src="/mockups/scripts/js/toggleDisplay.js"></script>';
	echo nt($tabOver), '<script src="/mockups/scripts/js/courseFunctions.js"></script>';
	echo nt($tabOver), '<script src="/mockups/scripts/js/kbNavigate.js"></script>';
	echo nt($tabOver), '<script src="../scripts/js/jquery-2.1.3.min.js"></script>';
	echo nt($tabOver), '<script src="../scripts/js/courseFunctions.js"></script>';
	echo nt(0);
}

function writeCourseDashboardHead($pageTitle){
	$tabOver = 2;
	
	writeHead($pageTitle);
	//calendar scripts
	echo nt($tabOver), '<!--calendar scripts-->';
	echo nt($tabOver), '<link href="../calendar/fullcalendar.css" rel="stylesheet">';
	echo nt($tabOver), '<link href="../calendar/fullcalendar.print.css" rel="stylesheet" media="print">';
	echo nt($tabOver), '<script src="../calendar/fullcalendar.min.js"></script>';
	echo nt($tabOver), '<script type="text/javascript" src="../scripts/js/calendarDemo.js"></script>';
	//echo nt($tabOver), '<script type="text/javascript" src="https://www.odu.edu/etc/designs/odu/clientlibs.js"></script>';
	echo nt($tabOver), '<link rel="stylesheet" href="../css/calendarDemo.css" type="text/css">';
	
	echo nt(0);
}

function writeNavArrows($navNext, $navPrevious)
{
	echo '<div class="navWrapper">';
		writePreviousNavArrow($navPrevious);
		writeNextNavArrow($navNext);
	echo '</div><!--end nav wrapper-->';
	echo '<script>useArrowsForNavigation("' . $navPrevious . '", "' . $navNext . '")</script>';
	
	
}

function writePreviousNavArrow($url)
{
	if (!empty($url)){
		echo '<div id="navPrevious" class="navPrevious"><a href="' . $url . '"><div class="fa fa-angle-left fa-5x"></div></a></div>';
	}
}

function  writeNextNavArrow($url)
{
	if (!empty($url)){
		echo '<div id="navNext" class="navNext"><a href="' . $url . '"><div class="fa fa-angle-right fa-5x"></div></a></div>';
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
	$tabOver = 3;
	
	echo nt($tabOver), '<div class="topWrapper">';
	echo nt($tabOver+1), '<header>';
	echo nt($tabOver+2), '<nav id="nav">';
	echo nt($tabOver+3), '<ul>';
	echo nt($tabOver+4), '<li><a href="#"><i class="fa fa-bars fa-lg fa-fw"></i></a>';
	echo nt($tabOver+5), '<ul>';
	echo nt($tabOver+6), '<li><a href="#">Announcements</a></li>';
	echo nt($tabOver+6), '<li><a href="#">Ask A Question</a></li>';
	echo nt($tabOver+6), '<li><a href="#">Course Glossary</a></li>';
	echo nt($tabOver+6), '<li><a href="#">Course Progress</a></li>';
	echo nt($tabOver+6), '<li><a href="faculty.php">Faculty</a></li>';
	echo nt($tabOver+6), '<li><a href="#">Help</a></li>';
	echo nt($tabOver+6), '<li><a href="#">Notes</a></li>';
	//echo nt($tabOver+6), '<li><a href="#">Notifications</a></li>';
	echo nt($tabOver+6), '<li><a href="schedule.php">Schedule</a></li>';
	echo nt($tabOver+6), '<li><a href="syllabus.php">Syllabus</a></li>';
	echo nt($tabOver+5), '</ul>';
	echo nt($tabOver+4), '</li>';
	echo nt($tabOver+4), '<li><a href="#"><i class="fa fa-user fa-lg fa-fw"></i></a></li>';	
	echo nt($tabOver+4), '<li><a href="#"><i class="fa fa-comments fa-lg fa-fw"></i></a></li>';
	echo nt($tabOver+4), '<li><a href="#"><i class="fa fa-search fa-lg fa-fw"></i></a></li>';
	echo nt($tabOver+3), '</ul>';
	
	echo nt($tabOver+2), '</nav>';
	echo nt($tabOver+2), '<div class="pleLogo"></div>';
	echo nt($tabOver+2), '<h1 id="courseTitle"></h1>';
	echo nt($tabOver+2), '<h2 id="courseInstructor">Instructor - </h2>';
	echo nt($tabOver+1), '</header>';
	echo nt($tabOver), '</div><!--end topWrapper-->';
	echo nt(0);
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

function writeProvideFeedbackWidget(){
	echo '<div class="provideFeedback"><a href="#">Provide Feedback';
	echo $GLOBALS["iconPencilSmall"];
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