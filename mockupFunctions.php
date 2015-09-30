<?php

function getCourseName(){
	return "MET 320 - Design of Machine Elements";
}


function writeHead($pageTitle){
	echo '<title>' . $pageTitle . '</title>';
	echo '<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.4.0/css/font-awesome.min.css">';
	echo '<link rel="stylesheet" type="text/css" href="css/style1.css">';
	echo '<!--fonts from Adobe Typekit -->';
	echo '<script src="https://use.typekit.net/shs2gdc.js"></script>';
	echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
	echo "\r\n";
	echo '<script src="scripts/js/toggleBox.js"></script>';
}
				
function writeTop($hId, $showModuleProgress, $showPrevNext){	
	//heirarchial ID says which TOC to follow, get first digit
		
	$currentPosition = getArrayPosition($hId);

	if ($showPrevNext){
		$next = getNext($currentPosition, $hId);
		$previous = getPrevious($currentPosition, $hId);

		echo '<!--navigation arrows -->';
		echo '<div class="navWrapper">';
			
		if (!empty($previous)){
			echo '<a href="' . $previous["url"] . '?hId=' . $previous["hId"] . '"><div class="navPrevious"><div class="fa fa-angle-left fa-5x"></div><div class="fa fa-caret-left fa-5x"></div></div></a>';
		}
			
		if (!empty($next)){
			echo '<a href="' . $next["url"] . '?hId=' . $next["hId"]. '"><div class="navNext"><div class="fa fa-angle-right fa-5x"></div><div class="fa fa-caret-right fa-5x"></div></div></a>';
		}
		
		echo '</div><!--end nav wrapper-->';
		echo '<!--end navigation arrows-->';		
	}
	
	echo '<!--top-->';
	echo '<div class="top">';
	echo '<!--header-->';
	echo '<header>';
	echo '<div class="topLeftWrapper">';
	echo '<div class="oduLogo"></div>';
	echo '<h1 class="courseTitle">' . getCourseName() . '</h1>';
	echo '</div><!--end left wrapper-->';
	echo '<div class="topRightWrapper">';

	writeSearchBox();
	
	echo '<i class="fa fa-bell fa-2x headIcon"></i>';
	echo '<i class="fa fa-user fa-2x headIcon"></i>';
	echo '</div><!--end topRightWrapper-->';
	echo '</header><!--end header-->';
		
	writeCourseInfoMenu();	

	echo '<div class="topBottomWrapper">';
	if ($hId != "i"){
		$breadCrumbs = makeBreadCrumbs($hId);
		writeBreadCrumbs($breadCrumbs);
	}
	if ($showModuleProgress){
		writeModuleProgress();
	}

	echo "</div>";
	echo '</div>';
	
}

function writeModuleProgress(){
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

function makeBreadCrumbs($hId)
{
	$breadCrumbs = array();
	$hCount = count(explode(".", $hId)); //explode on . to find out how many heirarchial levels there are
	
	for ($i=0; $i<$hCount; $i++)
	{
		$current = getTocItemInfo(getArrayPosition($hId), $hId);
		if ($current != ""){ //just checking
			$currentArray = array("url" => $current["url"], "displayTitle"=>$hId . " " .$current["title"]);
			array_push($breadCrumbs, $currentArray);
		}
		$hId = getParentHId($hId);
	}
	array_push($breadCrumbs, array("url" => "index.php", "displayTitle"=> "Home"));
	//because array was loaded with grandparent first.
	$breadCrumbs = array_reverse($breadCrumbs);
	return $breadCrumbs;
}


function writeBreadCrumbs($breadCrumbs)
{
	if (!empty($breadCrumbs))
	{
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
		echo '</nav><!--end navigation-->';
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
	echo '<li><a href="assignments.php?hId=a"><span>Assignments</span></a></li>';
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
		$checkmark = '<div class="fa fa-check-circle fa-2x success hidden blockCheckMark"></div>';
	else
		$checkmark = '<div class="fa fa-check-circle fa-2x success blockCheckMark"></div>';
	
	
	$collapsedBox = '<div class="toggleBox collapsed"><a href="javaScript:toggleBox(\'' . $boxId . '\');" class="boxTitle"><i class="fa fa-angle-double-right fa-lx"></i> ' . $boxTitle . '</a></div>';
	
	$expandedBox = '<div class="toggleBox expanded"><a href="javaScript:toggleBox(\'' . $boxId . '\');" class="boxTitle"><i class="fa fa-angle-double-down fa-lx"></i> ' . $boxTitle . '</a>';
	$expandedBox .= '<div>';
	$expandedBox .= file_get_contents($content);
	$expandedBox .= '</div>';
	$expandedBox .= '</div>';
	
	$displayExpanded = "";		
	$displayCollapsed= "";
	
	if (!$isCollapsed){
		$displayCollapsed = 'style="display:none;"';
	}
	else{
		$displayExpanded = 'style="display:none;"';		
	}
		
	echo '<div class="boxWrapper" " id="' .$boxId . '_collapsed"' . $displayCollapsed . '>';
		echo $checkmark;
		echo $collapsedBox;
	echo '</div>';
	
		echo '<div class="boxWrapper" " id="' .$boxId . '_expanded"' . $displayExpanded . '>';
		echo $checkmark;
		echo $expandedBox;
	echo '</div><!--end wrapper-->';
}

//TODO: refactor this crap
function getArrayPosition($hId){
	echo "HID in " . $hId;
	$toc = getToc(whichToc($hId));
	$arrayPosition = 0;
	
	for ($i=0; $i < count($toc); $i++)
	{
		echo "<br>toc at i " . $i . "is " . $toc[$i]["hId"];
		if ($toc[$i]["hId"] == $hId)
		{
			echo "<br>MATCH!";
			$arrayPosition = $i;
			$i = count($toc);
		}
	}
	echo "<br>returning position found" . $arrayPosition;
	return $arrayPosition;	
}


function getNext($arrayPosition, $hId){
	$toc = getToc(whichToc($hId));
	$tocItem = array();
	$next = intval($arrayPosition+1);
	
	if ($next < count($toc))
		$tocItem = $toc[intval($arrayPosition+1)];
	
	return $tocItem;
}

function getPrevious($arrayPosition, $hId){
	$toc = getToc(whichToc($hId));
	$tocItem = array();
	$prev = intval($arrayPosition-1);
	if ($prev > 1 )
		$tocItem = $toc[intval($arrayPosition-1)];
	
	return $tocItem;
}

function getTocItemInfo($arrayPosition, $hId){
	$toc = getToc(whichToc($hId));
	
	return $toc[intval($arrayPosition)];
}

function getPageTitle($hId)
{
	$arrayPosition = getArrayPosition($hId);
	$current = getTocItemInfo($arrayPosition, $hId);
	return $current["title"];
}

function whichToc($hId)
{
	return(substr($hId, 0, 1));
}


function getToc($whichOne)
{
	
if ($whichOne == "1"){	
	$toc = array (
			array(
				//0
				"title" => "Fundamental Principles",
				"hId" => "1.",
				"url" => "index.php?mod=1"
			),
			array(
				//1
				"title" => "Overview",
				"hId" => "1.1",
				"url" => "overviewContent.php"
			),
			array(
				//2
				"title" => "Complete Reading ",
				"hId" => "1.A",
				"url" => "textContent.php"
			),
			array(
				//3
				"title" => "Course Introduction and Statistical Equilbrium",
				"hId" => "1.2",
				"url" => "topicContent.php"
			),
			array(
				//4
				"title" => "Introduction to Design of Machine Elements",
				"hId" => "1.2.1",
				"url" => "videoContent.php"
			),
			array(
				//5
				"title" => "Defining Engineering and the Design Process ",
				"hId" => "1.2.2",
				"url" => "textContent.php"
			),
			array(
				//6
				"title" => "Stages of Design",
				"hId" => "1.2.3",
				"url" => "textContent.php"
			),
			array(
				//7
				"title" => "Utilizing Machine Design Information and Standards",
				"hId" => "1.2.4",
				"url" => "videoContent.php"
			),
			array(
				//8
				"title" => "Computational Tools",
				"hId" => "1.2.5",
				"url" => "textContent.php"
			),
			array(
				//9
				"title" => "Defining Statistical Equilbrium",
				"hId" => "1.2.6",
				"url" => "textContent.php"
			),
			array(
				//10
				"title" => "Homework #1",
				"hId" => "1.B",
				"url" => "assignmentContent.php"
			),
			array(
				//11
				"title" => "Engineering Materials",
				"hId" => "1.3",
				"url" => "topicContent.php"
			),
			array(
				//12
				"title" => "Assumptions",
				"hId" => "1.3.1",
				"url" => "textContent.php"
			),
			array(
				//13
				"title" => "Comprehensive Stress and Strain",
				"hId" => "1.4",
				"url" => "topicContent.php"
			),
			array(
				//14
				"title" => "Tension and Compression Strain",
				"hId" => "1.4.1",
				"url" => "textContent.php"
			),
			array(
				//15
				"title" => "Strain",
				"hId" => "1.4.2",
				"url" => "videoContent.php"
			),
			array(
				//16
				"title" => "Stress and Strain Diagram",
				"hId" => "1.4.3",
				"url" => "textContent.php"
			),
			array(
				//17
				"title" => "Hooke's Law",
				"hId" => "1.4.4",
				"url" => "textContent.php"
			),
			array(
				//18
				"title" => "Tension and SI Units",
				"hId" => "1.5",
				"url" => "topicContent.php"
			),
			array(
				//19
				"title" => "Conversion Factors",
				"hId" => "1.5.1",
				"url" => "videoContent.php"
			),
			array(
				//20
				"title" => "Greeting Message",
				"hId" => "1.C",
				"url" => "videoContent.php"
			),
			array(
				//21
				"title" => "Force and Mass",
				"hId" => "1.6",
				"url" => "topicContent.php"
			),
			array(
				//22
				"title" => "Force and Mass",
				"hId" => "1.6.1",
				"url" => "videoContent.php"
			),
			array(
				//23
				"title" => "Statistically Indeterminate Problems",
				"hId" => "1.7",
				"url" => "topicContent.php"
			),
			array(
				//24
				"title" => "Statistically Indeterminate Problems",
				"hId" => "1.7.1",
				"url" => "textContent.php"
			),
			array(
				//25
				"title" => "Example Problem 1",
				"hId" => "1.7.2",
				"url" => "videoContent.php"
			),
			array(
				//26
				"title" => "Example Problem 2",
				"hId" => "1.7.3",
				"url" => "videoContent.php"
			),
			array(
				//27
				"title" => "Center of Gravity",
				"hId" => "1.8",
				"url" => "topicContent.php"
			),
			array(
				//28
				"title" => "Center of Gravity",
				"hId" => "1.8.1",
				"url" => "textContent.php"
			),
			array(
				//29
				"title" => "Composite Areas",
				"hId" => "1.8.2",
				"url" => "videoContent.php"
			),
			array(
				//30
				"title" => "Example Problem 3",
				"hId" => "1.8.3",
				"url" => "textContent.php"
			),
			array(
				//31
				"title" => "Summary",
				"hId" => "1.9",
				"url" => "summaryContent.php"
			),
			array(
				//32
				"title" => "Resources",
				"hId" => "1.10",
				"url" => "resourcesContent.php"
			),
			array(
				//33
				"title" => "Module Feedback",
				"hId" => "1.D",
				"url" => "moduleFeedbackContent.php"
			),
			array(
				//0
				"title" => "Home",
				"hId" => "0",
				"url" => "index.php?mod=1"
			)	
		);
	}
	else if ($whichOne == "f")
	{
		$toc = array (
			array(
				//0
				"title" => "Home",
				"hId" => "",
				"url" => "index.php"
			),
			array(
				//1
				"title" => "Faculty",
				"hId" => "f",
				"url" => ""
			)
		);
	}
	else if ($whichOne == "a")
	{
		$toc = array (
			array(
				//0
				"title" => "Home",
				"hId" => "0",
				"url" => "index.php"
			),
			array(
				//1
				"title" => "Assignments",
				"hId" => "a",
				"url" => ""
			)
		);
	}
	else if ($whichOne == "i")
	{
		$toc = array (
			array(
				//0
				"title" => "Home",
				"hId" => "0",
				"url" => "index.php"
			)
		);
	}
return $toc;	
	
	
}

?>