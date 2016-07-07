//*****************************************************************************************
//Function Name: writeUpEvents()
//Input: 		 eventList - json file 
//				 baseDiv - id for where to put this list		 
//Output:		 none, fills an html dom element
//Purpose:		 writes events in nice format for home page, assumes home page div is 
//Dependencies:	 needs utils.js function hasEmptyKeys()
//*****************************************************************************************
function writeUpEvents(baseDiv, eventList) {

	if (!isEmpty(eventList)){
		var expectedKeys = ["type", "title", "longTitle", "id", "theDate", "url", "description"];
		
		if (eventList.length > 0){
			if (!isEmpty(baseDiv)){
				if ($("#" + baseDiv).length)
				{
					$("#" + baseDiv).addClass("wrapper").append($("<ul>").attr("id","odu_upEvents"));
			
					for (var i=0; i< eventList.length; i++){
						//$("#odu_upEventsLists").append("<li>");
						var theEvent = []; //clear out any residule
						theEvent = eventList[i];
						theEvent = changeKeyName(theEvent, "dueDate", "theDate");	//to make js not barf
						theEvent = changeKeyName(theEvent, "date", "theDate");	//to make js not barf
						
						if (!hasEmptyKeys(theEvent, expectedKeys)){
							eventId = "event_" + i;
							
							$("#odu_upEvents").append(
								$("<li>").attr("id", eventId).addClass("odu_upEvent")
								.append($("<div>").addClass("dateBox")
									.append($("<div>").addClass("dateBoxMonth").html(moment(theEvent.theDate).format("MMM")))
									.append($("<div>").addClass("dateBoxDay").html(moment(theEvent.theDate).format("DD")))
									.append($("<div>").addClass("dateBoxTime").html(moment(theEvent.theDate).format("h:MM A"))))
									.append($("<div>")
								.append($("<h1>").html(theEvent.title + " " + theEvent.longTitle))
									.append($("<p>").html(theEvent.description)
										.append($("<a>").html("More...").attr("href", theEvent.url)))));
						}
						else { if (DEBUG) console.log("event has one or more empty keys");}
					} 
				}
				else { if (DEBUG) console.log("baseDiv " + baseDiv + " sent to writeUpEvents not found");}
			} 
			else { if (DEBUG) console.log("baseDiv sent to writeUpEvents null");}
		} 
		else { if (DEBUG) console.log("no items in the event list");}
	} 
	else { if (DEBUG) console.log("eventList sent to writeUpEvents null");}
}

