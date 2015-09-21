<?php
//include_once $_SERVER['DOCUMENT_ROOT'] . "/lib/htmlLawed/htmLawed.php";	//use document root incase the directory of this page moves
//TODO: rewrite the html formatting

function writeHead($pageTitle, $css){
	echo '<title>' . $pageTitle . '</title>';
	echo '<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.4.0/css/font-awesome.min.css">';
	echo '<link rel="stylesheet" type="text/css" href="css/' . $css . '">';
	echo '<!--to capture keypres shortcuts-->';
	echo '<script src="scripts/js/kbShortcuts.js"></script>';
	echo '<script src="scripts/js/jquery-2.1.3.min.js"></script>';


	echo '<!--fonts from Adobe Typekit -->';
	echo '<script src="https://use.typekit.net/scm3ciw.js"></script>';
	echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
	echo "\r\n";
}
				
function writeTop($icons, $nav, $courseTitle, $breadCrumbs){
	echo '<!--navigation arrows -->';
	echo '<div class="navWrapper">';
	
	if (!empty($nav)){
		if ($nav["prevUrl"] != "")
			echo '<div class="navPrevious"><a href="' . $nav["prevUrl"] . '"> ' .  $icons["prev"] . ' </a></div>';

		if ($nav["nextUrl"] != "")
			echo '<div class="navNext"><a href="' . $nav["nextUrl"] . '"> ' . $icons["next"] . ' </a></div>';

		echo '</div><!--end nav wrapper-->';
		echo '<!--end navigation arrows-->';
	}

	echo '<!--header-->';
	echo '<header>';
	//echo $icons["menu"];
	echo '<div class="oduIcon"></div>';
	echo '<h1 class="courseTitle">' . $courseTitle . '</h1>';
	
	echo '<div class="topRightWrapper">';
	writeSearchBox();
	
	echo $icons["notification"];
	echo $icons["user"];
	echo '</div><!--end topRightWrapper-->';
	echo '</header><!--end header-->';
		
		
	if (!empty($breadCrumbs))
	{
		echo '<nav>';
		echo '<ul class="breadCrumbs">';
		
			//stop short of last item because it will be text instead of a link
			for ($i = 0; $i < count($breadCrumbs); $i++)
			{
				echo '<li><a href="' . $breadCrumbs[$i]["url"] . '">' . $breadCrumbs[$i]["title"] . '</a>&nbsp;</li>';
			}
			
			//not link
			echo '<li>' . array_pop($breadCrumbs)["title"] . '</a></li>';
			
			
		echo '</ul>';
		echo '</nav><!--end navigation-->';
	}
	writeCourseInfoMenu();
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
	echo '<div id="cssmenu">';
	echo '<ul>';
	echo '<li><a href="#"><div class="iconCourseInfo"></div></a>';
    echo '<ul>';
	echo '<li><a href="#"><span>Faculty</span></a></li>';
	echo '<li><a href="#"><span>Syllabus</span></a></li>';
	echo '<li><a href="#"><span>Schedule</span></a></li>';
	echo '<li><a href="#"><span>Assignments</span></a></li>';
	echo '</ul></li><!--end sub list-->';
	//echo '<li><a href="#"><div class="iconHelp"></div></a></li>';
	echo '<li><a href="#"><div class="iconUpcoming"></div></a>';
	echo '<ul>';
	echo '<li><a href="#"><span>1/18/2015<br>2.C Homework #1</span></a></li>';
	echo '<li><a href="#"><span>1/19/2015<br>2.D Module Feedback</a></li>';
	echo '<li><a href="#"><span>1/19/2015<br>3. Bending of Beams</span></a></li>';
	echo '</ul></li><!--end sub list-->';
	echo '</ul><!--end big list-->';
	echo '</div>';
	echo '</div>';

}


function writeToggleBox($boxTitle, $isCollapsed, $isComplete){
	echo '<div class="boxWrapper">';
	$boxDivTag = '<div class="toggleBox ';
	$twistyDivTag = '<div class="twisty ';
	
	if ($isCollapsed){
		$boxDivTag .= 'collapsed ';
		$twistyDivTag .= ' collapsed ';
	}
	else{
		$boxDivTag .= 'expanded ';
		$twistyDivTag .= ' expanded ';
	}
	
	if ($isComplete){
		$boxDivTag .= 'complete ';
		$icon = "<div class='inline fa fa-check-circle fa-2x success'></div>";
	}
	else{
		$boxDivTag .= 'incomplete ';
		$icon = "";
	}
	
	$boxDivTag .= ' ">';
	
	echo $icon;
	echo $boxDivTag;
	echo '<a href="#">' . $boxTitle . '</a>';
	echo '</div></div>';
}


?>