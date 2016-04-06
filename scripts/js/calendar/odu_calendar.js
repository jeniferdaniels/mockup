//*****************************************************************************************
//Function Name: populateCalendar()
//Input: 		 url with loacation of json file 	 
//Output:		 none, fills an html dom element
//Purpose:		 calls the fullCalendar function and populates the #odu_calendar object
//				 on the webpage
//*****************************************************************************************
function populateCalendar(url) {
	
	var noEventsMessage = "Because your instructor has not added any deadlines, or he/she is using another calendar, this calendar view has no events.";

	$.ajax({ 
		url: url
	}).done(function(obj){
		
		//console.log("obj.events type is" + typeof obj.events);
		
		if (obj.events == "")
			$('#calendarWrapper').before($("<div>").attr("id", "noEvents").html(noEventsMessage));
		
		$('#calendar').fullCalendar({
			events: obj.events,
			height: 770,
			defaultDate: moment().format('YYYY-MM-DD'),
			theme: true,
			header: {
				left: 'prev',
				center: 'title',
				right: 'month,basicWeek, next'
			},
			themeButtonIcons: {
				prev: 'odu_left-chevron',
				next: 'odu_right-chevron'
			},
			eventRender: function (event, element) {
				element.attr('href', 'javascript:void(0);');
				element.click(function() {
					writeEventPopUp(event);
					$("#odu_calendarPopUp").dialog({ modal: false, width:600, height: 500});
				});				
			}
		});
	});
}

//*****************************************************************************************
//Function Name: writeSmallCalendar()
//Input: 		 url with loacation of json file 		 
//Output:		 none, fills an html dom element
//Purpose:		 calls the fullCalendar function and populates the #calendar object
//				 on the webpage
//*****************************************************************************************
function writeSmallCalendar(url, scheduleUrl) {
	$.ajax({ 
		url: url
	}).done(function(obj){
		
		//override these calendar.op these styles specifically for the small calendar
		$("<style type='text/css'> .fc-time{display: none} .fc-day-number{font-size: .7rem}</style>").appendTo("head");
		
		//add link to full schedule
		$("#odu_smallCalendarContainer").after($("<a>").attr("href", scheduleUrl).html("Full Schedule"));
		
		//add divs for pop up
		$("#odu_smallCalendarContainer").append($("<div>").attr("id", "odu_calendarPopUp").attr("class","displayNone").css("z-index", "30000").attr("title", "Assignment Details"));
		$("#odu_calendarPopUp").append($("<div>").attr("id", "odu_popUpContentWrapper"));
		$("#odu_popUpContentWrapper").append($("<div>").attr("id", "odu_popUpContent"));

		//add small calendar
		$("#odu_smallCalendar").fullCalendar({
			events: setShortTitleEvents(obj), //set short title for small calendar
			height: 430,
			fixedWeekCount: true,
			defaultDate: moment().format('2016-01-18'), //defaultDate: moment().format('YYYY-MM-DD'),
			theme: true,
			header: {
				left:   'prev',
				center: 'title',
				right:  'next'
			},
			themeButtonIcons: {
				prev:  'odu_left-chevron',
				next:  'odu_right-chevron'
			},
			eventRender: function (event, element) {
				element.attr('href', 'javascript:void(0);');
				if(event.icon)
					element.find(".fc-title").prepend("<i class='smallAssignmentIcon'></i></a>");
				element.click(function() {
					writeEventPopUp(event);
					$("#odu_calendarPopUp").dialog({ modal: false, width:600, height: 500});
				});				
			}
		});
	
		$("#odu_popUpContent").attr("class", "displayBlock");		
	});
}

//*****************************************************************************************
//Function Name: writeEventPopUp()
//Input: 		 event object which has the following properties:
//					type (example "assignment" or "module")	
//					title (string)
//					start (date, formatted YYYY-MM-DD or YYYY-MM-DDTHH:MM:SS)
//					end (date, same format as above, for assignments leave off end date)
//					textColor (string, rgba, hex or htmt reserved word such as 'white'		
//					description (string)
//					if the type is "assignment" then it also has the following:
//						submitVia (string)
//						deliverable (string)
//						icon (string)
//						moreUrl (string) to the assignment's full page
//Output:		 none, fills in a popup
//Purpose:		 takes an event object and fills in objects on the dom with the event
//				 object properties
//*****************************************************************************************
function writeEventPopUp(event){
	//debug
	showObjValuesInConsole(event);
	
	//it may contain residual items
	$("#odu_popUpContent").empty();

	
	if (event.type == "assignment"){
		$("#odu_popUpContent").append($("<div>").attr("id", "eventIcon").addClass("assignmentIcon"));
		$("#odu_popUpContent").append($("<h1>").attr("id", "modalTitle").html("Assignment"));
		$("#odu_popUpContent").append($("<h3>").attr("id", "assignmentTitle").html(event.longTitle));
		$("#odu_popUpContent").append($("<ul>").attr("id", "assignmentProperties").addClass("assignmentProperties"));
		
		if (!(typeof event.start === 'undefined')){
			if (event.start != ""){
			$("#assignmentProperties").append($("<li>").attr("id", "dueItem").append($("<div>").attr("id", "dueHeader").html("Due-")));
			$("#dueItem").append($("<div>").attr("id", "due").html((moment(event.start).format('MMMM DD, YYYY h:mm A'))));
			}
		}
		
		if (!(typeof event.submitVia === 'undefined')){
			if (event.submitVia != ""){ //wont work any other way
				$("#assignmentProperties").append($("<li>").attr("id", "submitViaItem").append($("<div>").attr("id", "submitViaHeader").html("Submit-")));
				$("#submitViaItem").append($("<div>").attr("id", "submitVia").html(event.submitVia));
			}
		}
		
		if (!(typeof event.deliverable === 'undefined')){
			if (event.deliverable != "") {
				$("#assignmentProperties").append($("<li>").attr("id", "deliverableItem").append($("<div>").attr("id", "deliverableHeader").html("Deliverable-")));
				$("#deliverableItem").append($("<div>").attr("id", "deliverable").html(event.deliverable));				
			}
		}		
		
		if (!(typeof event.description === 'undefined')){
			if (event.description != "") {
				$("#assignmentProperties").append($("<p>").attr("id", "description").html(event.description));				
			}
		}
		
		$("#odu_popUpContent").append($("<div>").attr("id", "clear").attr("style", "clear:both"));
		
		if (!(typeof event.moreUrl === 'undefined')){
			if (event.moreUrl != "") {
				$("#odu_popUpContent").append($("<div>").append($("<a>").attr("id", "moreLink").attr("href", event.moreUrl).html("View more on module assignment page...")));
			}
		}
	}
	//write code here for Module Info popup (need to grab objectives, description etc which are not avaiable in the JSON file yet)
}



//*****************************************************************************************
//Function Name: setShortTitleEvents()
//Input: 		 event object which has the following properties:
//					type (example "assignment" or "module")	
//					title (string)
//					start (date, formatted YYYY-MM-DD or YYYY-MM-DDTHH:MM:SS)
//					end (date, same format as above, for assignments leave off end date)
//					textColor (string, rgba, hex or htmt reserved word such as 'white'		
//					description (string)
//					if the type is "assignment" then it also has the following:
//						submitVia (string)
//						deliverable (string)
//						icon (string)
//						moreUrl (string) to the assignment's full page	 
//Output:		 array of objects with shortTitle, longTitle and regularTitle
//Purpose:		 Takes conglomerate of info and returns only title items, if there is a short
//				 title sent, call that the title.  Make a property called long title and set
//				 the title to to.  This is a work around for the small calendar because it 
//				 still calls the obj.title and we need to make a short title without changing
//				 the code for the fullcalendar.io.
//**********************************************************************************************


function setShortTitleEvents(obj)
{
	var shortEvents = [];
	var shortTitleEvent = {};
	
	
	for (var i=0; i<obj.events.length; i++){
		var orgEvent = obj.events[i];
		
		shortTitleEvent = {}; //clear it out
		shortTitleEvent = orgEvent;
		
		if (orgEvent.shortTitle != ""){
			shortTitleEvent.longTitle = orgEvent.title;
			shortTitleEvent.title = orgEvent.shortTitle;
			}
		else{
			shortTitleEvent.longTitle = orgEvent.title;
			shortTitleEvent.title = "";
		}
		shortEvents.push(shortTitleEvent);
	}

	return shortEvents;

}


//*****************************************************************************************
//Function Name: writeUpcomingEvents()
//Input: 		 event object which has the following properties:
//					type (example "assignment" or "module")	
//					title (string)
//					start (date, formatted YYYY-MM-DD or YYYY-MM-DDTHH:MM:SS)
//					end (date, same format as above, for assignments leave off end date)
//					textColor (string, rgba, hex or htmt reserved word such as 'white'		
//					description (string)
//					if the type is "assignment" then it also has the following:
//						submitVia (string)
//						deliverable (string)
//						icon (string)
//						moreUrl (string) to the assignment's full page	 
//Output:		 array of objects with longTitle, date and description
//Purpose:		 
//*******************************************************************************************
