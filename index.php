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
				str += '<ul><li><?php echo $GLOBALS['listCurrentSpotSmall'] ?><a href="' + arr[i].resumeUrl + '"> Resume ' + arr[i].resumeTitle + '</a></li></ul></li>';
				}
				document.getElementById("courseList").innerHTML = str;
			}

			function writeUpcomingAssignments(arr) {
				var str = "";
				for(var i = 0; i < arr.length; i++) {
					str += '<li><div style="font-weight:600">' + arr[i].dueDate + '</div><ul><li><a href="' + arr[i].url + '">' + arr[i].subject + ' ' + arr[i].number + " - " + arr[i].title + '</a></li></ul></li>';
				}
				document.getElementById("upcomingAssignments").innerHTML = str;			
			}


			
		</script>
					
			
	</head>
	
	<body>
		<?php writeDashboardTop() ?>
	
	
	
		<div class="contentWrapper dashWrapper">
			<div class="dashLeftCol">
				<div class="scheduleGlanceWrapper">
					<?php writeDashWidgetTitle("Schedule At A Glance") ?>
					<iframe src="calendar/demos/atAGlance.php" height="250px" style="padding:0; overflow-y: hidden" scrolling="no"></iframe>
				</div>
				
				<div style="margin-top: 50px">
					<?php writeDashWidgetTitle("Upcoming Assignments") ?>
					<ul id="upcomingAssignments" class="assignmentsList dashboardList">					
					</ul>
				</div>
				
			</div>
			<div class="dashCenterCol">
				
				<div>
				<?php writeDashWidgetTitle("Courses") ?>
					<ul id="courseList" class="courseList dashboardList" >
					</ul>
				</div>
				

				
				<div style="margin-top: 50px">
					<?php writeDashWidgetTitle("Recent Ask A Question Activity") ?>
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
					<?php writeDashWidgetTitle("Who's Online") ?>
					<ul id="whosOnline" class="whosOnlineList dashboardList">
					</ul>
				</div>
			
				<div style="margin-top: 50px">
					<?php writeDashWidgetTitle("Help") ?>
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
