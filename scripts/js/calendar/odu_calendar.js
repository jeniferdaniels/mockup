
//*****************************************************************************************
//Function Name: writeSmallCalendar()
//Input: 		 url with loacation of json file 		 
//Output:		 none, fills an html dom element
//Purpose:		 calls the fullCalendar function and populates the #calendar object
//				 on the webpage
//*****************************************************************************************
function writeSmallCalendar(url) {
	$.ajax({ 
		url: url
	}).done(function(obj){
		
		//add link to full schedule
		//$("#odu_smallCalendarContainer").after($("<a>").attr("href", scheduleUrl).html("Full Schedule"));
		
		//add divs for pop up
		//$("#odu_smallCalendarContainer").append($("<div>").attr("id", "odu_calendarPopUp").attr("class","displayNone").css("z-index", "30000").attr("title", "Assignment Details"));
		//$("#odu_calendarPopUp").append($("<div>").attr("id", "odu_popUpContentWrapper"));
		//$("#odu_popUpContentWrapper").append($("<div>").attr("id", "odu_popUpContent"));

		//add small calendar
		$("#odu_smallCalendar").fullCalendar({
			events: formatForSmallCal(obj), //set short title for small calendar
			height: 430,
			fixedWeekCount: true,
			defaultDate: moment().format('2016-01-18'), //defaultDate: moment().format('YYYY-MM-DD'),
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
	});
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
				obj = changeKeyName(obj, "due", "start");
			
				//TODO: fix this so its not so stupid 
				if (obj.type == "module"){
					obj = addKeyValuePair(obj, "color", modColor);
					obj = addKeyValuePair(obj, "textColor", modTextColor);
				}
				else{
					obj = addKeyValuePair(obj, "color", assColor);
					obj = addKeyValuePair(obj, "textColor", assTextColor);
				}
			}
		}
	}
	return eventList;
}

