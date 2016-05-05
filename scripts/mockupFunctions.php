<?php include_once 'config.php' ?>
<?php

function includeCsss(){
	echo '<meta charset="utf-8" />';

	echo '<link rel="stylesheet" type="text/css" href="' . WEB_ROOT . '/css/reset.css">' . PHP_EOL;
	echo '<link rel="stylesheet" type="text/css" href="' . WEB_ROOT . '/fonts/font-awesome/css/font-awesome.min.css">' . PHP_EOL;
	
	echo '<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" >' . PHP_EOL;
	echo '<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">' . PHP_EOL;
	
	echo '<link rel="stylesheet" type="text/css" href="' . WEB_ROOT . '/css/pleStyle.css">' . PHP_EOL;
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
			echo '<div class="oduOnlineLogo"></div>';
			echo '<a href="' . WEB_ROOT . '"><h1 id="courseTitle">CAT 101: Introduction to Kittens</h1></a>';
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
			
			echo '<li><a href="' . WEB_ROOT . '">'. icon("fa", "home", "l", "") .'<span>Home</span></a></li>';
			echo '<li><a href=#>'. icon("fa", "syllabus", "l", "") .'<span>Syllabus</span></a></li>';
			echo '<li><a href=#>'. icon("fa", "modules", "l", "") . '<span>Modules</span></a></li>';
			echo '<li><a href=#>'. icon("fa", "calendar", "l", "") . '<span>Calendar</span></a></li>';

			echo '<li><a href=#>'. icon("g", "aaq", "l", "") . '<span>Ask A Question</span></a></li>';
			echo '<li><a href=#>'. icon("fa", "notes", "l", "") . '<span>Notes</span></a></li>';			
			echo '<li><a href=#>'. icon("fa", "print", "l", "") . '<span>Print</span></a></li>';
	
			if ($showEdit){
				echo '<li><a href=#>'. icon("fa", "edit", "l", "") . '<span>Edit</span></a></li>';
				echo '<li><a href=#>'. icon("fa", "admintools", "l", "") . '<span>Admin Tools</span></a></li>';
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
		"calendar"			  => ["g" => "date_range",			 	"fa" => "calendar"],
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
		"home" 				  => ["g" => "home", 					"fa" => "home"],
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
		"syllabus" 			  => ["g" => "assignment", 				"fa" => "file-text-o"],
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

function writeModuleList(){
	echo '<ul class="odu_moduleList"><li id="1209"><i id="check_1209" class="material-icons md-m success checkMark">check</i><div class="moduleTitle" id="title_1209"><i class="fa fa-fw fa-caret-right fa-lg googleBlue displayNone" id="module_1209_expanded"></i><i class="fa fa-fw fa-caret-down googleBlue fa-lg" id="module_1209_collapsed"></i>0 Overview and Course Logistics</div><ul class="moduleContentList" id="moduleContentList_1210"><li id="1210"><i id="check_1210" class="material-icons md-m success checkMark">check</i><div class="topicTitle" id="title_1210"><a href="topic.php?id=1210">0.1 Welcome</a></div><ul><li id="1211"><i id="check_1211" class="material-icons md-m success checkMark">check</i><a href="subtopicAlt.php?id=1211">0.1.0 Introduction</a></li><li id="1212"><i id="check_1212" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=1212">0.1.1 Online Learning Orientation</a></li><li id="1213"><i id="check_1213" class="material-icons md-m success checkMark">check</i><a href="subtopicAlt.php?id=1213">0.1.2 Technical Support</a></li><li id="1214"><i id="check_1214" class="material-icons md-m success checkMark">check</i><a href="subtopicAlt.php?id=1214">0.1.3 Summary</a></li></ul></li><li id="1215"><i id="check_1215" class="material-icons md-m success checkMark">check</i><a href="assignment.php?id=1215">0.A Send Test Email</a></li><li id="1217"><i id="check_1217" class="material-icons md-m success checkMark">check</i><a href="resources.php?id=1217">0.2 Module Resources</a></li><li id="1216"><i id="check_1216" class="material-icons md-m success checkMark">check</i><a href="assignment.php?id=1216">0.B Module Feedback</a></li></ul></li><li id="1"><i id="check_1" class="material-icons md-m hidden success checkMark">check</i><div class="moduleTitle" id="title_1"><i class="fa fa-fw fa-caret-right fa-lg googleBlue displayNone" id="module_1_expanded"></i><i class="fa fa-fw fa-caret-down googleBlue fa-lg" id="module_1_collapsed"></i>1 Kitten Acquisition!</div><ul class="moduleContentList" id="moduleContentList_2"><li id="2"><i id="check_2" class="material-icons md-m success checkMark">check</i><div class="topicTitle" id="title_2"><a href="topic.php?id=2">1.1 Factors to Consider When Choosing a Kitten</a></div><ul><li id="3"><i id="check_3" class="material-icons md-m success checkMark">check</i><a href="subtopicAlt.php?id=3">1.1.0 Overview</a></li><li id="4"><i id="check_4" class="material-icons md-m success checkMark">check</i><a href="subtopicAlt.php?id=4">1.1.1 Responsibility</a></li><li id="5"><i id="check_5" class="material-icons md-m success checkMark">check</i><a href="subtopicAlt.php?id=5">1.1.2 Cost</a></li><li id="6"><i id="check_6" class="material-icons md-m success checkMark">check</i><a href="subtopicAlt.php?id=6">1.1.3 Summary</a></li></ul></li><li id="17"><i id="check_17" class="material-icons md-m success checkMark">check</i><a href="assignment.php?id=17">1.A Homework #1</a></li><li id="7"><i id="check_7" class="material-icons md-m hidden success checkMark">check</i><div class="topicTitle" id="title_7"><a href="topic.php?id=7">1.2 Kitten Rescue</a></div><ul><li id="8"><i id="check_8" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=8">1.2.0 Overview</a></li><li id="9"><i id="check_9" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=9">1.2.1 Reasons to Rescue</a></li><li id="10"><i id="check_10" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=10">1.2.2 Hampton Roads Rescue Organizations</a></li><li id="33"><i id="check_33" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=33">1.2.3 Summary</a></li></ul></li><li id="18"><i id="check_18" class="material-icons md-m hidden success checkMark">check</i><a href="assignment.php?id=18">1.B Discussion Forum #1</a></li><li id="11"><i id="check_11" class="material-icons md-m hidden success checkMark">check</i><div class="topicTitle" id="title_11"><a href="topic.php?id=11">1.3 Purchasing a Kitten</a></div><ul><li id="12"><i id="check_12" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=12">1.3.0 Overview</a></li><li id="13"><i id="check_13" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=13">1.3.1 Reasons to Purchase A Kitten</a></li><li id="14"><i id="check_14" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=14">1.3.2 Where to Buy</a></li><li id="15"><i id="check_15" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=15">1.3.3 Summary</a></li></ul></li><li id="19"><i id="check_19" class="material-icons md-m hidden success checkMark">check</i><a href="assignment.php?id=19">1.C Quiz #1</a></li><li id="1020"><i id="check_1020" class="material-icons md-m hidden success checkMark">check</i><a href="resources.php?id=1020">1.4 Cat Resources</a></li><li id="1005"><i id="check_1005" class="material-icons md-m hidden success checkMark">check</i><a href="glossary.php?id=1005">1.5 Module Glossary</a></li><li id="20"><i id="check_20" class="material-icons md-m hidden success checkMark">check</i><a href="assignment.php?id=20">1.D Module Feedback</a></li></ul></li><li id="21"><i id="check_21" class="material-icons md-m hidden success checkMark">check</i><div class="moduleTitle" id="title_21"><i class="fa fa-fw fa-caret-right fa-lg googleBlue displayNone" id="module_21_expanded"></i><i class="fa fa-fw fa-caret-down googleBlue fa-lg" id="module_21_collapsed"></i>2 Caring for Your Kitten</div><ul class="moduleContentList" id="moduleContentList_22"><li id="22"><i id="check_22" class="material-icons md-m hidden success checkMark">check</i><div class="topicTitle" id="title_22"><a href="topic.php?id=22">2.1 Bringing Your Kitten Home</a></div><ul><li id="60"><i id="check_60" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=60">2.1.0 Overview</a></li><li id="23"><i id="check_23" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=23">2.1.1 Transporting our Kitten</a></li><li id="24"><i id="check_24" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=24">2.1.2 Preparing the House</a></li><li id="25"><i id="check_25" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=25">2.1.3 Summary</a></li></ul></li><li id="38"><i id="check_38" class="material-icons md-m hidden success checkMark">check</i><a href="assignment.php?id=38">2.A Homework #2</a></li><li id="26"><i id="check_26" class="material-icons md-m hidden success checkMark">check</i><div class="topicTitle" id="title_26"><a href="topic.php?id=26">2.2 Feeding and Grooming</a></div><ul><li id="27"><i id="check_27" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=27">2.2.0 Overview</a></li><li id="28"><i id="check_28" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=28">2.2.1 Feeding Guidelines</a></li><li id="29"><i id="check_29" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=29">2.2.2 Grooming</a></li><li id="30"><i id="check_30" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=30">2.2.3 Summary</a></li></ul></li><li id="39"><i id="check_39" class="material-icons md-m hidden success checkMark">check</i><a href="assignment.php?id=39">2.B Discussion Forum #2</a></li><li id="31"><i id="check_31" class="material-icons md-m hidden success checkMark">check</i><div class="topicTitle" id="title_31"><a href="topic.php?id=31">2.3 Entertaining</a></div><ul><li id="32"><i id="check_32" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=32">2.3.0 Overview</a></li><li id="330"><i id="check_330" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=330">2.3.1 Toys</a></li><li id="34"><i id="check_34" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=34">2.3.2 Cat Nip</a></li><li id="35"><i id="check_35" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=35">2.3.3 Other Pets</a></li><li id="36"><i id="check_36" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=36">2.3.4 Summary</a></li></ul></li><li id="40"><i id="check_40" class="material-icons md-m hidden success checkMark">check</i><a href="assignment.php?id=40">2.C Homework #3</a></li><li id="2010"><i id="check_2010" class="material-icons md-m hidden success checkMark">check</i><a href="resources.php?id=2010">2.4 Module Resources</a></li><li id="1040"><i id="check_1040" class="material-icons md-m hidden success checkMark">check</i><a href="glossary.php?id=1040">2.5 Glossary about Stuff</a></li><li id="41"><i id="check_41" class="material-icons md-m hidden success checkMark">check</i><a href="assignment.php?id=41">2.D Module Feedback</a></li></ul></li><li id="42"><i id="check_42" class="material-icons md-m hidden success checkMark">check</i><div class="moduleTitle" id="title_42"><i class="fa fa-fw fa-caret-right fa-lg googleBlue displayNone" id="module_42_expanded"></i><i class="fa fa-fw fa-caret-down googleBlue fa-lg" id="module_42_collapsed"></i>3 Legal Requirements</div><ul class="moduleContentList" id="moduleContentList_43"><li id="43"><i id="check_43" class="material-icons md-m hidden success checkMark">check</i><div class="topicTitle" id="title_43"><a href="topic.php?id=43">3.1 Vaccinations</a></div><ul><li id="44"><i id="check_44" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=44">3.1.0 Overview</a></li><li id="45"><i id="check_45" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=45">3.1.1 Initial</a></li><li id="46"><i id="check_46" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=46">3.1.2 Rabies</a></li><li id="47"><i id="check_47" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=47">3.1.3 Summary</a></li></ul></li><li id="55"><i id="check_55" class="material-icons md-m hidden success checkMark">check</i><a href="assignment.php?id=55">3.A Homework #4</a></li><li id="48"><i id="check_48" class="material-icons md-m hidden success checkMark">check</i><div class="topicTitle" id="title_48"><a href="topic.php?id=48">3.2 City Regulations</a></div><ul><li id="49"><i id="check_49" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=49">3.2.0 Overview</a></li><li id="50"><i id="check_50" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=50">3.2.1 Licensing</a></li><li id="51"><i id="check_51" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=51">3.2.2 Leash Laws</a></li><li id="52"><i id="check_52" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=52">3.2.3 Maximum Occupancy</a></li><li id="53"><i id="check_53" class="material-icons md-m hidden success checkMark">check</i><a href="subtopicAlt.php?id=53">3.2.4 Summary</a></li></ul></li><li id="56"><i id="check_56" class="material-icons md-m hidden success checkMark">check</i><a href="assignment.php?id=56">3.B Discussion Forum #3</a></li><li id="57"><i id="check_57" class="material-icons md-m hidden success checkMark">check</i><a href="assignment.php?id=57">3.C Final Exam</a></li><li id="5000"><i id="check_5000" class="material-icons md-m hidden success checkMark">check</i><a href="resources.php?id=5000">3.3 Module Resources</a></li><li id="201"><i id="check_201" class="material-icons md-m hidden success checkMark">check</i><a href="glossary.php?id=201">3.4 Module Glossary</a></li><li id="58"><i id="check_58" class="material-icons md-m hidden success checkMark">check</i><a href="assignment.php?id=58">3.D Module Feedback</a></li></ul></li></ul>';
}
?>