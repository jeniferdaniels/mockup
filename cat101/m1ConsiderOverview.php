<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>
<?php 
	$navPrevious = "m1Factors.php";
	$navNext = "m1Responsibility.php";
	$showModuleProgress = 1;
	$pageTitle = "1.1.1 Overview";
	
	$breadCrumbs = array(
		array("url"=>"index.php", "displayTitle"=>"Home"),
		array("url"=>"index.php?isExpanded=0,1,0,0", "displayTitle"=>"1. Choosing a Kitten"),
		array("url"=>"m1Factors.php", "displayTitle"=>"1.1 Factors to Consider When Choosing a Kitten"),
		array("url"=>"", "displayTitle"=>$pageTitle));
?>

<!doctype html>
<html>
	<head>
		<?php writeHead($pageTitle); ?>
	</head>
	
	<body>
		<?php writeTop($navNext, $navPrevious, $showModuleProgress, $breadCrumbs); ?>
	
		<div class="contentWrapper" id="contentWrapper">
			
			<h2><?php echo $pageTitle ?></h2>
			<p>When I was a little girl, I had always wanted to find a kitten with a gorgeous bow as a gift for me-for my birthday or Christmas. I've grown up with cats around me all my life, but there was something about having a cat that was "mine" that really appealed to me. When I got my 2 cats I could call my own, I felt in love with cats even more.
			There are a lot of things that really need to be thought of before you add that new member to your family.</p>

			<img src="resources/kittenBow.jpg" style="float: left; margin: 10px;">
			<h3 class="paragraphTitle">Some Title</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>
				
			<footer><?php writeFooter() ?></footer>
		</div>
	</body>
</html>