//*****************************************************************************************
//Function Name: writeUpEvents()
//Input: 		 url with location of json file 		 
//Output:		 none, fills an html dom element
//Purpose:		 writes events in nice format for landing page, assumes landing page div is 
//*****************************************************************************************
function writeUpEvents(eventList) {
	
	eventList = [
    {
        "type": "assignments",
        "title": "Read Textbook Chapters",
        "id": "4e7fd56dd4a60041092a5c1b1966eec2fc948abdbf93e23ff930bc69fe9b570c98b21163",
        "dueDate": "2016-04-18 00:00:00",
        "url": "courses/201530/comm270a/modules/1/assignments#1",
        "deliverable": "N/A",
        "description": "Chapter 1&nbsp;Online Student ResourcesOnline Student Resources&nbsp;"
    },
    {
        "type": "assignments",
        "title": "View Topics and Video Lectures",
        "id": "2ac0a199ead91473205b6e83b1ed2d9dcc09c8bb5d17df63925cf84e968bbdc2ac16d77f",
        "dueDate": "2016-05-18 00:00:00",
        "url": "courses/201530/comm270a/modules/1/assignments#2",
        "deliverable": "N/A",
        "description": "After completing the readings for this module, go to Topics in the module menu and review each to..."
    },
    {
        "type": "assignments",
        "title": "Watch Movie",
        "id": "f5f5061589a71079f902e7d18224a7c948d05db97f1fd7815b6005a4526752f1860ce4fd",
        "dueDate": "2016-05-20 00:00:00",
        "url": "courses/201530/comm270a/modules/1/assignments#3",
        "deliverable": "Watch the movie \"The Graduate\".",
        "description": "Watch the movie \"The Graduate\". You can watch it on iTunes for $3.99.The Graduate&nbsp;"
    },
    {
        "type": "assignments",
        "title": "Blog Assignment #1 - The Graduate",
        "id": "3dea7842bdaae3726936a53c2bcae02a3b4d33fd94a91ea5c5eee7938fe2ba7be0b38132",
        "dueDate": "2016-07-22 00:00:00",
        "url": "courses/201530/comm270a/modules/1/assignments#4",
        "deliverable": "By the due date at 11:59 PM ET of this module, post your blog in the Blackboard course website ap...",
        "description": "Blog Assignment #1 - The GraduateBlog Assignment #1 - The GraduateAccess Course Blackboard site, ..."
    },
    {
        "type": "assignments",
        "title": "Complete Quiz for this Module in Blackboard",
        "id": "6163ccff7b1c137b05a01e42fc981fa3bd0d15d7055c8600262f8fbbfa21ad10c45197ae",
        "dueDate": "2016-05-22 00:00:00",
        "url": "courses/201530/comm270a/modules/1/assignments#5",
        "deliverable": "Complete and Submit Quiz in Blackboard",
        "description": "75 points.75 points.This is a&nbsp;50 minutes timed quiz. The Quiz will only be available on the ..."
    },
    {
        "type": "assignments",
        "title": "Read Textbook Chapter",
        "id": "09203a0b810d0c054f3f15d6db42aa850bea917432cb932b0c01efb7c3eafee642f0a628",
        "dueDate": "2016-08-24 00:00:00",
        "url": "courses/201530/comm270a/modules/2/assignments#1",
        "deliverable": "N/A",
        "description": "Chapter 2Online Student ResourcesOnline Student Resources"
    }
];
	
	
	if (typeof eventList != "undefined"){
		var expectedKeys = ["type", "title", "id", "theDate", "url", "description"];
		
		for (var i=0; i< eventList.length; i++){
			var theEvent = []; //clear out any residule
			theEvent = eventList[i];
			
			
			
			theEvent = changeKeyName(theEvent, "dueDate", "theDate");	//to make js not barf
			theEvent = changeKeyName(theEvent, "date", "theDate");	//to make js not barf
			
			if (!hasEmptyKeys(theEvent, expectedKeys)){
				eventDivId = "event_" + i;
				eventDateDivId = "eventDate_" + i;
				
				/*$("#odu_upEventsWrapper").append($("<div>").attr("id",  eventDivId).addClass("odu_upEvent"));
				$("#" + eventDivId).append($("<div>").addClass("wrapper").attr("id", append($("<div>").addClass("date").attr("id", eventDateDivId)));
				$("#" + eventDateDivId).html(moment(theEvent.theDate).format("MMM"));
				$("#" + eventDateDivId).append($("<h2>").html(moment(theEvent.theDate).format("DD")));
				$("#" + eventDateDivId).append($("<time>").html(moment(theEvent.theDate).format("h:mm A")));
				$("#" + eventDivId).append($("<h3>").append($("<a>").attr("href", theEvent.url).html(theEvent.title)));
				$("#" + eventDivId).append($("<div>").addClass("clearFix"));
				$("#" + eventDivId).append($("<p>").html(theEvent.description).append($("<a>").attr("href", theEvent.url).html("More...")));
				*/
				/*
				<div class="odu_upEvent" id="event_5">
				<div class="dateTitleWrapper">
				<div class="date">Jan
				<h2>18</h2>
				<time>11:59 pm</time>
				<h3>
				<a href="#">stuff</a>
				<div class="clearFix">
				<p>stuff</p>
				<a href="#">More &gt;</a>
				*/
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
								$("<a>").attr("href", theEvent.url).html(theEvent.title)
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

