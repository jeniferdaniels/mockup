<!doctype html>
<html>
	<head>
		<title>Test!</title>
			<link rel="stylesheet" type="text/css" href="css/reset.css">
			<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700">
			<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
			<link rel="stylesheet" type="text/css" href="css/pleStyle.css">
			<link rel="stylesheet" type="text/css" href="css/contentLayoutStyle.css">
			<link rel="stylesheet" href="css/courseLandingStyle.css" />
			<link rel="stylesheet" href="css/moduleList/moduleListStyle.css" />	

			
			<script src="scripts/js/jquery-2.1.3.min.js"></script>
			<script src="scripts/js/jquery-ui.min.js"></script>
			<script src="scripts/js/utils.js"></script>
			<script src="scripts/js/moduleList/odu_moduleList.js"></script>
			
			
			
		<script>
		$(document).ready(function(){
		
			function loadDataAndRun(url, funct, msg){
				$.ajax({
					url: url,
					type: 'GET',
					dataType: 'json',
					success: function(data) { funct(data) },
					error: function() { console.log(msg); },
					xhrFields: { withCredentials: true	},
					crossDomain: true
				});
			}
			
			loadDataAndRun("sampleJson/sampleModuleListForNav.Json", writeModuleList, "There was an error loading moduleList");
		
			});
		</script>
			
	</head>
	<body>
		<header id="header"></header>
		
		<div id="mList"></div>
		
		
	</body>
</html>
