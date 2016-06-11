//functions that are run onLoad


function writePageHeader(topDiv, courseData){
	hasProblem = true;
	console.log("inside write page header");
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


function writeHomeSkeleton(homeDiv){

	console.log("Loading home skeleton");

	//<main>, lhs and rhs
	$(homeDiv)
		.append($("<main>").attr("id", "odu_main").addClass("odu_landing")	//TODO: update name to odu_main and update all css
			.append($("<div>").attr("id", "odu_landingLhs").addClass("odu_landingLhs"))
			.append($("<div>").attr("id", "odu_landingRhs").addClass("odu_landingRhs"))
		);

	//left side
	$("#odu_landingLhs")
		.append($("<section>").attr("id", "odu_smallCalendarSection"))
		.append($("<section>").attr("id", "odu_upEventsSection"));
	
	//calendar skeleton
	$("#odu_smallCalendarSection")
		.append($("<h1>").addClass("odu_sectionH1 calendar").html("Calendar"))
		.append($("<div>").attr("id", "odu_smallCalendarWrapper").addClass("wrapper")
			.append($("<div>").attr("id", "odu_smallCalendar")));
	
	
	//upcoming events skeleton
	$("#odu_upEventsSection")
		.append($("<h1>").addClass("odu_sectionH1 upEvents").html("Upcoming Events"))
		.append($("<div>").attr("id", "odu_upEventsWrapper"));
	
	
	//right side
	$("#odu_landingRhs")
		.append($("<section>").attr("id", "odu_iconListSection"))
		.append($("<section>").attr("id", "odu_moduleListSection"));
	
	//icon section
	$("#odu_iconListSection")
		.append($("<ul>")
			.append($("<li>").attr("id", "assignmentsListItem")
				.append($("<a>").attr("href","assignments/").addClass("assignment")
					.append($("<span>").html("Assignments"))))
			.append($("<li>").attr("id", "announcementsListItem")
				.append($("<a>").attr("href","announcements/").addClass("announcements")
					.append($("<span>").html("Announcements"))))
			.append($("<li>").attr("id", "facultyListItem")
				.append($("<a>").attr("href","faculty/").addClass("faculty")
					.append($("<span>").html("Faculty"))))
			.append($("<li>").attr("id", "glossaryListItem")
				.append($("<a>").attr("href","glossary/").addClass("glossary")
					.append($("<span>").html("Glossary"))))
			.append($("<li>").attr("id", "notesListItem")
				.append($("<a>").attr("href","notes/").addClass("notes")
					.append($("<span>").html("Notes"))))
			.append($("<li>").attr("id", "resourcesListItem")
				.append($("<a>").attr("href","resources").addClass("resources")
					.append($("<span>").html("Resources"))))
			.append($("<li>").attr("id", "syllabusListItem")
				.append($("<a>").attr("href","syllabus/").addClass("syllabus")
					.append($("<span>").html("Syllabus")))));	

	//module list
	$("#odu_moduleListSection")
		.append($("<h1>").addClass("odu_sectionH1 moduleList").html("Modules"))
		.append($("<div>").attr("id", "odu_moduleListWrapper").addClass("wrapper")
			.append($("<div>").attr("id","odu_moduleList")));
}



//loads the home page with the calendar, module, upcoming events, icons etc.
//not the header, and not the course content
//uses unique course id
function loadHomeContent(course_id){	
	var announcementsUrl  = "http://ple1.odu.edu:4243/api/announcement;list=user";
	var moduleListUrl      = "http://ple1.odu.edu:4243/api/modulenavigation/201530/" + course_id; 
	var smallCalendarUrl = "http://ple1.odu.edu:4243/api/calendar/201530/" + course_id;
	var upEventsUrl      = "http://ple1.odu.edu:4243/api/event/201530/" + course_id; 

	console.log("moduleListUrl url" + moduleListUrl);
	
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
	$.ajax({
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
		success: function(data) { writeUpEvents(data, "#odu_upEventsWrapper") },
		error: function() { $("#odu_upEventsWrapper").append("Unable to list upcoming events right now."); console.log("There was an error loading upcoming events."); },
		xhrFields: { withCredentials: true	},
		crossDomain: true
	});
	
	
	//clicky collapsible headers
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


