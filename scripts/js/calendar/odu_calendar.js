
//*****************************************************************************************
//Function Name: writeSmallCalendar()
//Input: 		 eventList with json data 
//Output:		 none, fills an html dom element
//Purpose:		 calls the fullCalendar function and populates the #calendar object
//				 on the webpage
//*****************************************************************************************
function writeSmallCalendar(eventList, calendarIdField) {

		
		//add link to full schedule
		//$("#odu_smallCalendarContainer").after($("<a>").attr("href", scheduleUrl).html("Full Schedule"));
		
		//add divs for pop up
		//$("#odu_smallCalendarContainer").append($("<div>").attr("id", "odu_calendarPopUp").attr("class","displayNone").css("z-index", "30000").attr("title", "Assignment Details"));
		//$("#odu_calendarPopUp").append($("<div>").attr("id", "odu_popUpContentWrapper"));
		//$("#odu_popUpContentWrapper").append($("<div>").attr("id", "odu_popUpContent"));

		//add small calendar
		$("#" + calendarIdField).fullCalendar({
			events: formatForSmallCal(eventList), //set short title for small calendar
			height: 430,
			fixedWeekCount: false,
			defaultDate: new Date(), //defaultDate: moment().format('YYYY-MM-DD'),
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
				element.click(function() {
					writeEventPopUp(event);
					$("#odu_calendarPopUp").dialog({ modal: false, width:600, height: 500});
				});				
			}
		});
	
		$("#odu_popUpContent").attr("class", "displayBlock");
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
	//showObjValuesInConsole(event);
	
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

//gets object with keys:
//type, title, longTitle, start, end, url  [module or other event]
//type, title, longTitle, due, url [assignment]
//and adds keys color, text color (different ones depending on module or assignment)
//changes name of dueDate property on assignments to start so calendar can consume it 
//correctly

function formatForSmallCal(eventList){
	//TODO: fix this later
	var assTextColor = "white";
	var assColor = "rgba(68,136,246,1)";
	var modTextColor = "white";
	var modColor = "#ba68c8";

	
	if (typeof eventList != "undefined"){
		for (var i=0; i< eventList.length; i++){
			var obj = {}; //clear out any residule
			obj = eventList[i];
			
			if (typeof obj != "undefined"){
				console.log("obj is type " + obj.type);
				obj = changeKeyName(obj, "due", "start");
				cssName = obj.type + "SmallEvent";
				obj = addKeyValuePair(obj, "className", cssName); //there are classes named "module" and "event"
			}
		}
	}
	return eventList;
}

