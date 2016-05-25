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
		
		//Create the button funtionality
		jQuery.fn.exists = function(){return this.length>0;}
		
		function prepareList() {
			

			
			console.log("run prepareList");
			if ($("#moduleList").exists()){
				console.log("moduleList found");
			}
			else
				console.log("moduleList not found");
			
			
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
		
		/*function loadDataAndRun(url, funct, menuDiv, msg){
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
			*/
						console.log("run ajax load");
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
			
			//loadDataAndRun("sampleJson/sampleModuleListForNav.Json", writeModuleList, "odu_moduleListContainer", "There was an error loading moduleList");

			
			
			

			setTimeout(function(){ 
				prepareList();
				$("ul").addClass("parentsList");
			
			$("#moduleList li").each(function(){
				if ($(this).children("ul").length > 0){
					console.log("children found");
					$(this).addClass("parent");
					$(this).children("ul").addClass("parentsList");
				}
				else
				{
					console.log("childless found");
					$(this).addClass("noChildren");
					
				}
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
		<div id="odu_moduleListContainer">
			<!--<ul id="moduleList">
				<!--<li class="parent"><a href="#">0 Overview and Course Logistics</a>
					<ul class="parentsList">
						<li class="parent"><a href="#">0.1 Welcome</a>
							<ul class="parentsList">
								<li class="noChildren"><a href="#">0.1.0 Introduction</a></li>
								<li class="noChildren"><a href="#">0.1.1 Online Learning Orientation</a></li>
								<li class="noChildren"><a href="#">0.1.2 Technical Support</a></li>
							</ul>
						</li>
						<li class="noChildren"><a href="#">0.2 Summary</a></li>
						<li class="noChildren"><a href="#">0.R Resources</a></li>
						<li class="parent"><a href="#">0.A Assignments</a>
							<ul class="parentsList">
								<li class="noChildren"><a href="#">0.A.1 Send Test Email</a></li>
								<li class="noChildren"><a href="#">0.A.2 Module Feedback</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="parent"><a href="#">1 Kitten Acquisition!</a>
					<ul class="parentsList">
						<li class="noChildren"><a href="#">1.1 Overview</a></li>
						<li class="parent"><a href="#">1.2 Factors to Consider When Choosing a Kitten</a>
							<ul class="parentsList">
								<li><a href="#">1.2.2 Responsibility</a></li>
								<li><a href="#">1.2.3 Cost</a></li>
							</ul>
						</li>
						<li class="parent"><a href="#">1.3 Kitten Rescue</a>
							<ul class="parentsList">
								<li class="noChildren"><a href="#">1.3.1 Reasons to Rescue</a></li>
								<li class="noChildren"><a href="#">1.3.2 Hampton Roads Rescue Organizations</a></li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>-->
			
			
			<!--
			<li><a href="#"><h1>0 Overview and Course Logistics</h1></a>
				<ul>
					<li><a href="#"><h2>0.1 Welcome</h2></a>
						<ul>
							<li><a href="#">0.1.0 Introduction</a></li>
							<li><a href="#">0.1.1 Online Learning Orientation</a></li>
							<li><a href="#">0.1.2 Technical Support</a></li>
						</ul>
					</li>
					<li><a href="#"><h2>0.2 Summary</a></h2></li>
					<li><a href="#"><h2>0.R Resources</a></h2></li>
					<li><a href="#"><h2>0.A Assignments</h2></a>
						<ul>
							<li><a href="#">0.A.1 Send Test Email</a></li>
							<li><a href="#">0.A.2 Module Feedback</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="marginTop25"><a href="topicAlt.php?id=2"><h1>1 Kitten Acquisition!</h1></a>
				<ul>
					<li><a href="#">1.1 Overview</a></li>
					<li><a href="level2.html">1.2 Factors to Consider When Choosing a Kitten</a>
						<ul>
							<li><a href="level3.html">1.2.2 Responsibility</a></li>
							<li><a href="#">1.2.3 Cost</a></li>
						</ul>
					</li>
					<li><a href="#">1.3 Kitten Rescue</a>
						<ul>
							<li><a href="#">1.3.1 Reasons to Rescue</a></li>
							<li><a href="#">1.3.2 Hampton Roads Rescue Organizations</a></li>
						</ul>
					</li>
					<li><a href="#">1.4 Purchasing a Kitten</a>
						<ul>
							<li><a href="#">1.4.1 Reasons to Purchase A Kitten</a></li>
							<li><a href="#">1.4.2 Where to Buy</a></li>
						</ul>
					</li>
					<li><a href="#">1.5 Summary</a></li>
					<li><a href="#">1.R Resources</a></li>
					<li><a href="#">1.A Assignments</a>
						<ul>
							<li><a href="#">1.A.1 Homework #1</a></li>
							<li><a href="#">1.A.2 Discussion Forum #1</a></li>
							<li><a href="#">1.A.3 Quiz #1</a></li>
							<li><a href="#">1.A.4 Module Feedback</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="marginTop25"><a href="#"><h1>2 Caring for Your Kitten</h1></a>
				<ul>
					<li><a href="#">2.1 Overview</a></li>
					<li><a href="#">2.2 Bringing Your Kitten Home</a>
						<ul>
							<li><a href="#">2.2.2 Transporting our Kitten</a></li>
							<li><a href="#">2.2.3 Preparing the House</a></li>
						</ul>
					</li>
					<li><a href="#">2.3 Feeding and Grooming</a>
						<ul>
							<li><a href="#">2.3.1 Feeding Guidelines</a></li>
							<li><a href="#">2.3.2 Grooming</a></li>
						</ul>
					</li>
					<li><a href="#">2.4 Entertaining</a>
						<ul>
							<li><a href="#">2.4.1 Toys</a></li>
							<li><a href="#">2.4.2 Cat Nip</a></li>
							<li><a href="#">2.4.3 Other Pets</a></li>
						</ul>
					</li>
					<li><a href="#">2.5 Summary</a></li>
					<li><a href="#">2.R Resources</a></li>
					<li><a href="#">2.A Assignments</a>
						<ul>
							<li><a href="#">2.A.1 Homework #2</a></li>
							<li><a href="#">2.A.2 Discussion Forum #2</a></li>
							<li><a href="#">2.A.3 Homework #3</a></li>
							<li><a href="#">2.A.4 Module Feedback</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="marginTop25"><a href="#"><h1>3 Legal Requirements</h1></a>
				<ul>
					<li><a href="#">3.1 Overview</a></li>
					<li><a href="#">3.2 Vaccinations</a>
						<ul>
							<li><a href="#">3.2.1 Initial</a></li>
							<li><a href="#">3.2.2 Rabies</a></li>
						</ul>
					</li>
					<li><a href="#">3.3 City Regulations</a>
						<ul>
							<li><a href="#">3.3.1 Licensing</a></li>
							<li><a href="#">3.3.2 Leash Laws</a></li>
							<li><a href="#">3.3.3 Maximum Occupancy</a></li>
						</ul>
					</li>
					<li><a href="#">3.4 Summary</a></li>
					<li><a href="#">3.R Resources</a></li>
					<li><a href="#">3.A Assignments</a>
						<ul>
							<li><a href="#">3.A.1 Homework #4</a></li>
							<li><a href="#">3.A.2 Discussion Forum #3</a></li>
							<li><a href="#">3.A.3 Final Exam</a></li>
							<li><a href="#">3.A.4 Module Feedback</a></li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
		-->
	
		</div>
	</body>
</html>
