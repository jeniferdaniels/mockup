//*****************************************************************************************
//Function Name: populateCalendar()
//Input: 		 currently, none. Can be set to pull events from json file or within the
//				 code an eventSources property can be added 	 
//Output:		 none, fills an html dom element
//Purpose:		 calls the fullCalendar function and populates the #calendar object
//				 on the webpage
//*****************************************************************************************
function populateCalendar(url) {
	
	var noEventsMessage = "Because your instructor has not added any deadlines, or he/she is using another calendar, this calendar view has no events.";

	$.ajax({ 
		url: url
	}).done(function(obj){
		
		console.log("obj.events type is" + typeof obj.events);
		
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
					populateEventPopUp(event);
					$("#calendarPopUp").dialog({ modal: false, width:600, height: 500});
				});				
			}
		});
	});
}



//*****************************************************************************************
//Function Name: populateEventPopUp()
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
function populateEventPopUp(event){
	$("#popUpContent").empty();

	if (event.type == "assignment"){
		$("#popUpContent").append($("<div>").attr("id", "eventIcon").addClass("assignmentIcon"));
		$("#popUpContent").append($("<h1>").attr("id", "modalTitle").html("Assignment"));
		$("#popUpContent").append($("<h3>").attr("id", "assignmentTitle").html(event.title));
		$("#popUpContent").append($("<ul>").attr("id", "assignmentProperties").addClass("assignmentProperties"));
		
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
		
		$("#popUpContent").append($("<div>").attr("id", "clear").attr("style", "clear:both"));
		
		if (!(typeof event.moreUrl === 'undefined')){
			if (event.moreUrl != "") {
				$("#popUpContent").append($("<div>").append($("<a>").attr("id", "moreLink").attr("href", event.moreUrl).html("View more on module assignment page...")));
			}
		}
	}
	//write code here for Module Info popup (need to grab objectives, description etc which are not avaiable in the JSON file yet)
}
