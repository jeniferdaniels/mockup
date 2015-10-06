<?php include_once 'scripts/mockupFunctions.php' ?>
<?php include_once 'scripts/globalVariables.php' ?>

<!doctype html>
<html>
	<head>
		<?php writeHead("Dashboard Mockup"); ?>
		<script>
			var xmlhttp = new XMLHttpRequest();
			var url = "scripts/dashboardData.json";

			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var obj = JSON.parse(xmlhttp.responseText);
						
					
					writeWhosOnline(obj.widgets[0].users);
					writeCourseList(obj.widgets[1].courseList);
					writeUpcomingAssignments(obj.widgets[2].assignmentList);
				}
			}
			xmlhttp.open("GET", url, true);
			xmlhttp.send();
			
			
			
			
			function writeWhosOnline(arr) {
				var str = "";
				for(var i = 0; i < arr.length; i++) {
					str += '<li><a href="#">' + arr[i].name + '</a> (' + arr[i].course + ')</li>';
				}
				document.getElementById("whosOnline").innerHTML = str;			
			}
			
			function writeCourseList(arr){
				var str = "";
				
				for(var i = 0; i < arr.length; i++) {
							
				str += '<li><a href="' + arr[i].url + '">' + arr[i].subject + ' ' + arr[i].number + ' - ' + arr[i].title + '</a>';
				str += '<ul><li><?php echo $GLOBALS['listCurrentSpotSmall'] ?><a href="' + arr[i].resumeURL + '"> Resume ' + arr[i].resumeTitle + '</a></li></ul></li>';
				}
				document.getElementById("courseList").innerHTML = str;
			}

			function writeUpcomingAssignments(arr) {
				var str = "";
				for(var i = 0; i < arr.length; i++) {
					str += '<li><a href="' + arr[i].url + '">' + arr[i].dueDate + ' '  + arr[i].subject + ' ' + arr[i].number + '-' + arr[i].title + '</a></li>';
				}
				document.getElementById("upcomingAssignments").innerHTML = str;			
			}


			
		</script>
					
			
	</head>
	
	<body>
		<div style="width:100%; background-color:blue">stuff</div>
	
	
	
		<div class="dashWrapper">
			<div class="dashLeftCol">
				<div class="scheduleGlanceWrapper">
					<?php writeDashTitle("Schedule At A Glance") ?>
					<iframe src="calendar/demos/atAGlance.html" height="300px" style="padding:0"></iframe>
				</div>
				
				<div style="margin-top: 50px">
					<?php writeDashTitle("Upcoming Assignments") ?>
					<ul id="upcomingAssignments" class="assignmentsList dashboardList">					
					</ul>
				</div>
				
			</div>
			<div class="dashCenterCol">
				
				<div>
				<?php writeDashTitle("Courses") ?>
					<ul id="courseList" class="courseList dashboardList" >
					</ul>
				</div>
				

				
				<div style="margin-top: 50px">
					<?php writeDashTitle("Recent Ask A Question Activity") ?>
					<ul>
						<li>stuff</li>
						<li>stuff</li>
						<li>stuff</li>
						<li>stuff</li>
					</ul>
				</div>
			</div>
			
			<div class="dashRightCol">
				<div>
					<?php writeDashTitle("Who's Online") ?>
					<ul id="whosOnline" class="whosOnlineList dashboardList">
					</ul>
				</div>
			
				<div style="margin-top: 50px">
					<?php writeDashTitle("Help") ?>
					<ul>
						<li>stuff</li>
						<li>stuff</li>
						<li>stuff</li>
						<li>stuff</li>
					</ul>
				</div>
			
			
			</div>
		</div>

	</body>
</html>
