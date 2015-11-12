<?php
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
	];	
	
	if (!array_key_exists($size, $sizes)){trigger_error("Size '" . $size . "' passed to icon function not found.");}
	
	
   //google and font-awesome have different words for the icons, this is a map
	$iconUses = [ 
		"aaq" 				  => ["g" => "forum", 					"fa" => "question-circle"],
		"assignment" 		  => ["g" => "assignment", 				"fa" => "file-text-o"],
		"assignmentlate" 	  => ["g" => "assignment_late",			"fa" => "file-text-o"],
		"assignmentsubmitted" => ["g" => "assignment_turned_in",	"fa" => "file-text-o"],
		"audio" 			  => ["g" => "", 						"fa" => "sound"],
		"bookmark" 			  => ["g" => "bookmark",				"fa" => ""],
		"chat" 				  => ["g" => "chat_bubble_outline", 			"fa" => "comments"],
		"check" 			  => ["g" => "check",					"fa" => "check-circle"],
		"collapsed" 		  => ["g" => "expand_more", 			"fa" => "angle-double-right"],
		"current" 			  => ["g" => "arrow_forward", 			"fa" => "arrow-right"],
		"edit" 				  => ["g" => "create", 					"fa" => "pencil"],
		"error" 			  => ["g" => "error", 					"fa" => ""],
		"excel" 			  => ["g" => "", 						"fa" => "excel-o"],
		"expanded" 			  => ["g" => "expand_less", 			"fa" => "angle-double-down"],
		"link" 				  => ["g" => "link", 					"fa" => "link"],
		"menu" 	  	 		  => ["g" => "menu", 					"fa" => "bars"],
		"notification" 	  	  => ["g" => "notifications", 			"fa" => "bell-o"],
		"notificationactive"  => ["g" => "notifications_active",  	"fa" => "bell-o"],		
		"notes" 			  => ["g" => "", 						"fa" => "pencil-square-o"],
		"pin" 				  => ["g" => "", 						"fa" => "thumb-tack"],
		"pdf" 				  => ["g" => "", 						"fa" => "pdf-o"],
		"powerpoint" 		  => ["g" => "", 						"fa" => "powerpoint-o"],
		"resume" 			  => ["g" => "", 						"fa" => "arrow-right"],
		"settings" 			  => ["g" => "settings",				"fa" => ""],
		"search" 			  => ["g" => "search", 					"fa" => "search"],
		"starfilled" 		  => ["g" => "star", 					"fa" => "star"],
		"starhalf" 			  => ["g" => "star_half", 				"fa" => "star-half-o"],
		"staropen" 			  => ["g" => "star_border", 			"fa" => "star-o"],
		"success" 			  => ["g" => "check", 					"fa" => "check-circle"],
		"user" 				  => ["g" => "person", 					"fa" => "user"],
		"video" 			  => ["g" => "theaters",				"fa" => "video-o"],
		"warning"			  => ["g" => "warning",					"fa" => ""],
		"word" 				  => ["g" => "", 						"fa" => "word-o"]
	];																																		
	
	
	if (!array_key_exists($iconUse, $iconUses)){trigger_error("Icon use '" . $iconUse . "' passed to icon function not found.");}
	
	
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