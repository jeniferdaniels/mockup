<?php include_once '../scripts/mockupFunctions.php' ?>

<?PHP
	$hId = (isset($_GET['hId'])? $_GET['hId']: "i");
	$pageTitle = $hId . " " . getPageTitle($hId);
	
	$showModuleProgress = 1;
	$showPrevNext = 1;
?>

<!doctype html>
<html>
	<head>
		<?php writeHead($pageTitle); ?>
	</head>
	
	<body>
		<?php writeTop($hId, $showModuleProgress, $showPrevNext); ?>
	
		<div class="contentWrapper" id="contentWrapper">
			
			<h2><?php echo $pageTitle ?></h2>

			
			<div id="videoAndTranscriptWrapper" class="videoAndTranscriptWrapper">
				 <video width="800" height="450" controls id="video" class="video">
					<source src="http://www.kaltura.com/p/1509371/sp/0/playManifest/entryId/0_ktfmf1w6/format/url/flavorParamId/487081/video.mp4" type="video/mp4">
				</video> 

				<div id="transcript" class="transcript" style="display:none">
					<?php include_once "transcript.php" ?>	
				</div>
	

			</div>
			
			
			
			<a href="javascript:makeRoomForTranscript()" id="toggleTranscript">View Transcript</a>
			
			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>
		</div>
		
		
		<script>
			function makeRoomForTranscript(){

				document.getElementById("contentWrapper").style.width = "1200px";
				document.getElementById("toggleTranscript").innerHTML = "Hide Transcript";
				document.getElementById("transcript").removeAttribute("style");  //weird work around to remove display:none above in chrome
				}
		
		
		</script>
		
		
		
	</body>
</html>
