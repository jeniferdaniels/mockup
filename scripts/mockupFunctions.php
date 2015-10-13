<?php include_once 'globalVariables.php' ?>
<?php

//TODO change to class global
function getCourseName(){
	return "CAT 101 - Fundamentals of Kittens";
}

function writeHead($pageTitle){
	echo '<title>' . $pageTitle . '</title>';
	echo '<link rel="stylesheet" type="text/css" href="/mockups/css/reset.css">';
	echo '<link rel="stylesheet" type="text/css" href="/mockups/fonts/font-awesome-4.4.0/css/font-awesome.min.css">';
	echo '<link rel="stylesheet" type="text/css" href="/mockups/css/pleStyle.css">';
	//echo '<!--fonts from Adobe Typekit -->';
	//echo '<script src="https://use.typekit.net/shs2gdc.js"></script>';
	//echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
	echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">';
	echo '<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300" rel="stylesheet" type="text/css">';
	echo '<script src="/mockups/scripts/js/toggleDisplay.js"></script>';

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
		echo '<div class="navPrevious"><a href="' . $url . '"><div class="fa fa-angle-left fa-5x"></div></div></a>';
	}
}

function  writeNextNavArrow($url)
{
	if (!empty($url)){
		echo '<div class="navNext"><a href="' . $url . '"><div class="fa fa-angle-right fa-5x"></div></div></a>';
	}

}

//10/8/2015
function writeDashboardTop(){
	echo '<div class="top dash">';
		echo '<div class="topWrapper" id="topWrapper">';
			echo '<div class="topContent" id="topContent">';
				echo '<div class="pleLogo dash"></div>';
					echo '<div class="topUpperButtonGroup" id="topUpperButtonGroup">';
						writeNotificationButton();
						writeSearchButton();
						writeNotepadButton();
						writeChatButton();
						writeUserButton();
					echo '</div><!--end upperButtonGroup-->';
					echo '<div class="topTitleWrapper dash"><h1>Welcome back, Jen!</h1></div>';
					echo '<div class="topLowerButtonGroup" id="topLowerButtonGroup">';
					echo '</div><!--end lowerButtonGroup-->';
			echo '</div><!--end top content-->';
		echo '</div><!--end topWrapper-->';
	echo '</div><!--end top-->';
}


function writeTop($navNext, $navPrevious, $showModuleProgress, $breadCrumbs){	
	writeNavArrows($navNext, $navPrevious);
	echo '<div class="top">';
		echo '<div class="topWrapper" id="topWrapper">';
			echo '<div class="topContent" id="topContent">';
				echo '<div class="pleLogo"></div>';
					echo '<div class="topUpperButtonGroup" id="topUpperButtonGroup">';
						writeNotificationButton();
						writeSearchButton();
						writeNotepadButton();
						writeChatButton();
						writeUserButton();
					echo '</div><!--end upperButtonGroup-->';
					echo '<div class="topTitleWrapper"><h1><a href="index.php">' . getCourseName() . '</a></h1></div>';
					echo '<div class="topLowerButtonGroup" id="topLowerButtonGroup">';
						//echo '<div class="topLowerButton">';
						//echo '<div id="primary_nav_wrap">';
						//echo '<ul><li><a href="#">CAT 101 Class Info</a></li><ul><li>Faculty</li><li>Syllabus</li><li>Schedule</li><li>Assignments</li></ul></ul>';
						//echo '</div>';
							
							
							//echo '<div class="topLowerButton"><a href="../index.php">Dashboard</a></div>';
					
					
					echo '<nav id="primary_nav_wrap">';
					echo '<ul>';
						echo '<li><a href="../index.php">Dashboard</a></li>';
							echo '<li><a href="#">CAT 101 - Class Information</a>';
								echo '<ul>';
									echo '<li><a href="faculty.php">Faculty</a></li>';
									echo '<li><a href="syllabus.php">Syllabus</a></li>';
									echo '<li><a href="schedule.php">Schedule</a></li>';
									echo '<li><a href="assignments.php">Assignments</a></li>';
								echo '</ul>';
							echo '</li>';
						echo '</ul>';
					echo '</nav>';
					echo '</div><!--end lowerButtonGroup-->';
					
					
					
			echo '</div><!--end top content-->';
		echo '</div><!--end topWrapper-->';
		writeBreadCrumbs($breadCrumbs);
		writeAaqButton();
		writeRatingButton();
	echo '</div><!--end top-->';
}




function writeModuleProgressBar(){
	echo '<div class="moduleProgressWrapper">';
	echo '<progress class="moduleProgressBar" value="30" max="100" title="30%" id="moduleProgressBar"></progress>';
	echo '<div class="moduleProgressTitle">Module Progress</div>';
	echo '</div>';
}

function writeBreadCrumbs($breadCrumbs)
{
	if (!empty($breadCrumbs))
	{
	echo '<div class="breadCrumbWrapper">';
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
	
}

function writeRatingButton()
{
	
}



function writeCourseInfoMenu(){
	echo '<div class="lhsMenuWrapper">';
	echo '<div id="courseMenu">';
	echo '<ul>';
	echo '<li class="clearHover"><a href="#" class="courseMenuIcon clearHover"></a>';
    echo '<ul>';
	echo '<li><a href="faculty.php?hId=f"><span>Faculty</span></a></li>';
	echo '<li><a href="syllabus.php"><span>Syllabus</span></a></li>';
	echo '<li><a href="schedule.php"><span>Schedule</span></a></li>';
	echo '<li><a href="assignments.php"><span>Assignments</span></a></li>';
	echo '<li><a href="help.php"><span>Help</help></a></li>';
	echo '</ul><!--end big list-->';
	echo '</ul></div>';
	echo '</div>';

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


function writeDashWidgetTitle($title)
{
		echo '<h2 class="dashTitle">' . $title . '</h2>';	
}

function functionalityNA($msg)
{
		echo "javascript:alert(\'" . $msg . "\');";	
}

function writeFooter()
{
	//echo '<iframe src="../aaq.php" width="100%"></iframe>';	
	include "../aaq.php";
}

?>