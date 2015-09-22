<?php
//include_once $_SERVER['DOCUMENT_ROOT'] . "/lib/htmlLawed/htmLawed.php";	//use document root incase the directory of this page moves
//TODO: rewrite the html formatting

function writeCssChanger($page)
{
	echo '<div class="cssChanger">';
	echo '<ul>';
	echo '<li><a href="'. $page . '?css=style1.css">Style 1</a></li>';
	echo '<li><a href="'. $page . '?css=oduColors.css">Style 2</a></li>';
	echo '<li><a href="'. $page . '?css=style3.css">Style 3</a></li>';
	echo '</ul></div>';
	
}

function writeHead($pageTitle, $css){
	echo '<title>' . $pageTitle . '</title>';
	echo '<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.4.0/css/font-awesome.min.css">';
	echo '<link rel="stylesheet" type="text/css" href="css/' . $css . '">';
	//echo '<!--to capture keypres shortcuts-->';
	//echo '<script src="scripts/js/kbShortcuts.js"></script>';
	//echo '<script src="scripts/js/jquery-2.1.3.min.js"></script>';


	echo '<!--fonts from Adobe Typekit -->';
	echo '<script src="https://use.typekit.net/scm3ciw.js"></script>';
	echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
	echo "\r\n";
}
				
function writeTop($nav, $courseTitle, $breadCrumbs){
	echo '<!--navigation arrows -->';
	echo '<div class="navWrapper">';
	
	if (!empty($nav)){
		if ($nav["prevUrl"] != "")
			echo '<div class="navPrevious"><a href="' . $nav["prevUrl"] . '"><div class="fa fa-angle-left fa-5x"></div></a></div>';

		if ($nav["nextUrl"] != "")
			echo '<div class="navNext"><a href="' . $nav["nextUrl"] . '"><div class="fa fa-angle-right fa-5x"></div></a></div>';

		echo '</div><!--end nav wrapper-->';
		echo '<!--end navigation arrows-->';
	}

	echo '<!--header-->';
	echo '<header>';
	//echo $icons["menu"];
	//echo '<div class="oduIcon"></div>';
	echo '<div class="topLeftWrapper">';
	echo '<h1 class="courseTitle">' . $courseTitle . '</h1>';
	echo '</div><!--end left wrapper-->';
	
	echo '<div class="topRightWrapper">';
	writeSearchBox();
	
	echo '<i class="fa fa-bell fa-2x headIcon"></i>';
	echo '<i class="fa fa-user fa-2x headIcon"></i>';
	echo '</div><!--end topRightWrapper-->';
	echo '</header><!--end header-->';
		
		
	if (!empty($breadCrumbs))
	{
		echo '<nav>';
		echo '<ul class="breadCrumbs">';
		
			//stop short of last item because it will be text instead of a link
			for ($i = 0; $i < count($breadCrumbs)-1; $i++)
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
	echo '<div id="courseMenu">';
	echo '<ul>';
	echo '<li class="clearHover"><a href="#" class="courseMenuIcon clearHover"></a>';
    echo '<ul>';
	echo '<li><a href="#"><span>Faculty</span></a></li>';
	echo '<li><a href="#"><span>Syllabus</span></a></li>';
	echo '<li><a href="#"><span>Schedule</span></a></li>';
	echo '<li><a href="#"><span>Assignments</span></a></li>';
	echo '<li><a href="#"><span>Help</help></a></li>';
	echo '</ul><!--end big list-->';
	echo '</ul></div>';
	echo '</div>';

}


function writeToggleBox($boxTitle, $content, $isCollapsed, $isComplete, $css){
	echo '<div class="boxWrapper">';
	$boxDivTag = '<div class="toggleBox ';

	if ($isCollapsed){
		$boxDivTag .= 'collapsed ';
		$twisty = "<i class='fa fa-angle-double-right fa-lx'> </i>";
	}
	else{
		$boxDivTag .= 'expanded ';
		$twisty = "<i class='fa fa-angle-double-down fa-lx'> </i>";
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
	echo '<a href="#" class="boxTitle">' . $twisty . ' ' . $boxTitle . '</a>';
	
	if  ($content != ""){
		echo '<div>';
		include $content;
		echo '</div>';
	}
	
	echo '</div><!--end toggleBox-->';
	echo  '</div><!--end wrapper-->';
}


?>