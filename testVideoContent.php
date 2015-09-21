<?PHP include_once 'iconVariables.php' ?>
<?PHP include_once 'mockupFunctions.php' ?>
<?PHP 
	$css = (isset($_GET['css'])? $_GET['css']: "oduColors.css");	
	$page = (isset($_GET['iFramePage'])? $_GET['iFramePage']: "testTags.php");	

	$icons = array (
		"prev" 			=> $iconNavPrevious,
		"next" 			=> $iconNavNext,
		"menu" 			=> $iconHamburgerMenu,
		"notification" 	=> $iconNotification,
		"user" 			=> $iconUser			
	);

	$nav = array(
		"prevUrl" 	=> 'testTextContent.php?css=' . $css ,
		"nextUrl" 	=> ''
	);

	$breadCrumbs = array (
		array ("url" => "testModuleList.php?css=". $css, "title" => 'Home'),
		array ("url" => "something", "title" => "2. Fundamental Principles"),
		array ("url" => "somethingElse", "title" => "2.1. Design of Machine Elements")
	);
	
?>

<!doctype html>
<html>
	<head>
		<?php writeHead('Test Video Content', $css); ?>
		<script>
			//shortcut.add("Ctrl+P",function() {
			//alert("Hi there!");
			//return false;
		//});
		</script>
	</head>
	
	<body>
		<?php writeTop($icons, $nav, 'MET 320 - Design of Machine Elements', $breadCrumbs); ?>
		
			
		<div class="moduleProgressWrapper">
			<progress class="moduleProgressBar" value="30" max="100"></progress>
			<div class="moduleProgressTitle">Module Progress</div>
		</div>
	
		<div class="contentWrapper" id="contentWrapper" style="width:1200px">
			
			<h2 class="contentTitle">2.2.2 Defining Engineering and the Design Process</h2>

			
			<div id="videoAndTranscriptWrapper" class="videoAndTranscriptWrapper">
				 <video width="800" height="450" controls id="video" class="video">
					<source src="http://www.kaltura.com/p/1509371/sp/0/playManifest/entryId/0_ktfmf1w6/format/url/flavorParamId/487081/video.mp4" type="video/mp4">
				</video> 

				<div id="transcript" class="transcript" style="display:none">
					<?php include_once "transcript.html" ?>	
				</div>
	

			</div>
			
			
			
			<a href="javascript:makeRoomForTranscript()" id="toggleTranscript">View Transcript</a>
			
			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>
		</div>
		
		
		<script>
			function makeRoomForTranscript(){

				document.getElementById("contentWrapper").style.width = "1200px";
				document.getElementById("transcript").style = 'transcript';
				document.getElementById("toggleTranscript").innerHTML = "Hide Transcript";
				

				}
		
		
		</script>
		
		
		
	</body>
</html>
