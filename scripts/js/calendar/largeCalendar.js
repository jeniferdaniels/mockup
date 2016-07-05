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


