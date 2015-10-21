<!doctype html>

<html>
	<head>
		<title>Title Goes Here</title>
		<script src="../scripts/js/jquery-2.1.3.min.js"></script>
		<script src="../scripts/js/courseFunctions.js"></script>
		
		<script>

		$(document).ready(function(){
			populateCourse("json/kitten.json");
			
			});
		
		</script>
	</head>
	
	<body>
		<div id="hello">Hello Yall</div>

		<div id="something">Something Else</div>
		<div id="courseTitle">Course Title</div>
		<div id="instructorName">Instructor Name</div>
		<div id="instructorPhone">Instructor Phone</div>
		<div id="instructorEmail">Instructor Email</div>
		<div id="instructorContent">Instructor HTML content</div>
		
		
		<div id="modules"></div>
		
		
	</body>
</html>
