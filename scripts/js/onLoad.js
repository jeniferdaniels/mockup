//Things that are being called on load that are not in the function below
//------------------------------------------------------------------------
//if progress bar is added, it generates on load code for clicking it




//
//Holds the js that will run when the webpage loads
//

//loads the home page with the calendar, module, upcoming events, icons etc.
//not the header
//uses unique course id
function loadHomeContent(course_id){
	$(document).ready(function(){
		console.log("moreStuff1");
		
		var promise = new Promise(function(resolve, reject) {
		  resolve(1);
		});
		
		
		
		
		
		
		
		
		
		
		
		
		var announcementsUrl  = "http://ple1.odu.edu:4243/api/announcement;list=user";
		var moduleListUrl      = "http://ple1.odu.edu:4243/api/modulenavigation/201530/" + course_id; 
		var smallCalendarUrl = "http://ple1.odu.edu:4243/api/calendar/201530/" + course_id;
		var upEventsUrl      = "http://ple1.odu.edu:4243/api/event/201530/" + course_id; 

		//announcements
		$.ajax({
			url: announcementsUrl,
			type: 'GET',
			dataType: 'json',
			success: function(data) { processNotifications(data) },
			error: function() { console.log("There was a problem loading the announcements"); },
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
			success: function(data) { writeSmallCalendar(data) },
			error: function() { console.log("There was an error loading the small calendar events"); },
			xhrFields: { withCredentials: true	},
			crossDomain: true
		});
					
		//moduleList  
		$.ajax({
			url: moduleListUrl,
			type: 'GET',
			dataType: 'json',
			//format list after it has loaded.
			success: function(data) { writeModuleList(data, "moduleList", "odu_moduleList"); formatList("moduleList"); },
			error: function() { console.log("There was an error loading moduleList"); },
			xhrFields: { withCredentials: true	},
			crossDomain: true
		});

		//upcoming events
		$.ajax({
			url: upEventsUrl,
			type: 'GET',
			dataType: 'json',
			success: function(data) { writeUpEvents(data, "odu_upEventsWrapper") },
			error: function() { console.log("There was an error loading moduleList"); },
			xhrFields: { withCredentials: true	},
			crossDomain: true
		});
		
		console.log("moreStuff2");		
	});
}

function loadBasicContent(){
	$(document).ready(function(){
		
		
		
	});
}


//TODO: TEST THIS
//course_id is our db id because CRN and semester code cannot positively identify a single instance of a course
function getCourseAttributes(course_id){
		$.ajax({
			url: "http://ple1.odu.edu:4243/api/faculty/course/" + courseNumber,
			type: 'GET',
			dataType: 'json',
			error: function() { console.log("There was an error getting course attributes"); },
			xhrFields: { withCredentials: true	},
			crossDomain: true,
			success: function(data) { console.log("hi"); }
		});
	//return courseData;
}








			//var courseData =  {};
			//if (typeof data !== "undefined"){ //was there anything returned?
			//	var expectedKeys = ["title", "course_number", "semester_display", "faculty"];	
				
				//below is going to essentially dump any other fields other than the ones in the expectedKeys list.
				//can change later.
				//if (data.length > 0){	//maybe an empty object is returned. got to check for that					
					//for (var i=0; i < data.length; i++){						
						//check to see if key is there
						//checking the attributes to ensure values are being passed
						//the initial release of PLE 2.0 will likely be missing values
						//we need this for debugging later in the code.
						//if (typeof expectedKeys[i] !== "undefined" ){
						//	//load into a data object we know is good
						//	courseData.expectedKeys[i] = data.expectedKeys[i];
						//}
						//else{ courseData.expectedKeys[i] = "Value not found."; } //use message for now. In future use ""
					//}					
				//}			
			//}