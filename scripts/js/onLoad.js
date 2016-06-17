//functions that are run onLoad

function writePageHeader(topDiv, courseData){
	if (DEBUG) benchMark("start", "writePageHeader", {"topDiv": topDiv, "courseData":courseData});   

	hasProblem = true;

	for(key in courseData){
		console.log("key " + key  + "value" + courseData[key]);
	}
			
	//check to see that object is not empty, if it is then display minimal header
	if (!((topDiv == "")	|| (typeof topDiv === undefined) || (topDiv == null)))
	{
		if ((courseData == "")	|| (typeof courseData === undefined) || (courseData == null)) {
			$("#errorMsg").addClass("displayBlock").append($("<span>").html("Missing course data for header.")); 
		}
		else 
		{
		
			//make sure the things that are needed are here, otherwise fill it in with blanks, so the show can go on
			var expectedKeys = ["course_title", "course_number", "course_subject", "semester_display", "faculties", "potatoe"];
			//var expectedFacKeys = ["preferred_name", "email"];
			var groomedCourseData = [];
			
			//load only the keys we need and load it with "unknown" if the key dne
			//TODO: does it matter that there are extra keys?, fix later
			for (var i=0; i< expectedKeys.length; i++){
				groomedCourseData[expectedKeys[i]] = (courseData.hasOwnProperty(expectedKeys[i]))? courseData[expectedKeys[i]] : "unknown";
				console.log(courseData[expectedKeys[i]]);
			}
			
			//TODO: deal with faculty display
			
			//have to cut the title short for the longer courses. 
			//TODO:There has to be a limit in banner. What is it?
			//50 fits in the header at 2.2rem
			displayedCourseTitle = (groomedCourseData.course_subject + " " + groomedCourseData.course_number + " " + groomedCourseData.course_title).substr(1, 50);
			
		
			//now display it
			$(topDiv).append($("<div>").attr("id", "odu_topWrapper").addClass("odu_topWrapper")
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
	
	if (DEBUG) benchMark("end", "writePageHeader", {"topDiv": topDiv, "courseData":courseData}); 
	
	return hasProblem;
}


function writeHomeSkeleton(baseDiv){
	if (DEBUG) benchMark("start", "writeHomeSkeleton", {"baseDiv": baseDiv});  
	

	//<main>, lhs and rhs
	$(baseDiv)
		.append($("<main>").attr("id", "odu_main").addClass("odu_courseHome")	//TODO: update name to odu_main and update all css
			.append($("<div>").attr("id", "odu_courseHomeLhs").addClass("odu_courseHomeLhs"))
			.append($("<div>").attr("id", "odu_courseHomeRhs").addClass("odu_courseHomeRhs"))
		);

	//left side
	$("#odu_courseHomeLhs")
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
	$("#odu_courseHomeRhs")
		.append($("<section>").attr("id", "odu_iconListSection"))
		.append($("<section>").attr("id", "odu_moduleListSection"));
	
	//icon section
	$("#odu_iconListSection")
		.append($("<ul>")
			.append($("<li>").attr("id", "assignmentsListItem")
				.append($("<a>").attr("href","assignments/").addClass("ple-clipboard-list")
					.append($("<span>").html("Assignments"))))
			.append($("<li>").attr("id", "announcementsListItem")
				.append($("<a>").attr("href","announcements/").addClass("ple-bullhorn")
					.append($("<span>").html("Announcements"))))
			.append($("<li>").attr("id", "facultyListItem")
				.append($("<a>").attr("href","faculty/").addClass("ple-book-person")
					.append($("<span>").html("Faculty"))))
			.append($("<li>").attr("id", "glossaryListItem")
				.append($("<a>").attr("href","glossary/").addClass("ple-tabbed-book")
					.append($("<span>").html("Glossaries"))))
			.append($("<li>").attr("id", "notesListItem")
				.append($("<a>").attr("href","notes/").addClass("ple-notepad-lines")
					.append($("<span>").html("Notes"))))
			.append($("<li>").attr("id", "resourcesListItem")
				.append($("<a>").attr("href","resources").addClass("ple-book-spines")
					.append($("<span>").html("Resources"))))
			.append($("<li>").attr("id", "syllabusListItem")
				.append($("<a>").attr("href","syllabus/").addClass("ple-page-lines")
					.append($("<span>").html("Syllabus")))));	

	//module list
	$("#odu_moduleListSection")
		.append($("<h1>").addClass("odu_sectionH1 moduleList").html("Modules"))
		.append($("<div>").attr("id", "odu_moduleListWrapper").addClass("wrapper")
			.append($("<div>").attr("id","odu_moduleList")));
			
			
	//clear fix
	$(baseDiv).append("<div>").addClass("clearFix");
	
	if (DEBUG) benchMark("end", "writeHomeSkeleton", {"baseDiv": baseDiv}); 
}



//loads the home page with the calendar, module, upcoming events, icons etc.
//not the header, and not the course content
//uses unique course id
function loadHomeContent(course_id){
	if (DEBUG) benchMark("start", "loadHomeContent", {"course_id": course_id}); 
	
	var announcementsUrl  = "http://ple1.odu.edu:4243/api/announcement;list=user";
	var moduleListUrl      = "http://ple1.odu.edu:4243/api/modulenavigation/201530/" + course_id; 
	var smallCalendarUrl = "http://ple1.odu.edu:4243/api/calendar/201530/" + course_id;
	var upEventsUrl      = "http://ple1.odu.edu:4243/api/event/201530/" + course_id; 

	if (DEBUG) console.log("announcementsUrl" + announcementsUrl);
	if (DEBUG) console.log("moduleListUrl" + moduleListUrl);
	if (DEBUG) console.log("smallCalendarUrl" + smallCalendarUrl);
	if (DEBUG) console.log("upEventsUrl" + upEventsUrl);
	
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
	
	
	if (DEBUG) benchMark("end", "loadHomeContent", {"course_id": course_id}); 
}




function writeBasicContentSkeleton(baseDiv){
	if (DEBUG) benchMark("start", "writeBasicContentSkeleton", {"baseDiv": baseDiv}); 

	//page title
	$(baseDiv)
		.append($("<h1>").attr("id", "odu_pageTitle").addClass("odu_pageTitle").html("Page Title"));
	
	

	//content
	//boo. have to load this on the template.html page
	//$(baseDiv)
	//	.append($("<section>").attr("id","odu_contentSection").addClass("odu_contentSection")
	//	.append($("<div>").attr("odu_contentWrapper","odu_contentWrapper").addClass("odu_contentWrapper")
	//	.append($("<div>").attr("id","odu_content").addClass("odu_content"))));
		
	//clear fix
	$(baseDiv)
		.append($("<div>").addClass("clearFix"));
		
	if (DEBUG) benchMark("end", "writeBasicContentSkeleton", {"baseDiv": baseDiv}); 
}


function writeToolbox(toolboxDiv, baseUrl){
	if (DEBUG) benchMark("start", "writeToolbox", {"toolboxDiv": toolboxDiv, "baseUrl":baseUrl }); 
	
	//toolbox
	$(toolboxDiv)
		.append($("<ul>").attr("id","odu_toolboxList").addClass("odu_toolboxList")
			//home link
			.append($("<li>").attr("id","odu_homeLi")
				.append($("<a>").attr("id","odu_homeLink").attr("href", baseUrl+"welcome")
					.append($("<i>").attr("id", "odu_homeLinkIcon").addClass("ple-house"))
					.append($("<span>").html("Home"))))
			//syllabus link
				.append($("<li>").attr("id","odu_syllabusLi")
					.append($("<a>").attr("id","odu_syllabusLink").attr("href", baseUrl+"syllabus/")
						.append($("<i>").attr("id", "odu_syllabusLinkIcon").addClass("ple-pages-lines"))
						.append($("<span>").html("Syllabus"))))
			//modules link
					.append($("<li>").attr("id","odu_modulesLi")
						.append($("<a>").attr("id","odu_modulesLink").attr("href", baseUrl+"module_listing")
							.append($("<i>").attr("id", "odu_modulesLinkIcon").addClass("ple-folder"))
							.append($("<span>").html("Modules"))))
			//calendar link
					.append($("<li>").attr("id","odu_calendarLi")
						.append($("<a>").attr("id","odu_calendarLink").attr("href", baseUrl+"calendar")
							.append($("<i>").attr("id", "odu_calendarLinkIcon").addClass("ple-calendar"))
							.append($("<span>").html("Calendar"))))
			//ask A question link
					.append($("<li>").attr("id","odu_aaqLi")
						.append($("<a>").attr("id","odu_aaqLink").attr("href", "#")
							.append($("<i>").attr("id", "odu_aqqLinkIcon").addClass("ple-person-ask"))
							.append($("<span>").html("Ask a Question"))))
			//notes link
					.append($("<li>").attr("id","odu_notesLi")
						.append($("<a>").attr("id","odu_notesLink").attr("href", "#")
							.append($("<i>").attr("id", "odu_notesLinkIcon").addClass("ple-notepad-lines"))
							.append($("<span>").html("Notes"))))
			//print link
					.append($("<li>").attr("id","odu_printLi")
						.append($("<a>").attr("id","odu_printLink").attr("href", "#")
							.append($("<i>").attr("id", "odu_printLinkIcon").addClass("ple-printer"))
							.append($("<span>").html("Print"))))
			//edit link
					.append($("<li>").attr("id","odu_editLi")
						.append($("<a>").attr("id","odu_editLink").attr("href", "#")
							.append($("<i>").attr("id", "odu_editLinkIcon").addClass("ple-pencil"))
							.append($("<span>").html("Edit"))))
			//admin tools link
					.append($("<li>").attr("id","odu_adminToolsLi")
						.append($("<a>").attr("id","odu_adminToolsLink").attr("href", "#")
							.append($("<i>").attr("id", "odu_adminToolsLinkIcon").addClass("ple-case "))
							.append($("<span>").html("Admin Tools"))))
		);//end ul
	if (DEBUG) benchMark("end", "writeToolbox", {"toolboxDiv": toolboxDiv, "baseUrl":baseUrl }); 
}


//TODO: TEST THIS
//course_id is our db id because CRN and semester code cannot positively identify a single instance of a course
function getCourseAttributes(courseId){
	if (DEBUG) benchMark("start", "getCourseAttributes", {"courseId": courseId}); 
	
	$.ajax({
		url: "http://ple1.odu.edu:4243/api/course/" + "201330/bnal206",
		type: 'GET',
		dataType: 'json',
		success: function(data) { writePageHeader("#odu_top", data);},
		//error: function() { console.log("There was an error getting course attributes"); },
		xhrFields: { withCredentials: true	},
		crossDomain: true,
		
	});
	if (DEBUG) benchMark("end", "getCourseAttributes", {"courseId": courseId}); 
}

