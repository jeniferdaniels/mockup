
//*****************************************************************************************
//Function Name: writeSmallCalendar()
//Input: 		 eventList with json data 
//Output:		 none, fills an html dom element
//Purpose:		 calls the fullCalendar function and populates the #calendar object
//				 on the webpage
//*****************************************************************************************
function writeSmallCalendar(smalLCalDiv, eventList) {

		if (DEBUG) benchMark("start", "writeSmallCalendar", {"eventList": eventList, "smalLCalDiv": smalLCalDiv});
		
		
		//is a value passed?
		if (!((smalLCalDiv == "") || (typeof smalLCalDiv === undefined) || (smalLCalDiv == null))){
			
			
		}
		else{
			if (DEBUG) console.log("smalLCalDiv not passed to writeSmallCalendar.");
		
		}
		
		
		//add divs for pop up
		/*$(smalLCalDiv).append($("<div>").attr("id", "odu_calendarPopUp").attr("class","displayNone").css("z-index", "30000"));	//TODO: add class not css
		$("#odu_calendarPopUp").append($("<div>").attr("id", "odu_popUpWrapper"));
		$("#odu_popUpWrapper").append($("<div>").attr("id", "odu_popUp"));

		//add small calendar
		$("#" + smalLCalDiv).fullCalendar({
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
					populateEventPopUp("#odu_popUpContent", event);
					$("#odu_popUpContent").dialog({ modal: false, width:600, height: 500});
				});				
			}				
		});
	
		$("#odu_popUpContent").attr("class", "displayBlock");
		*/
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

