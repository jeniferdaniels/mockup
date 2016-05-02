
<?php include_once 'mockupFunctions.php' ?>
<!doctype html>
<html>
	<head>
		<?php  includeCsss (); ?>
		<?php  includeScripts (); ?>
	</head>
	
	<body>
	<?php 
	$iconUses = ["aaq","assignment","assignmentlate","assignmentSubmitted",	"audio","bookmark","bookmarkopen",
				"chat",	"check", "collapsed", "current","edit",	"error", "excel", "expanded",
				"link", "menu", "next", "notification",	"notificationActive", "notes", "pin", "pdf", "powerPoint",
				"print", "previous", "resume", "settings", "search", "starFilled", "starHalf", "starOpen", "success",
				"user", "video", "warning",	"word",];
	
	$sizes = ["small", "medium", "large", "extraLarge", "huge", "enormous"];
	
	echo "<table><tr><td width='300'>Size</td><td width='300'> Google</td><td width='300'> Font Awesome</td></tr>";
	
	for ($i=0; $i<count($iconUses); $i++){
		echo "<tr><td colspan=3 style='background: black; color:white'>" . $iconUses[$i] . "</td></tr>";
		
		for ($j=0; $j<count($sizes); $j++){
			echo "<tr><td>" . $sizes[$j] . "</td>";
			echo "<td>" . icon("g", $iconUses[$i], $sizes[$j], "") . "</td>";
			echo "<td>" . icon("fa", $iconUses[$i], $sizes[$j], "") . "</td></tr>";
		}
		;
	}
	echo "</table>"
	?>
	
	</body>
</html>