<?php include_once 'config.php' ?>
<?php

function includeCsss(){
	echo '<meta charset="utf-8" />';

	echo '<link rel="stylesheet" type="text/css" href="' . WEB_ROOT . '/css/reset.css">' . PHP_EOL;
	echo '<link rel="stylesheet" type="text/css" href="' . WEB_ROOT . '/fonts/font-awesome/css/font-awesome.min.css">' . PHP_EOL;
	
	echo '<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" >' . PHP_EOL;
	echo '<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">' . PHP_EOL;
	//echo '<link rel="stylesheet" type="text/css" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">';
	
	echo '<link rel="stylesheet" type="text/css" href="' . WEB_ROOT . '/css/pleStyle.css">' . PHP_EOL;
	//echo '<link rel="stylesheet" type="text/css" href="' . WEB_ROOT . '/css/courseMaterial.css">' . PHP_EOL;
	echo '<link rel="stylesheet" type="text/css" href="' . WEB_ROOT . '/css/contentLayoutStyle.css">' . PHP_EOL;
	echo '<link rel="stylesheet" type="text/css" href="' . WEB_ROOT . '/css/navArrowStyle.css">' . PHP_EOL;
	echo '<link rel="stylesheet" type="text/css" href="' . WEB_ROOT . '/css/modal.css">' . PHP_EOL;
	echo '<link rel="stylesheet" type="text/css" href="' . WEB_ROOT . '/css/jquery-ui-1.10.4.custom.css">' . PHP_EOL;
}

function includeScripts()
{
	echo '<script src="' . WEB_ROOT . '/scripts/js/jquery-2.1.3.min.js"></script>';
	echo '<script src="' . WEB_ROOT . '/scripts/js/jquery-ui.min.js"></script>';
	echo '<script src="' . WEB_ROOT . '/scripts/js/kbNavigate.js"></script>';
	echo '<script src="' . WEB_ROOT . '/scripts/js/queryStringFunctions.js"></script>';
	echo '<script src="' . WEB_ROOT . '/scripts/js/courseFunctions.js"></script>';
	
}


function writeTopHtml()
{
	$menuIcon = icon("g", "menu", "l", "");
	$userIcon = icon("g", "user", "l", "topUpperButton");
	$chatIcon = icon("g", "chat", "l", "topUpperButton");
	$searchIcon = icon("g", "search", "l", "topUpperButton");
	//$editIcon = icon ("fa", "edit", "l", "topUpperButton");
	

	
	echo '<div class="topWrapper">';
		echo'<header>';
			echo'<nav id="nav">';
				echo '<ul>';
					echo '<li id="dropDownMenu"><a href="#">' .$menuIcon .'</a>';
						echo '<ul>';
							echo '<li><a href="#" id="announcementsLink">Announcements</a></li>';
							echo '<li><a href="assignments.php" id="assignmentsLink">Assignments</a></li>';
							echo '<li><a href="#" id="aaqLink">Ask A Question</a></li>';
							echo '<li><a href="#" id="glossaryLink">Course Glossary</a></li>';
							echo '<li><a href="#" id="courseProgressLink">Course Progress</a></li>';
							echo '<li><a href="faculty.php" id="facultyLink">Faculty</a></li>';
							echo '<li><a href="#" id="helpLink">Help</a></li>';
							echo '<li><a href="notes.php" id="notesLink">Notes</a></li>';
							echo '<li><a href="schedule.php" id="scheduleLink">Schedule</a></li>';
							echo '<li><a href="syllabus.php" id="syllabusLink">Syllabus</a></li>';
							echo '</ul>';
					echo '</li>';
					echo '<li><a href="#" id="userLink">' . $userIcon .'</a>';
						echo '<ul>';
							echo '<li><a href="#" id="profileLink">Profile</a></li>';
							echo '<li><a href="#" id="preferencesLink">Preferences</a></li>';
						echo '</ul>';
					echo '</li>';	
					echo '<li><a href="javascript:whatWouldThisDo(\'chat\')" id="chatLink">' .$chatIcon .'</a></li>';
					echo '<li><a href="#" id="searchLink">'. $searchIcon . '</a></li>';
					//echo '<li><a href="#" id="adminLink" style="color: rgba(255, 102, 0, 1)">'. $editIcon . '</a></li>';
					echo '</ul>';
			echo '</nav>';
			echo '<div style="clear:both"></div>';
			echo '<a href="' . WEB_ROOT . '"><div id="logo" class="oduOnlineLogo"></div></a>';
			echo '<h1 id="courseTitle"></h1>';
			echo '<h2 id="courseInstructor"><span>Fall 2015</span>Instructors - <a href="' . WEB_ROOT . '/faculty.php?midas=jdani001">Jen Daniels,</a> <a href="' . WEB_ROOT . '/faculty.php?midas=dmarceli">Dexter Marcelino</a>, <a href="' . WEB_ROOT . '/faculty.php?midas=grodrigu">Gabriel Rodriguez</a></h2>';
		echo '</header>';
		
		
		//echo '<div id="editTab">' . icon("g", "edit", "l", "") . " <span>Edit</span></div>";
		
	echo '</div><!--end topWrapper-->';
}


function writeModuleProgressBar(){
	echo '<div class="moduleProgressWrapper">';
	echo '<progress class="moduleProgressBar" value="30" max="100" title="30%" id="moduleProgressBar"></progress>';
	echo '<div class="moduleProgressTitle">Module Progress</div>';
	echo '</div>';
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
		echo '<div id="modalContentWrapper">';
			echo '<div id="content">';
				echo '<div id="eventIcon" class="assignmentIcon"></div>';
				echo '<h1 id="modalTitle"></h1>';
				echo '<h3 id="assignmentTitle"></h3>';
	
				echo '<ul id="assignmentProperties" class="assignmentProperties">';
					echo '<li><div id="dueHeader">Due- </div><div id="due"></div></li>';
					echo '<li><div id="submitHeader">Submit via- </div><div id="submitVia"></div></li>';
					echo '<li><div id="deliverableHeader">Deliverable- </div><div id="deliverable"></div></li>';
				echo '</ul>';
					
				echo '<p id="eventDate"></p>';
				echo '<p id="description"></p>';
	
				echo '<div id="checkmarkWrapper" class="checkmarkWrapper">';
					echo '<div id="checkmark" class="checkmark disabled">' . icon("g", "check", "xl", "") . '</div>';
					echo '<div id="checkmarkCaption" class="checkmarkCaption"></div>';
					echo '<div id="checkmarkDisclaimer" class="checkmarkDisclaimer"></div>';
				echo '</div>';
							
				echo '<div style="clear: both"></div>';
			echo '</div>';
		echo '</div>';
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
	echo '<ul id="tools" style="height: 300px; margin-left: 0px;">';
		
	/*if ($showGlossary)
		echo '<li id="glossaryToolListItem" title="Module Glossary">'. icon("fa", "glossary", "l", "") . 'Glossary</li>';	
				
	if ($showAAQ)
		echo '<li id="aaqToolListItem" title="Show Ask A Question">' . icon("g", "aaq", "l", "") . 'Ask A Question</li>';
	
	if ($showFeedback)
		echo '<li id="feedbackToolListItem" title="Give Feedback">' . icon("g", "feedback", "l", "") . 'Give Feedback</li>';
	
	echo '<li id="printToolListItem" title="Print">'. icon("g", "print", "l", "") . 'Print</li>';
	
	echo '</ul>';
	*/
	/*echo '<ul id="editBox">';
	if ($showEdit)
		echo '<li id="editToolListItem" title="Edit">'. icon("g", "edit", "l", "") . 'Edit</li>';
	*/
	echo '</ul>';
}

function writeToolsAlt($showEdit){
	echo '<div id="odu_toolboxAlt" class="odu_toolboxAlt">';
	
		echo '<ul id="odu_toolsAlt" class="odu_toolsAlt">';
			echo '<li><a href="index.php"><div id="dashboardIcon" class="odu_dashboardIcon"></div><span>Dashboard</span></a></li>';

			echo '<li><a href=#>'. icon("fa", "assignment", "xl", "") .'<span>Assignments</span></a></li>';
			echo '<li><a href=#>'. icon("fa", "modules", "xl", "") . '<span>Modules</span></a></li>';
			echo '<li><a href=#>'. icon("fa", "print", "xl", "") . '<span>Print</span></a></li>';
	
			if ($showEdit){
				echo '<li><a href=#>'. icon("fa", "edit", "xl", "") . '<span>Edit</span></a></li>';
				echo '<li><a href=#>'. icon("fa", "admintools", "xl", "") . '<span>Admin Tools</span></a></li>';
			}
		echo '</ul>';
	echo '</div>';
}


function writeStarRating($rating){
	//needs to come in as
	//3:4 or  3.5:4
	$hasHalfStar = 0;
	$starInfo = explode(":", $rating);
	$goodStars = explode(".", $starInfo[0]);
	$wholeStars = $goodStars[0];
	$totalStars = $starInfo[1];
	
	$starString = "";
	
	for ($i=0; $i<$wholeStars; $i++)
		$starString .= icon("fa", "starFilled", "s", "");
	if (sizeOf($goodStars) > 1){
		$starString .= icon("fa", "starhalf", "s", "");
		$hasHalfStar = 1;
	}

	$emptyStars = $totalStars - $wholeStars - $hasHalfStar;
	
	for($j=0; $j<$emptyStars; $j++)
		$starString .= icon("fa", "staropen", "s", "");	
		
		
	echo $starString;	
		
}


function writeDummyGlossaryTerms($count) {
	
	$htmlString = "<dl><dt>Ailurophile</dt>";
	$htmlString .= "<dd>One who loves cats.</dd>";

	$htmlString .= "<dt>Ailurophobe</dt>";
	$htmlString .= "<dd>One who hates or fears cats.</dd>";

	$htmlString .= "<dt>Caregiver</dt>";
	$htmlString .= "<dd>person responsible for a pet cat or for a feral colony; these days the term 'owner' suffers from political incorrectness.</dd>";

	$htmlString .= "<dt>Domestic</dt>";
	$htmlString .= "<dd>an animal which has become adapted to humans over many generations, has a genetic predisposition to tameness.</dd>";

	$htmlString .= "<dt>Feral</dt>";
	$htmlString .= "<dd>an ex-domestic cat which has reverted to being fully wild or the wild-born (never known domesticity) offspring of stray cats.</dd>";

	$htmlString .= "<dt>Guardian</dt>";
	$htmlString .= "<dd>another 'politically correct' term for a pet cat's owner or a feral cat's caregiver.</dd>";

	$htmlString .= "<dt>Pedigreed</dt>";
	$htmlString .= "<dd>A cat whose lineage has been tracked.  Points: The coldest parts of the cats body, such as the face, ears, legs and tail. Often the coat on these parts is different than the body color.</dd></dl>";

	echo $htmlString;
	
}

function writeProgressNavBar(){
	echo "<div class='odu_progressNavBar'>";
		for ($i=0; $i<5; $i++)
		{
			echo "<a href='#'></a>";
		}
		for ($i=0; $i<8; $i++)
		{
			echo "<a href='#' class='new'></a>";
		}
	echo "</div>";
}

//***********************************************************************************************************************
//Name:  	icon
//Purpose:	writes an icon, by checking for the type (currently only 2 are supported) and builds the string associated
//			with that icon
//Input:	font type: "g" for Google Material Design icons, "fa" for Font Awesome icons
//			icon use: various values (see code below) indicating what the icon stands for or its use
//			size: the size of the icon, "small", "medium", "large", "extralarge" or "huge"
//				  note abbreviations are acceptable "s", "m", "l", "xl", "h"
//				  also note, Google "huge" icons are the same as the "extralarge"
//			other style: other user defined styles that want to be added, example "urgent" will set the color red
//Returns:	icon written to screen
//***********************************************************************************************************************


function icon ($fontType, $iconUse, $size, $otherStyle){
	//do some error checking before we begin
	$fontType = strtolower($fontType);
	$iconUse = strtolower($iconUse);
	$size = strtolower($size);
	
	$iconString = "";
	
	//currently this is only set to use google and font awesome typographic icons
	if (($fontType != "g") AND ($fontType != "fa")){trigger_error("Font type '" . $fontType . "' passed to icon function not found.");}

	//google and font-awesome also have different ways to make sizes
	$sizes = [
			"s" 			=> ["g" => "md-s", "fa" => ""], 
			"small" 		=> ["g" => "md-s", "fa" => ""],
			"m" 			=> ["g" => "md-m", "fa" => "fa-lg"],
			"medium" 		=> ["g" => "md-m", "fa" => "fa-lg"],
			"l" 			=> ["g" => "md-l", "fa" => "fa-2x"],
			"large" 		=> ["g" => "md-l", "fa" => "fa-2x"],
			"extralarge" 	=> ["g" => "md-xl", "fa" => "fa-3x"],
			"xlarge" 		=> ["g" => "md-xl", "fa" => "fa-3x"],
			"xl" 			=> ["g" => "md-xl", "fa" => "fa-3x"],
			"huge" 			=> ["g" => "md-h", "fa" => "fa-4x"],
			"h" 			=> ["g" => "md-h", "fa" => "fa-4x"],
			"enormous"		=> ["g" => "md-e", "fa" => "fa-5x"],
			"e"				=> ["g" => "md-e", "fa" => "fa-5x"] //TODO: write fa-6x style				
	];	
	
	if (!array_key_exists($size, $sizes)){trigger_error("Size '" . $size . "' passed to icon function not found.");}
	
	
   //google and font-awesome have different words for the icons, this is a map
	$iconUses = [ 
		"admintools" 		  => ["g" => "business_center", 		"fa" => "briefcase"],
		"aaq" 				  => ["g" => "forum", 					"fa" => "question-circle"],
		"assignment" 		  => ["g" => "assignment", 				"fa" => "file-text-o"],
		"assignmentlate" 	  => ["g" => "assignment_late",			"fa" => "file-text-o"],
		"assignmentsubmitted" => ["g" => "assignment_turned_in",	"fa" => "file-text"],
		"audio" 			  => ["g" => "audiotrack", 				"fa" => "file-audio-o"],
		"bookmark" 			  => ["g" => "bookmark",				"fa" => "bookmark"],
		"bookmarkopen" 		  => ["g" => "bookmark",				"fa" => "bookmark-o"],
		"chat" 				  => ["g" => "chat_bubble_outline", 	"fa" => "comments"],
		"check" 			  => ["g" => "check",					"fa" => "check-circle"],
		"collapsed" 		  => ["g" => "expand_less", 			"fa" => "angle-double-right"],
		"current" 			  => ["g" => "arrow_forward", 			"fa" => "arrow-right"],
		"edit" 				  => ["g" => "create", 					"fa" => "pencil"],
		"error" 			  => ["g" => "error", 					"fa" => "exclamation-circle"],
		"excel" 			  => ["g" => "", 						"fa" => "file-excel-o"],
		"expanded" 			  => ["g" => "expand_less", 			"fa" => "angle-double-down"],
		"feedback"			  => ["g" => "feedback",				"fa" => "comment"],
		"glossary"			  => ["g" => "list", 					"fa" => "book"],
		"link" 				  => ["g" => "link", 					"fa" => "link"],
		"menu" 	  	 		  => ["g" => "menu", 					"fa" => "bars"],
		"modules"  	 		  => ["g" => "school", 					"fa" => "folder-o"],
 		"next" 			  	  => ["g" => "navigate_next",			"fa" => "angle-right"],
 		"notification" 	  	  => ["g" => "notifications", 			"fa" => "bell-o"],
		"notificationactive"  => ["g" => "notifications_active",  	"fa" => "bell-o"],		
		"notes" 			  => ["g" => "", 						"fa" => "sticky-note-o"],
		"pin" 				  => ["g" => "", 						"fa" => "thumb-tack"],
		"pdf" 				  => ["g" => "", 						"fa" => "file-pdf-o"],
		"powerpoint" 		  => ["g" => "", 						"fa" => "powerpoint-o"],
		"print" 			  => ["g" => "print", 					"fa" => "print"],
		"previous" 			  => ["g" => "navigate_before", 		"fa" => "angle-left"],
		"resume" 			  => ["g" => "play_arrow",				"fa" => "arrow-right"],
		"settings" 			  => ["g" => "settings",				"fa" => "cog"],
		"search" 			  => ["g" => "search", 					"fa" => "search"],
		"starfilled" 		  => ["g" => "star", 					"fa" => "star"],
		"starhalf" 			  => ["g" => "star_half", 				"fa" => "star-half-o"],
		"staropen" 			  => ["g" => "star_border", 			"fa" => "star-o"],
		"success" 			  => ["g" => "check", 					"fa" => "check-circle"],
		"user" 				  => ["g" => "person", 					"fa" => "user"],
		"video" 			  => ["g" => "theaters",				"fa" => "file-video-o"],
		"warning"			  => ["g" => "warning",					"fa" => "exclamation-triangle"],
		"word" 				  => ["g" => "", 						"fa" => "file-word-o"]	
	];																																		
	
	
	if (!array_key_exists($iconUse, $iconUses)){trigger_error("Icon '" . $iconUse . "' passed to icon function not found.");}
	
	
	//google strings are formatted as follows:
	//'<i class="material-icons md-18">chat</i>';
	$dummyUse = $iconUses[$iconUse];
	$dummySize = $sizes[$size];
	if ($fontType == "g") { 
		$iconString = '<i class="material-icons ' . $dummySize["g"] . ' ' . $otherStyle . '">' . $dummyUse["g"] . '</i>';
	}
	//font-awesome strings are formatted as follows:
	//'<i class="fa fa-question-circle fa-3x fa-fw"></i>'
	else if ($fontType == "fa"){
		$iconString = '<i class="fa fa-fw fa-' . $dummyUse["fa"] . ' ' . $dummySize["fa"] . ' ' . $otherStyle .'"></i>'; 
	}

	return $iconString;
	
}


?>