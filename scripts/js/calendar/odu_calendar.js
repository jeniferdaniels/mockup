
//*****************************************************************************************
//Function Name: writeSmallCalendar()
//Input: 		 calDiv - where the calendar should be written, "cal" not "#cal"
//				 eventList - json obj of events
//Output:		 none, fills an html dom element
//Purpose:		 calls the fullCalendar function and populates the small calendar object
//				 on the webpage
//*****************************************************************************************
function writeCalendar(calDiv, eventList, calSize) {
	if (DEBUG) benchMark("start", "writeSmallCalendar", {"eventList": eventList, "calDiv": calDiv, "calSize": calSize});
	
	//Calendar vars	
	calHeight = 770; //largeAsDefault
	rightHeader = "month, basicWeek, next"; 

	if (calSize == "s"){
		calHeight = 430;
		rightHeader = "next";
	}
	
	if (!isEmpty(calDiv)){
		if ($("#" + calDiv).length){

		//check to see that there was an events var passsed and that there is something in the object					
			if (!isEmpty(eventList)){		
				$("#" + calDiv).fullCalendar({
					events: addEventItemCss(eventList),
					height: calHeight,
					fixedWeekCount: false,
					defaultDate: new Date(),
					theme: true,
					header: {
						left:   'prev',
						center: 'title',
						right:  rightHeader
					},
					themeButtonIcons: {
						prev:  'odu_left-chevron',
						next:  'odu_right-chevron'
					},
					eventRender: function (event, element) {
						element.attr('href', 'javascript:void(0);');
						element.click(function() {
							populateEventPopUp(calDiv + "PopUp", event);
							$("#" + calDiv + "PopUp").dialog({ title: "Calendar Event", modal: false, width:600, minHeight: 300, maxHeight: 500});
						});				
					}				
				});
			
				//only write the popup if there are events
				$("#" + calDiv).append($("<div>").attr("id", calDiv + "PopUpSection")
					.append($("<div>").attr("id", calDiv + "PopUpWrapper")
						.append($("<div>").attr("id", calDiv + "PopUp"))));

			}
			else { if (DEBUG) console.log("eventList passed to writeCalendar is null"); }
		}
		else{ if (DEBUG) console.log("calDiv " + calDiv + " does not exist"); }
	}
	else { if (DEBUG) console.log("calDiv not passed to writeCalendar.");	}
}

function addEventItemCss(eventList){
	
	if (typeof eventList != "undefined"){
		for (var i=0; i< eventList.length; i++){
			var obj = {}; //clear out any residule
			obj = eventList[i];
			
			if (typeof obj != "undefined"){
				cssName = obj.type + "SmallEvent";
				obj = addKeyValuePair(obj, "className", cssName); //there are classes named "module", "assignment", "multiple"
			}
		}
	}
	return eventList;
}

function populateEventPopUp(popUpContentDiv, eventData){
	//make sure div is passed
	if (!((popUpContentDiv == "") || (typeof popUpContentDiv === undefined) || (popUpContentDiv == null)))
	{
		if ($("#" + popUpContentDiv.length)){	//this doesnt do what I think it does
			
			$("#" + popUpContentDiv).empty();	//clear out residual	
			
			
			//TODO: this is ugly
			if (eventData.type == "assignment"){
				$("#" + popUpContentDiv).append($("<ul>").attr("id", "odu_assignments"));
				writeAssignment("odu_assignments", eventData);
			}
			else if (eventData.type == "multiple"){
				writeAssignments(popUpContentDiv, eventData.list);
			}
			else if(eventData.type == "module"){
				$("#" + popUpContentDiv).append($("<div>").attr("id", "odu_moduleOverview"));
				$("#odu_moduleOverview").html("module overview here");				
			}
			
			
			
		}
		else{ if (DEBUG) console.log("popUpContentDiv " + popUpContentDiv + " not found on page"); }
	}
	else{ if (DEBUG) console.log("PopUpContentDiv not passed to populateEventPopUp."); }
}