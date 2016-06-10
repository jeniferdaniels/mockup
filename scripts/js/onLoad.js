//functions that are run onLoad


function writePageHeader(topDiv, courseData){
	hasProblem = true;

	//check to see that object is not empty, if it is then display minimal header
	if (!((topDiv == "")	|| (typeof topDiv === undefined) || (topDiv == null)))
	{
		if ((courseData == "")	|| (typeof courseData === undefined) || (courseData == null)) {
			$(topDiv).prepend($("<div>").html("Missing data for header.")); 
		}
		else 
		{
			//make sure the things that are needed are here, otherwise fill it in with blanks, so the show can go on
			var expectedKeys = ["course_title", "course_number", "course_subject", "semester_display", "faculties", "potatoe"];
			//var expectedFacKeys = ["preferred_name", "email"];
			var groomedCourseData = [];
			
			//load only the keys we need and load it with "unknown" if the key dne
			//TODO: does it matter that there are extra keys?, fix later
			for (var i=0; i< expectedKeys.length; i++)
				groomedCourseData[expectedKeys[i]] = (courseData.hasOwnProperty(expectedKeys[i]))? courseData[expectedKeys[i]] : "unknown";

			//have to cut the title short for the longer courses. 
			//TODO:There has to be a limit in banner. What is it?
			//50 fits in the header at 2.2rem
			displayedCourseTitle = (groomedCourseData.course_subject + " " + groomedCourseData.course_number + " " + groomedCourseData.course_title).substr(1, 50);
			
		
			//now display it
			$(topDiv).append($("<div>").attr("id", "odu_topWrapper").addClass("topWrapper")
				.append($("<header>")
						.append($("<nav>").attr("id", "nav")
							.append($("<ul>")
								.append($("<li>").append($("<a>").attr("href", "http://google.com").attr("id", "userLink").html("XX")))
								.append($("<li>").append($("<a>").attr("href", "https://placekitten.com/").attr("id", "userLink").html("XX")))
							)//end ul	
						)//end nav
						.append($("<div>").addClass("clearFix"))
						.append($("<div>").addClass("oduOnlineLogo"))
						.append($("<a>").attr("href", "\mockup").append($("<h1>").attr("id", "courseTitle").html(displayedCourseTitle)))
						.append($("<h2>").attr("id", "courseInstructorTitle")
								.append($("<span>").attr("id", "semester").html(groomedCourseData.semester_display))
								.append($("<span>").attr("id", "Instructor").html(" Instructor(s)"))
								.append($("<a>").attr("id", "courseInstructor").attr("href", "faculty").html("Jen Daniels"))
						)//end h2
					)//end header
				)//end div
		}
		hasProblem = false;
	} 
	else { $("#errorMsg").html("Cannot load header, top div missing."); }
	return hasProblem;
}


function writeHomeSkeleton(){
	
	console.log("loading home skeleton");
	//write out skeleton
	$("#odu_wrapper").append("stuff");

	/*<main class="odu_landing">
			
				<!--left hand side-->
				<div id="odu_landingLhs" class="odu_landingLhs">
					<section id="odu_smallCalendarSection">
						<h1 class="odu_sectionH1 calendar">Calendar</h1>
						<div id="odu_smallCalendarWrapper" class="wrapper">
							<div id="odu_smallCalendar"></div>
						</div>
					</section>
					
					
					<section id="odu_upEventsSection">
						<h1 class="odu_sectionH1 upEvents">Upcoming Events</h1>
						<div id="odu_upEventsWrapper" class="wrapper"></div>
					</section>
				</div>
				<!--end left hand side-->
				
				<!--right hand side-->
				<div id="odu_landingRhs" class="odu_landingRhs">
					
						<section id="odu_iconListSection">
							<ul>
								<li><a href="<!-- string::site_urlbase -->assignment" class="assignment"><mark><span>Assignments</span></mark></a></li>
								<li><a href="<!-- string::site_urlbase -->announcements" class="announcements"><mark><span>Announcements</span></mark></a></li>
								<li><a href="<!-- string::site_urlbase -->faculty" class="faculty"><span>Faculty</span></a></li>
								<li><a href="<!-- string::site_urlbase -->glossary" class="glossary"><mark><span>Glossaries</span></mark></a></li>
								<li><a href="<!-- string::site_urlbase -->notes" class="notes"><mark><span>Notes</span></a></mark></li>
								<li><a href="<!-- string::site_urlbase -->resources" class="resources"><mark><span>Resources</span></mark></a></li>
								<li><a href="<!-- string::site_urlbase -->syllabus/" class="syllabus"><span>Syllabus</span></a></li>
							</ul>
						</section>
					

					<section id="odu_moduleListSection">
						<h1 class="odu_sectionH1 moduleList">Modules</h1>
						<div id="odu_moduleListWrapper" class="wrapper">
							<div id="odu_moduleList"></div>	<!--expecting id=moduleList for list inside for css-->
						</div>
					</section>
				</div>
				<!--end right hand side -->
				<div class="clearFix"></div>
			</main>*/










	
	
}



//loads the home page with the calendar, module, upcoming events, icons etc.
//not the header, and not the course content
//uses unique course id
function loadHomeContent(course_id){	
	/*var announcementsUrl  = "http://ple1.odu.edu:4243/api/announcement;list=user";
	var moduleListUrl      = "http://ple1.odu.edu:4243/api/modulenavigation/201530/" + course_id; 
	var smallCalendarUrl = "http://ple1.odu.edu:4243/api/calendar/201530/" + course_id;
	var upEventsUrl      = "http://ple1.odu.edu:4243/api/event/201530/" + course_id; 
	*/
	
	












	
	//announcements
	/*$.ajax({
		url: announcementsUrl,
		type: 'GET',
		dataType: 'json',
		success: function(data) { processNotifications(data) },
		error: function() { console.log("There was a problem loading the announcements."); },
		xhrFields: { withCredentials: true	},
		crossDomain: true
	});//.done(function (data, status, jqXHR) {
	//	console.log(data);
	//});
	*/
	
	//small calendar
	/*$.ajax({
		url: smallCalendarUrl,
		type: 'GET',
		dataType: 'json',
		success: function(data) { console.log("got small calendar data"); writeSmallCalendar(data, "odu_smallCalendar"); },
		error: function() { $("#odu_smallCalendar").append("Unable to load small calendar right now."); console.log("There was an error loading the small calendar events."); },
		xhrFields: { withCredentials: true	},
		crossDomain: true
	});
				
	//moduleList  
	$.ajax({
		url: moduleListUrl,
		type: 'GET',
		dataType: 'json',
		success: function(data) { writeModuleList(data, "moduleList", "odu_moduleList"); formatList("moduleList"); }, //format list after it has loaded.
		error: function() { $("#odu_moduleList").append("Unable to list module contents right now."); console.log("There was an error loading the module list."); },
		xhrFields: { withCredentials: true	},
		crossDomain: true
	});

	//upcoming events
	$.ajax({
		url: upEventsUrl,
		type: 'GET',
		dataType: 'json',
		success: function(data) { writeUpEvents(data, "odu_upEventsWrapper") },
		error: function() { $("#odu_upEventsWrapper").append("Unable to list upcoming events right now."); console.log("There was an error loading upcoming events."); },
		xhrFields: { withCredentials: true	},
		crossDomain: true
	});
	
	
	//TODO: make it dynamic
	$(".calendar").click(function(){
		console.log("clicked cal header");
		$("#odu_smallCalendarWrapper").toggleClass("displayNone");
		//add to preference
	});
	$(".upEvents").click(function(){
		console.log("clicked up events header");
		$("#odu_upEventsWrapper").toggleClass("displayNone");
		//add to preference
	});
	$(".moduleList").click(function(){
		console.log("clicked up events header");
		$("#odu_moduleListWrapper").toggleClass("displayNone");
		//add to preference
	});
	*/
}




function loadBasicContent(){

}


//TODO: TEST THIS
//course_id is our db id because CRN and semester code cannot positively identify a single instance of a course
function getCourseAttributes(course_id){
	return $.ajax({
		url: "http://ple1.odu.edu:4243/api/course/201530/" + course_id,
		type: 'GET',
		dataType: 'json',
		//success: function(data) { console.log("hi"); }
		//error: function() { console.log("There was an error getting course attributes"); },
		xhrFields: { withCredentials: true	},
		crossDomain: true,
		
	});
}


