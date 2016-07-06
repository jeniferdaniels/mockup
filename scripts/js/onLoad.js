//functions that are run onLoad
DEBUG=true;


//----------------------------------------------------------------------------------------------------
//Function Name:	writePageHeader
//Parameters:		topDiv - string formatted "#stuff" with the id of the <div> that is acting as the
//						top section of the page
//					courseData - json object with
//						course_title 
//						course_number
//						course_subject
//						semester_display
//						faculties - json object with
//							preferred_name 
//							email
//Purpose:			writes the top portion of the webpage and loads it with the course data to 
//					customize it for each course
//Returns:			true = no problems found.  false = problems found
//----------------------------------------------------------------------------------------------------
function writePageHeader(topDiv, courseData){
	if (DEBUG) benchMark("start", "writePageHeader", {"topDiv": topDiv, "courseData":courseData});   

	hasProblem = false;

	if (DEBUG) {for(key in courseData){ console.log("key " + key  + "value" + courseData[key]); }}
			
	//check to see that object is not empty, if it is then display minimal header
	if (!((topDiv == "") || (typeof topDiv === undefined) || (topDiv == null)))
	{
		//TODO: check to make sure div exists
		
		if ((courseData == "")	|| (typeof courseData === undefined) || (courseData == null)) {
			$("#errorMsg").addClass("displayBlock").append($("<span>").html("Missing course data for header.")); 
		}
		else 
		{
		
			//make sure the things that are needed are here, otherwise fill it in with blanks, so the show can go on
			var expectedKeys = ["course_title", "course_number", "course_subject", "semester_display", "faculties"];
			var groomedCourseData = [];
			
			//load only the keys we need and load it with "unknown" if the key dne
			//TODO: does it matter that there are extra keys?, fix later
			for (var i=0; i< expectedKeys.length; i++){
				groomedCourseData[expectedKeys[i]] = (courseData.hasOwnProperty(expectedKeys[i]))? courseData[expectedKeys[i]] : "unknown";
				if (DEBUG) console.log(courseData[expectedKeys[i]]);
			}
			
			//TODO: deal with faculty display
			
			//have to cut the title short for the longer courses. The titles will have to be shortened in the json object
			//if they are supposed to fit, then they need to be trimmed/abbreviated on the json side
			//TODO:There has to be a limit in banner. What is it?
			//56 fits in the header at 2.2rem
			displayedCourseTitle = (groomedCourseData.course_subject + " " + groomedCourseData.course_number + " " + groomedCourseData.course_title).substr(0, 55);
			
		
			//now display it
			$(topDiv).append($("<div>").attr("id", "odu_topWrapper").addClass("odu_topWrapper")
				.append($("<header>")
						//.append($("<nav>").attr("id", "nav")
						//	.append($("<ul>")
						//		.append($("<li>").append($("<a>").attr("href", "http://google.com").attr("id", "userLink").addClass("odu_iconHelp")))
						//		.append($("<li>").append($("<a>").attr("href", "https://placekitten.com/").attr("id", "userLink").addClass("ple-person")))
						//	)//end ul	
						//)//end nav
						//.append($("<div>").addClass("clearFix"))
						.append($("<div>").addClass("oduOnlineLogo"))
						.append($("<a>").attr("href", "\mockup").append($("<h1>").attr("id", "courseTitle").html(displayedCourseTitle)))
						.append($("<h2>").attr("id", "courseInstructorTitle")
								.append($("<span>").attr("id", "semester").html(groomedCourseData.semester_display))
								
								//
						)//end h2
					)//end header
				);//end div
				
				numFaculty = groomedCourseData.faculties.length;
				$("#courseInstructorTitle").append($("<span>").attr("id", "instructorLabel").html((numFaculty > 1) ? "Instructors" : "Instructor"))
							
				for(i=0; i<numFaculty; i++){
					//TODO: add internal anchors to faculty page to go straight to the clicked instructor
					$("#instructorLabel").append($("<a>").attr("id", "courseInstructor_" + i).addClass("odu_instructorLink")
						.attr("href", groomedCourseData.course_subject + groomedCourseData.course_number + "/faculty")
						.html(groomedCourseData.faculties[i].preferred_name));
				}
		}
		hasProblem = true;
	} 
	else { $("#errorMsg").html("Cannot load header, top div missing."); }
	
	if (DEBUG) benchMark("end", "writePageHeader", {"topDiv": topDiv, "courseData":courseData}); 
	
	return hasProblem;
}

//----------------------------------------------------------------------------------------------------
//Function Name:	writeHomeSkeleton
//Parameters:		baseDiv - string formatted "#stuff" with the id of the <div> that is acting as the
//						starting point for the skeleton
//Purpose:			writes the empty tags for the home page
//Returns:			nothing, writes to screen
//----------------------------------------------------------------------------------------------------
function writeHomeSkeleton(baseDiv){
	if (DEBUG) benchMark("start", "writeHomeSkeleton", {"baseDiv": baseDiv});  

	$(baseDiv).html(" ");//clear out 

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
			//.append($("<li>").attr("id", "glossaryListItem")
			//	.append($("<a>").attr("href","glossary/").addClass("ple-tabbed-book")
			//		.append($("<span>").html("Glossaries"))))
			//.append($("<li>").attr("id", "notesListItem")
			//	.append($("<a>").attr("href","notes/").addClass("ple-notepad-lines")
			//		.append($("<span>").html("Notes"))))
			//.append($("<li>").attr("id", "resourcesListItem")
			//	.append($("<a>").attr("href","resources").addClass("ple-book-spines")
			//		.append($("<span>").html("Resources"))))
			.append($("<li>").attr("id", "scheduleListItem")
				.append($("<a>").attr("href","schedule/").addClass("ple-book-person")
					.append($("<span>").html("schedule"))))
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




//----------------------------------------------------------------------------------------------------
//Function Name:	loadHomeContent
//Parameters:		course_id - string, should be unique course Id, for now it is uses 
//					semesterCode + "/" + courseNumber
//Purpose:			loads the home page with the calendar, module, upcoming events, icons etc.
//					not the header, and not the course content
//Returns:			nothing, writes to screen
//----------------------------------------------------------------------------------------------------
function loadHomeContent(course_id){
	if (DEBUG) benchMark("start", "loadHomeContent", {"course_id": course_id}); 
	
	var announcementsUrl  = "http://ple1.odu.edu:4243/api/announcement;list=user";
	var moduleListUrl      = "http://ple1.odu.edu:4243/api/modulenavigation/202020/dev101"; //+ course_id; 
	//var smallCalendarUrl = "http://ple1.odu.edu:4243/api/calendar/" + course_id;
	var smallCalendarUrl = "sampleJson/sampleSmallCalendarEvents.json";
	var upEventsUrl      = "http://ple1.odu.edu:4243/api/event/" + course_id; 

	if (DEBUG) console.log("announcementsUrl" + announcementsUrl);
	if (DEBUG) console.log("moduleListUrl" + moduleListUrl);
	if (DEBUG) console.log("smallCalendarUrl" + smallCalendarUrl);
	if (DEBUG) console.log("upEventsUrl" + upEventsUrl);
	
	//announcements
	$.ajax({
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
	
	
	//small calendar
	$.ajax({
		url: smallCalendarUrl,
		type: 'GET',
		dataType: 'json',
		success: function(data) { console.log("got small calendar data"); writeCalendar("odu_smallCalendar", data, "s"); },
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
	

	if (DEBUG) benchMark("end", "loadHomeContent", {"course_id": course_id}); 
}



//----------------------------------------------------------------------------------------------------
//Function Name:	writeBasicContentSkeleton
//Parameters:		baseDiv - string formatted "#stuff" with the id of the <div> that is acting as the
//						starting point for the skeleton
//Purpose:			writes the empty tags for the content page
//Returns:			nothing, writes to screen
//NOTE:				not currently being used because template.html has hard coded html
//----------------------------------------------------------------------------------------------------
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

//----------------------------------------------------------------------------------------------------
//Function Name:	writeBasicContentSkeleton
//Parameters:		toolboxDiv - string formatted "#stuff" with the id of the <div> that is acting as the
//						starting point for the toolbox
//					baseUrl - string with the base url for the course
//Purpose:			writes the toolbox icons
//Returns:			nothing, writes to screen
//NOTE:				not currently being used because template.html has hard coded html
//----------------------------------------------------------------------------------------------------
function writeToolbox(toolboxDiv, baseUrl){
	if (DEBUG) benchMark("start", "writeToolbox", {"toolboxDiv": toolboxDiv, "baseUrl":baseUrl }); 
	
	//toolbox
	$(toolboxDiv)
		.append($("<ul>").attr("id","odu_toolboxList").addClass("odu_toolboxList")
			//home link
			.append($("<li>").attr("id","odu_homeLi")
				.append($("<a>").attr("id","odu_homeLink").attr("href", baseUrl+"/")
					.append($("<i>").attr("id", "odu_homeLinkIcon").addClass("odu_toolboxIcon ple-house"))
					.append($("<span>").html("Home"))))
			//syllabus link
				.append($("<li>").attr("id","odu_syllabusLi")
					.append($("<a>").attr("id","odu_syllabusLink").attr("href", baseUrl+"syllabus/")
						.append($("<i>").attr("id", "odu_syllabusLinkIcon").addClass("odu_toolboxIcon ple-page-lines"))
						.append($("<span>").html("Syllabus"))))
			//modules link
					.append($("<li>").attr("id","odu_modulesLi")
						.append($("<a>").attr("id","odu_modulesLink").attr("href", baseUrl+"module_listing")
							.append($("<i>").attr("id", "odu_modulesLinkIcon").addClass("odu_toolboxIcon ple-folder"))
							.append($("<span>").html("Modules"))))
			//calendar link
					.append($("<li>").attr("id","odu_calendarLi")
						.append($("<a>").attr("id","odu_calendarLink").attr("href", baseUrl+"calendar")
							.append($("<i>").attr("id", "odu_calendarLinkIcon").addClass("odu_toolboxIcon ple-calendar"))
							.append($("<span>").html("Calendar"))))
			//ask A question link
					.append($("<li>").attr("id","odu_aaqLi")
						.append($("<a>").attr("id","odu_aaqLink").attr("href", "#")
							.append($("<i>").attr("id", "odu_aqqLinkIcon").addClass("odu_toolboxIcon ple-person-ask"))
							.append($("<span>").html("Ask a Question"))))
			//notes link
					.append($("<li>").attr("id","odu_notesLi")
						.append($("<a>").attr("id","odu_notesLink").attr("href", "#")
							.append($("<i>").attr("id", "odu_notesLinkIcon").addClass("odu_toolboxIcon ple-notepad-lines"))
							.append($("<span>").html("Notes"))))
			//print link
					.append($("<li>").attr("id","odu_printLi")
						.append($("<a>").attr("id","odu_printLink").attr("href", "#")
							.append($("<i>").attr("id", "odu_printLinkIcon").addClass("odu_toolboxIcon ple-printer"))
							.append($("<span>").html("Print"))))
			//edit link
					.append($("<li>").attr("id","odu_editLi")
						.append($("<a>").attr("id","odu_editLink").attr("href", "#")
							.append($("<i>").attr("id", "odu_editLinkIcon").addClass("odu_toolboxIcon ple-pencil"))
							.append($("<span>").html("Edit"))))
			//admin tools link
					.append($("<li>").attr("id","odu_adminToolsLi")
						.append($("<a>").attr("id","odu_adminToolsLink").attr("href", "#")
							.append($("<i>").attr("id", "odu_adminToolsLinkIcon").addClass("odu_toolboxIcon ple-case "))
							.append($("<span>").html("Admin Tools"))))
		);//end ul
	if (DEBUG) benchMark("end", "writeToolbox", {"toolboxDiv": toolboxDiv, "baseUrl":baseUrl }); 
}


//TODO: TEST THIS
//course_id is our db id because CRN and semester code cannot positively identify a single instance of a course
function getCourseAttributes(courseId){
	if (DEBUG) benchMark("start", "getCourseAttributes", {"courseId": courseId}); 
	
	
	
	$.ajax({
		url: "http://ple1.odu.edu:4243/api/course/" + courseId,
		type: 'GET',
		dataType: 'json',
		success: function(data) { writePageHeader("#odu_top", data);},
		//error: function() { console.log("There was an error getting course attributes"); },
		xhrFields: { withCredentials: true	},
		crossDomain: true,
		
	});
	//if (DEBUG) benchMark("end", "getCourseAttributes", {"courseId": courseId}); 
}

//temp functionality.  does not need to be in final release 
function writeSideTabs(baseDiv){
	
	/*if (!isEmpty(baseDiv)){
		
		if ($("#" + baseDiv).length){
			$("#" + baseDiv)
				.append($("<div>").attr("id", "odu_sideTabs")
					.append($("<div>").attr("id", "odu_techIssueRept").addClass("odu_sideTab odu_iconHelp"))
					.append($("<div>").attr("id", "odu_print").addClass("odu_sideTab odu_iconPrint")));
			
			$("#odu_techIssueRept").click(function(){ console.log("rept clicked");})
			$("#odu_print").click(function(){ console.log("print clicked");})
			
		}
	}*/
}
	