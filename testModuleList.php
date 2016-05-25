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
		<link rel="stylesheet" href="css/moduleList/collapsible-tree-theme.css" />	

		
		<script src="scripts/js/jquery-2.1.3.min.js"></script>
		<script src="scripts/js/jquery-ui.min.js"></script>
		<script src="scripts/js/utils.js"></script>
		<script src="scripts/js/moduleList/odu_moduleList.js"></script>
		<script src="scripts/js/moduleList/jquery.ntm.js"></script>
			
			
		<script>
		$(document).ready(function(){
		
			function loadDataAndRun(url, funct, menuDiv, msg){
				$.ajax({
					url: url,
					type: 'GET',
					dataType: 'json',
					success: function(data) { funct(data, menuDiv) },
					error: function() { console.log(msg); },
					xhrFields: { withCredentials: true	},
					crossDomain: true
				});
			}
			
			//loadDataAndRun("sampleJson/sampleModuleListForNav.Json", writeModuleList, "tree-menu", "There was an error loading moduleList");
			$(".demo").ntm();
			});
		</script>
			
	</head>
	<body>
		<header id="header"></header>

		
		<div id="tree-menu" class="tree-menu demo">
			<ul>
				<li><a href="#">0 Overview and Course Logistics</a>
					<ul>
						<li><a href="#">0.1 Welcome</a>
							<ul>
								<li><a href="#">0.1.0 Introduction</a></li>
								<li><a href="#">0.1.1 Online Learning Orientation</a></li>
								<li><a href="#">0.1.2 Technical Support</a></li>
							</ul>
						</li>
						<li><a href="stuff.php">0.2 Summary</a></li>
						<li><a href="#">0.R Resources</a></li>
						<li><a href="#">0.A Assignments</a>
							<ul>
								<li><a href="#">0.A.1 Send Test Email</a></li>
								<li><a href="#">0.A.2 Module Feedback</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li><a href="#">1 Kitten Acquisition!</a>
					<ul>
						<li><a href="#">1.1 Overview</a></li>
						<li><a href="#">1.2 Factors to Consider When Choosing a Kitten</a>
							<ul>
								<li><a href="#">1.2.2 Responsibility</a></li>
								<li><a href="#">1.2.3 Cost</a></li>
							</ul>
						</li>
						<li><a href="#">1.3 Kitten Rescue</a>
							<ul>
								<li><a href="#">1.3.1 Reasons to Rescue</a></li>
								<li><a href="#">1.3.2 Hampton Roads Rescue Organizations</a></li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</body>
</html>
