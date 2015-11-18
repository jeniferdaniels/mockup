//GLOBALS
var gShowConsoleMsgs = false;

//********************************************************************
//Getters
//********************************************************************
function getCourseTitle(obj){
	return obj.course.courseNumber + "-" + obj.course.title;
}

function getInstructorObject(obj){
	return obj.course.instructor;
}

//*****************************************************************************************
//Name: 		getObjectFromArray
//Input:		obj = json object, an array object
//				field = field name in the modules array
//				id = some id to look for a match
//Returns:		module object if found, null if not found or errors out
//Description:  looks into the json obj into the array for 
//				a field that matches the id.  This is cool because you can 
//				pass it differnt field names and it will find the module
//Example Use:	myModule = getObjectFromArray(obj, "title", "Overview and Course Logistic");
//				myModule = getObjectFromArray(obj, "moduleDisplayOrder", 1); 
//*****************************************************************************************
function getObjectFromArray(objArray, field, id){

	var selectedItem, itemFieldValue = null; //returning null is better than undefined
	var matchCount = 0;
	
	//check to see if there is an object in the first place
	if (typeof objArray != "undefined") {

		//had code to check if it was an array, didn't work. this will work itself out when looking for
		//the particular field
		//if its a string, it will loop through each character
		for (var i=0; i< objArray.length; i++){

				//if (gShowConsoleMsgs) console.log(objArray[i]);
				//check to see if this is even a valid field
				if (objArray[i].hasOwnProperty(field)){
	
					//since we are dynamically getting the field name
					eval("itemFieldValue = objArray[i]." + field);
					//if (gShowConsoleMsgs) console.log("object[" + i + "]." + field + " = " + itemFieldValue);
						
					if (itemFieldValue == id){
							//if (gShowConsoleMsgs) console.log ("Match for '" + field + "' = '" + id + "' at object[" + i + "]");	
							
							selectedItem = objArray[i];
							matchCount++;
							//normally I would use i=objArray.length; to jump out of loop so we can return this properly
							//but since something like "parent" can be passed in where more than one item can have 
							//the same parent id, I'll continue throught the object to see if there are others that match
							//if there are, then I'll error out after it goes through the loop
							
					} //else 	{if (gShowConsoleMsgs) console.log("No match for '" + field + "' = '" + id + "' at object[" + i + "]");}
				} //else {if (gShowConsoleMsgs) console.log("object[" + i +  "] does not have the property '" + field + "'");}
					
			}//end loop
	} //else {if (gShowConsoleMsgs) console.log("object is undefined");}
	
	if (matchCount < 1)
	{
		//if(gShowConsoleMsgs) console.log("More than one object found with property '" + field + "' = '" + id + "'. Returning null")
		selectedItem = null;
	}
	
	return selectedItem;
}


function nextChar(c) {
	//63 is start of capital letters,
	//64 will give next char
	return (String.fromCharCode(c+64));
}


function updateRunningCount(runningCounts, itemType){
	if (itemType == "assignments")
		runningCounts[1]++;
	else
		runningCounts[0]++;
	return runningCounts;
}

function showSequenceNumber(runningCounts, itemType){
	return (itemType != "assignments")? runningCounts[0] :nextChar(runningCounts[1]);	
}

//*****************************************************************************************************
//Sorts by field
//*****************************************************************************************************
var sort_by = function(field, reverse){
	if (gShowConsoleMsgs) "Sorting";
	
	   var key = function(x) {return x[field]};
	   reverse = !reverse ? 1 : -1;
	   return function (a, b) {
	       return a = key(a), b = key(b), reverse * ((a > b) - (b > a));
	     } 
}


//********************************************************************
//setters
//********************************************************************
function setDocumentTitle(obj){
	var strTitle = obj.course.courseNumber + "-" + obj.course.title;
	document.title = strTitle;
}

function setTop(obj){
	document.getElementById("courseTitle").innerHTML = "<a href='/mockups/index.php'>" + getCourseTitle(obj) + "</a>";
	document.getElementById("courseInstructor").innerHTML += "<a href='/mockups/faculty.php'>" + getInstructorObject(obj).name + "</a>";
	
}


function setInstructorInformation(obj)
{
	instructor = getInstructorObject(obj);
	document.getElementById("instructorName").innerHTML = instructor.name;
	document.getElementById("instructorPhone").innerHTML = instructor.phone;
	document.getElementById("instructorEmail").innerHTML = instructor.email;	
}


function hiddenCheck(id){
	return "<i id='check_" + id + "' class='material-icons md-18 hidden success'>check</i>"
}



function setCourseContent(obj){	
	var html = "";
	var classNumber = "CAT101";
	//TODO: just print to screen using flat(obj)
	
	//put in display order
	var modules = obj.course.modules.sort(sort_by("moduleDisplayOrder", false));
	
	//LOOP THROUGH EACH MODULE IN DISPLAY ORDER
	for (var i=0; i<modules.length; i++){
		var theModule = modules[i];
		if (gShowConsoleMsgs) console.log(i + ". " + theModule.title);

		moduleItems = theModule.items;
		oneLevelDeepModuleItems = [];

		//GET THE ITEMS IN THE MODULE, IF THEY HAVE ITEMS THEMSELVES, GET THOSE
		//FLATTEN THIS ARRAY
		for (var j=0; j<moduleItems.length; j++){
			var runningCounts = [0,0]; //numbers, assignments

			//this is where it gets tricky.  the topics and assignments can be intermingled and they are arrays themselves.
			//so we need to fetch the object and put it in a flattened array for the purposes of this display
			if ((moduleItems[j].type == "topics")|| moduleItems[j].type == "assignments")
			{			
				//dig into each item in the topics or assignments array and pop that item out into the flattened array
				for (var k=0; k < moduleItems[j].items.length; k++){
						var moduleItemsItem = moduleItems[j].items[k];
						//add this part so we can get the numbering correct later
						moduleItemsItem["type"] = moduleItems[j].type;  //why not add this to the json file in the first place? reduce redundancy in the file.
						oneLevelDeepModuleItems.push(moduleItemsItem);
					}
			}
			else {
			//otherwise get the resources and glossary itms or whatver one level deep stuff
				oneLevelDeepModuleItems.push(moduleItems[j]);
			}
		}
		
		//order them sequentially
		oneLevelDeepModuleItems.sort(sort_by("innerModuleDisplayOrder", false));
		
		
		//start string to write out
		html += "<div class='toggleBox' id='toggleBox_" + i + "'>";
		html += "<h3 id='moduleTitle_" + i + "' class='trigger_" + i + "'>" + i + ". " + theModule.title + "</h3>";
		html += "<div class='toggleWrap_" + i + "'>";
		html += "<ul>";
		//build module string to write to screen
		for (var n=0; n<oneLevelDeepModuleItems.length; n++){
			runningCounts = updateRunningCount(runningCounts, oneLevelDeepModuleItems[n].type);
			sequenceNumber = showSequenceNumber(runningCounts, oneLevelDeepModuleItems[n].type);
			
			if (gShowConsoleMsgs) { console.log(i + "." + sequenceNumber + " " + oneLevelDeepModuleItems[n].title + "type is" + oneLevelDeepModuleItems[n].type); }
			
			html += "<li><h4>" + hiddenCheck(oneLevelDeepModuleItems[n].id) + "<a href='" + oneLevelDeepModuleItems[n].url + "'>" + i + "." + sequenceNumber + " " + oneLevelDeepModuleItems[n].title + "</a></h4>";
			if (oneLevelDeepModuleItems[n].type == "topics"){
				html += "<ul>";
				//get the subtopics on display order
				var subTopics = oneLevelDeepModuleItems[n].subtopics.sort(sort_by("subtopicDisplayOrder", false));
					for (var p=0; p<subTopics.length; p++){
						if (gShowConsoleMsgs) { console.log(i + "." + sequenceNumber + "." + p + " " + subTopics[p].title)}
						html += "<li>" + hiddenCheck(subTopics[p].id) + "<a href='" + subTopics[p].url + "'>" + i + "." + sequenceNumber + "." + p + " " + subTopics[p].title + "</a></li>";
					}
						
				
				html += "</ul>"; 
			}
			html += "</li>";	
		}
		html += "</ul></div></div>";
		html += "</div>"; //end box wrapper
		
		document.getElementById("courseContent").innerHTML = html;
	}
}
		
		
function flatten(obj){	
	
	//put in display order
	var modules = obj.course.modules.sort(sort_by("moduleDisplayOrder", false));
	var item = {};
	var items = [];
	
	//LOOP THROUGH EACH MODULE IN DISPLAY ORDER
	for (var i=0; i<modules.length; i++){
		
		var theModule = modules[i];
		item = {};
		
		item.id = theModule.id;
		item.parent = theModule.parent;
		item.title = theModule.title;
		item.displayNumber = i;
		item.url = theModule.url;
		items.push(item);
		item = {};
		
		moduleItems = theModule.items;
		oneLevelDeepModuleItems = [];

		//GET THE ITEMS IN THE MODULE, IF THEY HAVE ITEMS THEMSELVES, GET THOSE
		//FLATTEN THIS ARRAY
		for (var j=0; j<moduleItems.length; j++){
			var runningCounts = [0,0]; //numbers, assignments

			//this is where it gets tricky.  the topics and assignments can be intermingled and they are arrays themselves.
			//so we need to fetch the object and put it in a flattened array for the purposes of this display
			if ((moduleItems[j].type == "topics")|| moduleItems[j].type == "assignments")
			{			
				//dig into each item in the topics or assignments array and pop that item out into the flattened array
				for (var k=0; k < moduleItems[j].items.length; k++){
						var moduleItemsItem = moduleItems[j].items[k];
						//add this part so we can get the numbering correct later
						moduleItemsItem["type"] = moduleItems[j].type;  //why not add this to the json file in the first place? reduce redundancy in the file.
						oneLevelDeepModuleItems.push(moduleItemsItem);
					}
			}
			else {
			//otherwise get the resources and glossary itms or whatver one level deep stuff
				oneLevelDeepModuleItems.push(moduleItems[j]);
			}
		}
		
		//order them sequentially
		oneLevelDeepModuleItems.sort(sort_by("innerModuleDisplayOrder", false));

		//build module string to write to screen
		for (var n=0; n<oneLevelDeepModuleItems.length; n++){
			runningCounts = updateRunningCount(runningCounts, oneLevelDeepModuleItems[n].type);
			sequenceNumber = showSequenceNumber(runningCounts, oneLevelDeepModuleItems[n].type);
			
			displayNumber = i + "." + sequenceNumber;
			item.id = oneLevelDeepModuleItems[n].id;
			item.parent = oneLevelDeepModuleItems[n].parent;
			item.type = oneLevelDeepModuleItems[n].type;
			item.title = oneLevelDeepModuleItems[n].title;
			item.displayNumber = displayNumber;
			item.url = oneLevelDeepModuleItems[n].url;
			
			
			
			if (oneLevelDeepModuleItems[n].type == "assignments"){
				item.due = oneLevelDeepModuleItems[n].start;
				item.deliverable = oneLevelDeepModuleItems[n].deliverable; //may be null
				item.submitVia = oneLevelDeepModuleItems[n].submitVia; // may be null
				item.description = oneLevelDeepModuleItems[n].description;
			}
			items.push(item);
			item = {};
			
			
			if (oneLevelDeepModuleItems[n].type == "topics"){
				var subtopics = oneLevelDeepModuleItems[n].subtopics.sort(sort_by("subtopicDisplayOrder", false));
					for (var p=0; p<subtopics.length; p++){
						sequenceNumber = showSequenceNumber(runningCounts, oneLevelDeepModuleItems[n].type);						
						item.id = subtopics[p].id;
						item.parent = subtopics[p].parent;
						item.type="subtopic";
						item.title = subtopics[p].title;
						item.displayNumber = displayNumber + "." + p;
						item.content = subtopics[p].content;		
						item.url = subtopics[p].url;
						
						items.push(item);
						item = {};
					}
			}
		}
	}
	
	return items;
}
	
function testFlat(items){
	for (i in items){
		item = items[i];
			console.log("--------------");
			for (j in item){
				console.log(j + " " + item[j]);
			}
	}
	
	
}



////////////////////////////////////////////////////////
//CALENDAR STUFF
////////////////////////////////////////////////////////
//obj = full course info
function getEvents(obj)
{
	var moduleEventColor = "rgba(250,250,250,1)";
	var moduleTextColor = "black";
	var assignmentEventColor = "rgba(68,136,246,1)";
	var assignmentTextColor = "white";
	
	//default it for now	
	var events = [];

	//put in display order, in actuality it doesnt matter but this is good for looking at the json file manually
	var modules = obj.course.modules.sort(sort_by("moduleDisplayOrder", false));
	
	
	for (var i=0; i<modules.length; i++){
		var cEvent = {};

		//make the modules themselves events
		cEvent.type = "module";
		cEvent.title = modules[i].title;
		cEvent.moduleNumber = i;
		cEvent.start = modules[i].start;
		cEvent.end = modules[i].end;
		cEvent.color = moduleEventColor;
		cEvent.textColor = moduleTextColor;
		cEvent.description = modules[i].overview;
	
		events.push(cEvent);
		cEvent = "";
		
		//now go into the modules, into the assignments and put those into calendar events
		assignmentsObj = getObjectFromArray(modules[i].items, "type", "assignments");
		assignmentsArray = assignmentsObj.items;
		for (var j=0; j< assignmentsArray.length; j++){
			cEvent = assignmentsArray[j];
			cEvent.type = "assignment";
			cEvent.icon = "assignment"; //font awesome icon for assignment
			cEvent.textColor = assignmentTextColor;
			cEvent.color = assignmentEventColor;
			events.push(cEvent);
		}

	}
	
	
	/*for (var k=0; k<events.length; k++){
		console.log("----------k is " + k + "---------------" );
		console.log(events[k].title);
		console.log(events[k].start);
		console.log(events[k].end);
		console.log(events[k].color);
		console.log(events[k].textColor);
		console.log(events[k].submitVia);
		console.log(events[k].deliverable);
		console.log(events[k].description);	
	}*/
	
	
	
	return events;
}

function getEventsAtAGlance (obj)
{
	var events = getEvents(obj);
	//now go through the events and change the titles, icons, etc
	for (var i=0; i<events.length; i++){
		theEvent = events[i];
		if (theEvent.type == "module"){
			theEvent.title = "Module " + theEvent.moduleNumber;
		}
		else{
			theEvent.title = "";
			theEvent.textColor = "rgba(0, 168, 88, 1);"
			theEvent.color = "rgba(255,255,255,1)";
		}
			
	}

	return events;

}

function getUpcomingAssignments(obj)
{
	var events = getEvents(obj);
	var assignments = [];
	var theAssignment = {};
	
	for (var i=0; i<events.length; i++){
		theEvent = events[i];
		
		if (!(theEvent.type == "module")){
			theAssignment.dueDate = theEvent.start;
			theAssignment.title = theEvent.title;
			theAssignment.deliverable = theEvent.deliverable;
			theAssignment.submitVia = theEvent.submitVia;
			theAssignment.description = theEvent.description;
			
			assignments.push(theAssignment);
		}
	}

	return assignments;

}

function getSubtopics(flatCourse, topicIndex){
	var subtopics = [];
	for (var i = topicIndex+1; i<flatCourse.length; i++){
		item = flatCourse[i];
		if (item.type == "subtopic"){
			subtopics.push(item);
		}
		else{
			i = flatCourse.length;
			//jump out because all the subtopics will be listed after eachother
			//anything not marked subtopic like "topic", "assignment" whatever
			//means we've run out of subtopics
		}
	}
	return subtopics;
}


function writeSubtopicList(subtopics){
	var htmlString = "";
	
	for (var i =0; i<subtopics.length; i++){
		htmlString += '<li><a href="' + subtopics[i].url + '">' + subtopics[i].displayNumber + " " + subtopics[i].title + "</a></li>";
	}
	
	return htmlString;
}

function displayChecksForCompletedAssignments(url){
	$.ajax({	
        url: url
    }).done(function(obj) {
    		var completedItems = obj.completed; //array of ids of completed items
    		if (gShowConsoleMsgs) {	console.log(completedItems.length + " completed items found");}

	    	for (var i=0; i<completedItems.length; i++){
	    		eval("var checkmark = '#check_" + completedItems[i].id + "';");
	    		$(checkmark).removeClass("hidden");
			}
    	}
	);
}

function whatWouldThisDo(unfinishedItem){
	var msg = "This functionality is incomplete.";
	
	switch(unfinishedItem){
		case "chat": 
			msg ="Dexter has written a chat client which would launch in a pop up window that the user could place anywhere."
			break;
		case "search":
			break;
	}
		
	window.alert(msg);
	
}



