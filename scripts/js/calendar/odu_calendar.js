
//*****************************************************************************************
//Function Name: writeSmallCalendar()
//Input: 		 smallCalDiv - where the calendar should be written
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
			if ((smallCalDiv.length)){
				$(smallCalDiv).append($("<div>").attr("id", smallCalDiv + "PopUpSection")
					.append($("<div>").attr("id", smallCalDiv + "PopUpWrapper")
						.append($("<div>").attr("id", smallCalDiv + "PopUp"))));

				//check to see that there was an events var passsed and that there is something in the object					
				if (!((eventList == "") || (typeof eventList === undefined) || (eventList == null))){
					
					$(smallCalDiv).fullCalendar({
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
								populateEventPopUp(smallCalDiv + "PopUp", event);
								$(smallCalDiv + "PopUp").dialog({ modal: false, width:600, height: 500});
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

