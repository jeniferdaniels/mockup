<?PHP include_once 'iconVariables.php' ?>
<?PHP include_once 'mockupFunctions.php' ?>

<?PHP
	$css = (isset($_GET['css'])? $_GET['css']: "oduColors.css");	
	$page = (isset($_GET['iFramePage'])? $_GET['iFramePage']: "testTags.php");	
	$pageTitle = "Faculty";

	$nav = array(
		"prevUrl" 	=> '',		
		"nextUrl" 	=> ''
	);

	$breadCrumbs = array (	
		array ("url" => "testHome.php?css=". $css, "title" => 'Home'),
		array ("url" => "somethingElse", "title" => $pageTitle)
	);
	
	
	$showModuleProgress = 0;
?>

<!doctype html>
<html>
	<head>
		<?php writeHead('Test Faculty Content', $css); ?>
	</head>
	
	<body>
		<?php writeTop($nav, 'MET 320 - Design of Machine Elements', $breadCrumbs, $showModuleProgress, $css); ?>
		<?php writeCssChanger('testTextContent.php', $css); ?>

			

	
		<div class="contentWrapper">
			
			<h2 class="contentTitle"><?php echo $pageTitle ?></h2>
			
		
			<div class="column50Percent"><img src="images/professor.jpg" height="300px" width="450px"></div>
			<div class="column50Percent">
			   <h3 class="paragraphTitle">Some Title</h3>
			   <b>Phone:</b>555-555-5555
			   <br><b>Email:</b> <a href="mailto:someAddress@odu.edu">someAddress@odu.edu</a>
			   <br><b>Office Hours:</b> Monday - Friday, 10:00 AM - 10:15 AM
			   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.
			   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.
			</div>
		
			<h3 class="paragraphTitle">Some Title </h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.
			   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.
			   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>
				
		</div>
		
	</body>
</html>
