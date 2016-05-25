<!doctype html>
<html>
	<head>
		<title>Test!</title>
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />
		
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="css/pleStyle.css">
		<link rel="stylesheet" href="css/contentLayoutStyle.css">
		<link rel="stylesheet" href="css/courseLandingStyle.css" />
		<link rel="stylesheet" href="css/moduleList/moduleListStyle.css" />	

		
		<script src="scripts/js/jquery-2.1.3.min.js"></script>
		<script src="scripts/js/jquery-ui.min.js"></script>
		<script src="scripts/js/utils.js"></script>
		<script src="scripts/js/moduleList/odu_moduleList.js"></script>

			
			
		<script>
			function prepareList() {			
				$('#moduleList').find('li:has(ul)')
				.click( function(event) {
					if (this == event.target) {
						$(this).toggleClass('expanded');
						$(this).children('ul').toggle('medium');
					}
					return false;
				})
				.addClass('collapsed')
				.children('ul').hide();

				//Create the button funtionality
				$('#expandList')
				.unbind('click')
				.click( function() {
					$('.collapsed').addClass('expanded');
					$('.collapsed').children().show('medium');
				});
				
				$('#collapseList')
				.unbind('click')
				.click( function() {
					$('.collapsed').removeClass('expanded');
					$('.collapsed').children().hide('medium');
				});

			}
			
			
			$.ajax({
				url: "sampleJson/sampleModuleListForNav.Json",
				type: 'GET',
				dataType: 'json',
				success: function(data) { writeModuleList(data, "odu_moduleListContainer") },
				error: function() { console.log("There was an error loading moduleList"); },
				xhrFields: { withCredentials: true	},
				crossDomain: true
			});
				
		
		$(document).ready(function(){
	
			setTimeout(function(){ 
				prepareList();
				$("ul").addClass("parentsList");
			
				$("#moduleList li").each(function(){
					if ($(this).children("ul").length > 0){
						$(this).addClass("parent");
						$(this).children("ul").addClass("parentsList");
					}
					else
						$(this).addClass("noChildren");
				});
			
			$('#moduleList .parentsList').hover(function(){$(this).parent().toggleClass("notHighlighted");});
			$('#moduleList .parent').hover(function(){$(this).children('ul').toggleClass("notHighlighted");});
			}, 100);
			
		});
		</script>
			
	</head>
	<body>
		<header id="header"></header>

		
		<div class="listControl"><a id="expandList">icon here</a>Expand All <!--<a id="collapseList"></a>Collapse All--></div>
		<div id="odu_moduleListContainer"></div>
	</body>
</html>
