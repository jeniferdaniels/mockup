//*****************************************************************************************
//Function Name: writeUpEvents()
//Input: 		 eventList - json file 
//				 eventListContainerId - id for where to put this list		 
//Output:		 none, fills an html dom element
//Purpose:		 writes events in nice format for home page, assumes home page div is 
//Dependencies:	 needs utils.js function hasEmptyKeys()
//*****************************************************************************************
function writeUpEvents(eventList, eventListContainerId) {

	if (typeof eventList != "undefined"){
		var expectedKeys = ["type", "title", "longTitle", "id", "theDate", "url", "description"];
		
		if (eventList.length > 0){
			$(eventListContainerId).addClass("wrapper").append($("<ul>").attr("id","odu_upEvents"));
		
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
			}
			
		}
	}
}

