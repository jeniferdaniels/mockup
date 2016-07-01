//*****************************************************************************************
//Function Name: populateCalendar()
//Input: 		 currently, none. Can be set to pull events from json file or within the
//				 code an eventSources property can be added 	 
//Output:		 none, fills an html dom element
//Purpose:		 calls the fullCalendar function and populates the #calendar object
//				 on the webpage
//*****************************************************************************************
function populateCalendar(calEvents) {
	$('#calendar').fullCalendar({
		events: calEvents, 
		height: 770,
		defaultDate: new Date(),
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
function populateEventPopUp(popUpContentDiv, eventData){
	$(popUpContentDiv).empty();

	console.log("------------POPULATE EVENT--------------");
	for(i in eventData) {
		console.log (i, eventData[i])
	}
	console.log("------------POPULATE EVENT--------------");
	
	
	//make sure div is passed
	if (!((popUpContentDiv == "") || (typeof popUpContentDiv === undefined) || (popUpContentDiv == null)))
	{
		if (!(popUpContentDiv.length)){
			
			
			
		}
		else{
			if (DEBUG) console.log("popUpContentDiv '" + popUpContentDiv + "' not found on page");			
		}
	}
	else{
		//TODO: universal error messages
		if (DEBUG) console.log("PopUpContentDiv not passed to populateEventPopUp.");
	}
	
	/*
	if (eventData.type == "assignment"){
		$(popUpContentDiv).append($("<div>").attr("id", "popUpContentWrapper"));
		$("#popUpContentWrapper").append($("<div>").attr("id", "eventIcon").addClass("assignmentIcon"));
		$("#popUpContentWrapper").append($("<h1>").attr("id", "modalTitle").html("Assignment"));
		$("#popUpContentWrapper").append($("<h3>").attr("id", "assignmentTitle").html(eventData.title));
		$("#popUpContentWrapper").append($("<ul>").attr("id", "assignmentProperties").addClass("assignmentProperties"));
		
		if (!(typeof eventData.start === 'undefined')){
			if (eventData.start != ""){
			$("#assignmentProperties").append($("<li>").attr("id", "dueItem").append($("<div>").attr("id", "dueHeader").html("Due-")));
			$("#dueItem").append($("<div>").attr("id", "due").html((moment(eventData.start).format('MMMM DD, YYYY h:mm A'))));
			}
		}
		
		if (!(typeof eventData.submitVia === 'undefined')){
			if (eventData.submitVia != ""){ //wont work any other way
				$("#assignmentProperties").append($("<li>").attr("id", "submitViaItem").append($("<div>").attr("id", "submitViaHeader").html("Submit-")));
				$("#submitViaItem").append($("<div>").attr("id", "submitVia").html(eventData.submitVia));
			}
		}
		
		if (!(typeof eventData.deliverable === 'undefined')){
			if (eventData.deliverable != "") {
				$("#assignmentProperties").append($("<li>").attr("id", "deliverableItem").append($("<div>").attr("id", "deliverableHeader").html("Deliverable-")));
				$("#deliverableItem").append($("<div>").attr("id", "deliverable").html(eventData.deliverable));				
			}
		}		
		
		if (!(typeof eventData.description === 'undefined')){
			if (eventData.description != "") {
				$("#assignmentProperties").append($("<p>").attr("id", "description").html(eventData.description));				
			}
		}
		
		$("#popUpContentWrapper").append($("<div>").attr("id", "clear").attr("style", "clear:both"));
		
		if (!(typeof eventData.moreUrl === 'undefined')){
			if (eventData.moreUrl != "") {
				$(popUpContentDiv).append($("<div>").append($("<a>").attr("id", "moreLink").attr("href", event.moreUrl).html("View more on module assignment page...")));
			}
		}
	}
	//write code here for Module Info popup (need to grab objectives, description etc which are not avaiable in the JSON file yet)
	*/
}
