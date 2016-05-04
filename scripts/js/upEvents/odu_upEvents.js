//*****************************************************************************************
//Function Name: writeUpEvents()
//Input: 		 url with location of json file 		 
//Output:		 none, fills an html dom element
//Purpose:		 writes events in nice format for landing page, assumes landing page div is 
//*****************************************************************************************
function writeUpEvents(eventList) {

	if (typeof eventList != "undefined"){
		var expectedKeys = ["type", "title", "longTitle", "id", "theDate", "url", "description"];
		
		for (var i=0; i< eventList.length; i++){
			var theEvent = []; //clear out any residule
			theEvent = eventList[i];
			
			console.log(dump(theEvent));
			
			theEvent = changeKeyName(theEvent, "dueDate", "theDate");	//to make js not barf
			theEvent = changeKeyName(theEvent, "date", "theDate");	//to make js not barf
			
			if (!hasEmptyKeys(theEvent, expectedKeys)){
				eventDivId = "event_" + i;
				
				$("#odu_upEventsWrapper").append(
					$("<div>").addClass("odu_upEvent").attr("id", eventDivId).append(
						$("<div>").addClass("dateTitleWrapper").append(
							$("<div>").addClass("date").html(moment(theEvent.theDate).format("MMM")).append(
								$("<h2>").html(moment(theEvent.theDate).format("DD"))
							).append(
								$("<time>").html(moment(theEvent.theDate).format("h:MM A"))
							)
						).append(
							$("<h3>").append(
								$("<a>").attr("href", theEvent.url).html(theEvent.title + " " + theEvent.longTitle)
							)
						).append(
							$("<div>").addClass("clearFix")
						).append(
							$("<p>").html(theEvent.description).append(
								$("<a>").attr("href", theEvent.url).html("More >")
							)
						)
					)
				);

				
				string = '<div class="odu_upEvent" id="event_5"><div class="dateTitleWrapper"><div class="date">Jan<h2>18</h2><time>11:59 pm</time></div><h3><a href="#">Assignment: A.1 itle Here dfjk  sdkjf sakdjfl ksjdflk dasfj sdljflska jsdkjdlsj</a></h3></div><div class="clearFix"></div><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula</p><a href="#">More &gt;</a></div>';
				//$("#odu_upEventsWrapper").html(string);
				
			}

		}
	}
}

