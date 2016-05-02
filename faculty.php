<?php include_once 'scripts/mockupFunctions.php' ?>

<!doctype html>
<html>
	<head>
		<?php  includeCsss (); ?>
		<?php  includeScripts (); ?>
		
		<script>
			$(document).ready(function(){
				$.ajax({
					url: "cat101/json/kitten.json"
				}).done(function(obj) {

					//***************************************
					//set page content
					//***************************************
					setTop(obj);
					document.title = getCourseTitle(obj);
					$("#editToolLink").click(function(){		
						$("body").toggleClass("editingMode");			
					}); //edit link		
				});
			});
		</script>		

	</head>
	
	<body style="margin-top:140px">

		<div class="top" id="top"><?php writeTopHtml(); ?></div>

		<div class="odu_breadCrumbWrapper" id="breadCrumbWrapper">
			<nav>
				<ul class="odu_breadCrumbs" id="breadCrumbs">
					<li><a href="index.php">Home</a></li>
					<li id="thisCrumb">Faculty</li>
				</ul>
			</nav>
		</div>

		<div class="wrapper">
				<div class="fakeEditor" id="fakeEditor"><img src="/mockup/images/CKEditorSample.png"></div>
				<div id="courseMaterial">
					<div class="paper">
						<h2 id="pageTitle"></h2>
						<div id="content">						
								<img src="/mockup/cat101/resources/professor.jpg" height="300px" width="450px" style="float: left; padding-right: 10px">
							   <h3 class="paragraphTitle">Some Title</h3>
							   <b>Phone:</b>555-555-5555
							   <br><b>Email:</b> <a href="mailto:someAddress@odu.edu">someAddress@odu.edu</a>
							   <br><b>Office Hours:</b> Monday - Friday, 10:00 AM - 10:15 AM
							   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.
							   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.
								<div style="clear:both"></div>
									
								<h3 class="paragraphTitle">Some Title </h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.
							   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.
							   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>						
						</div>
					</div>
				</div>
				
				<div id="toolBox"><?php writeTools(false, false, true, true) ?></div>
				<div id="footer" class="footer"></div>
			</div>
		
		
		
		
		
	</body>
</html>
