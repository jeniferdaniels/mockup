<?php include_once 'iconVariables.php' ?>
<?php


function getCourseName(){
	return "CAT 101 - Fundamentals of Kittens";
}


function writeHead($pageTitle){
	echo '<title>' . $pageTitle . '</title>';
	echo '<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.4.0/css/font-awesome.min.css">';
	echo '<link rel="stylesheet" type="text/css" href="css/pleStyle.css">';
	//echo '<!--fonts from Adobe Typekit -->';
	//echo '<script src="https://use.typekit.net/shs2gdc.js"></script>';
	//echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
	echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">';
	echo '<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300" rel="stylesheet" type="text/css">';
	echo '<script src="scripts/js/toggleDisplay.js"></script>';
	
}

function writeNavArrows($navNext, $navPrevious)
{
		echo '<div class="navWrapper">';
		if (!empty($navPrevious)){
			echo '<div class="navPrevious"><a href="' . $navPrevious . '"><div class="fa fa-angle-left fa-5x"></div></div></a>';
		}
			
		if (!empty($navNext)){
			echo '<div class="navNext"><a href="' . $navNext . '"><div class="fa fa-angle-right fa-5x"></div></div></a>';
		}
		echo '</div><!--end nav wrapper-->';
}


				
function writeTop($navNext, $navPrevious, $showModuleProgress, $breadCrumbs){	

	writeNavArrows($navNext, $navPrevious);

	echo '<div class="top">';
	echo '<header>';
	writeTopLeft();
	writeTopRight();
	echo '</header>';
		
	writeCourseInfoMenu();	
	writeBreadCrumbs($breadCrumbs);

	if ($showModuleProgress)
		writeModuleProgressBar();
		
	echo '</div>';
	
}

function writeTopRight(){
	echo '<div class="topRightWrapper">';
	writeSearchBox();
	echo '<i class="fa fa-bell fa-2x headIcon"></i>';
	echo '<i class="fa fa-user fa-2x headIcon"></i>';
	echo '</div><!--end topRightWrapper-->';
}

function writeTopLeft(){
	echo '<div class="topLeftWrapper">';
	echo '<div class="oduLogo"></div>';
	echo '<h1 class="courseTitle">' . getCourseName() . '</h1>';
	echo '</div><!--end left wrapper-->';
}

function writeModuleProgressBar(){
	echo '<div class="moduleProgressWrapper">';
	echo '<progress class="moduleProgressBar" value="30" max="100" title="30%" id="moduleProgressBar"></progress>';
	echo '<div class="moduleProgressTitle">Module Progress</div>';
	echo '</div>';
}


function getParentHId($hId)
{	
	$parentHId = "";
	if (strlen($hId) > 1){
		$explodedHId = explode(".", $hId);
		if (count($explodedHId)>1){
			array_pop($explodedHId);
			$parentHId = join(".", $explodedHId);
		}
	}
	return $parentHId;
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


function writeSearchBox(){
	echo '<div class="searchWrapper">';
	echo '<form>';
	echo '<input name="search" id="search" placeholder="search...">';
	echo '</form>';
	echo '</div><!--end wrapper-->';
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
	echo '<div class="toggleBox collapsed" id="' .$boxId . '_collapsed"' . $collapsedStyle . '><a href="javaScript:toggleBox(\'' . $boxId . '\');" class="boxTitle"><i class="fa fa-angle-double-right fa-lx"></i> ' . $boxTitle . '</a></div>';
	echo '<div class="toggleBox expanded" id="' .$boxId . '_expanded"' . $expandedStyle . '><a href="javaScript:toggleBox(\'' . $boxId . '\');" class="boxTitle"><i class="fa fa-angle-double-down fa-lx"></i> ' . $boxTitle . '</a>';
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

?>