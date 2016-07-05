
//*****************************************************************************************
//Function Name: writeSmallCalendar()
//Input: 		 smallCalDiv - where the calendar should be written, "cal" not "#cal"
//				 eventList - json obj of events
//Output:		 none, fills an html dom element
//Purpose:		 calls the fullCalendar function and populates the small calendar object
//				 on the webpage
//*****************************************************************************************
function writeSmallCalendar(smallCalDiv, eventList) {
	if (DEBUG) benchMark("start", "writeSmallCalendar", {"eventList": eventList, "smallCalDiv": smallCalDiv});
	
	//is a value passed
	if (!((smallCalDiv == "") || (typeof smallCalDiv === undefined) || (smallCalDiv == null))){

		//is the div there?
		if (("#" + smallCalDiv).length){	//this doesnt do what I think it does.
			
			$("#" + smallCalDiv).append($("<div>").attr("id", smallCalDiv + "PopUpSection")
				.append($("<div>").attr("id", smallCalDiv + "PopUpWrapper")
					.append($("<div>").attr("id", smallCalDiv + "PopUp"))));

			//check to see that there was an events var passsed and that there is something in the object					
			if (!((eventList == "") || (typeof eventList === undefined) || (eventList == null))){
				
				$("#" + smallCalDiv).fullCalendar({
					events: addEventItemCss(eventList), //set short title for small calendar
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
							populateEventPopUp(smallCalDiv + "PopUp", event);
							$("#" + smallCalDiv + "PopUp").dialog({ modal: false, width:600, height: 500});
						});				
					}				
				});
				
			}
			else { if (DEBUG) console.log("eventList passed to writeSmallCalendar is null"); }
		}
		else{ if (DEBUG) console.log("smallCalDiv '" + smallCalDiv + "' does not exist"); }
	}
	else { if (DEBUG) console.log("smalLCalDiv not passed to writeSmallCalendar.");	}

	//$(smallCalDiv + "PopUp").attr("class", "displayBlock");
	if (DEBUG) benchMark("end", "writeSmallCalendar", "");
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
	//	if (("#" + popUpContentDiv.length)){	//this doesnt do what I think it does
			
			$("#" + popUpContentDiv).empty();	//clear out residual	
			
			if (eventData.type == "assignment"){
				$("#" + popUpContentDiv).append($("<ul>").attr("id", "odu_assignments"));
				writeAssignment("odu_assignments", eventData);
			}
			else if (eventData.type == "multiple"){
				writeAssignments("odu_assignments", eventData.list);
			}
			else if(eventData.type == "module"){
				$("#" + popUpContentDiv).append($("<div>").attr("id", "odu_moduleOverview"));
				$("#odu_moduleOverview").html("module overview here");				
			}
			
	//	}
	//	else{ if (DEBUG) console.log("popUpContentDiv '" + popUpContentDiv + "' not found on page"); }
	}
	else{ if (DEBUG) console.log("PopUpContentDiv not passed to populateEventPopUp."); }
}