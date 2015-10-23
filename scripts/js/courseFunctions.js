//GLOBALS
var gShowConsoleMsgs = true;
	
	
	
function populateCourse(url) {
	$.ajax({	
        url: url
    }).done(function(obj) {
    	writeDocumentTitle(obj);
		writeInstructorInformation(obj);
		
		myModule = getModuleObject(obj, "moduleDisplayOrder", 3)
		//stuff = getDisplayOrder(obj.course.modules[1], "moduleDisplayOrder");
		//writCourseContent(obj);

	});
};





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
//Name: 		getModuleObject
//Input:		obj = json object, whole course data
//				field = field name in the modules array
//				id = some id to look for a match
//Returns:		module object if found, null if not found or errors out
//Description:  looks into the json obj into the modules array for 
//				a field that matches the id.  This is cool because you can 
//				pass it differnt field names and it will find the module
//Example Use:	myModule = getModuleObject(obj, "title", "Overview and Course Logistic");
//				myModule = getModuleObject(obj, "moduleDisplayOrder", 1); 
//*****************************************************************************************
function getModuleObject(obj, field, id){
	var modules = obj.course.modules;
	var selectedModule, moduleFieldValue = null; //returning null is better than undefined

	//check to see if there is a module array
	if (typeof modules != "undefined"){	
		for (var i=0; i< modules.length; i++){

			//check to see if this is even a valid field
			if (modules[i].hasOwnProperty(field)){

				//since we are dynamically getting the field name
				eval("moduleFieldValue = modules[i]." + field);
				console.log("module[" + i + "]." + field + " = " + moduleFieldValue)
					
				if (moduleFieldValue == id){
					if (gShowConsoleMsgs) console.log ("Match for '" + field + "' = '" + id + "' at modules[" + i + "]");	
					selectedModule = modules[i];
					i=modules.length; //jump out of loop so we can return this properly
				} else 	{if (gShowConsoleMsgs) console.log("No match for '" + field + "' = '" + id + "' at modules[" + i + "]");}

			} else {if (gShowConsoleMsgs) console.log("modules[" + i +  "] does not have the property '" + field + "'");}
					
		}//end loop
								
	} else {if (gShowConsoleMsgs) console.log("No 'modules' array");}

	return selectedModule;
}


//*****************************************************************************************
//Name: 		getTopicObject
//Input:		obj = json object, the specific module object
//				field = field name in the topics array
//				id = some id to look for a match
//Returns:		topic object if found, null if not found or errors out
//Description:  looks into the json obj into the topics array under each moduel for 
//				a field that matches the id.  This is cool because you can 
//				pass it differnt field names and it will find the module
//				DO NOT PASS IN "parent" as the field to id on because there can be
//				several topics in the module and therefore they have the same parent
//Example Use:	myTopic = getTopicObject(obj.course.modules[1], "title", "Entertaining");
//				myTopic = getTopicObject(myModule, "moduleDisplayOrder", 1); 
//*****************************************************************************************
function getTopicObject(obj, field, id){
	var topics = obj.topics;
	var selectedTopic, topicFieldValue = null; //returning null is better than undefined

	//check to see if there is a module array
	if (typeof topics != "undefined"){
		
		for (var i=0; i< topics.length; i++){

				//check to see if this is even a valid field
				if (topics[i].hasOwnProperty(field)){
					
				//since we are dynamically getting the field name
				eval("topicFieldValue = topics[i]." + field);
				console.log("topics[" + i + "]." + field + " = " + topicFieldValue)
				
				if (moduleFieldValue == id){
					if (gShowConsoleMsgs) console.log ("Match for '" + field + "' = '" + id + "' at topics[" + i + "]");

					selectedTopic = topics[i];
					i=topics.length; //jump out of loop so we can return this properly
				} else 	{if (gShowConsoleMsgs) console.log("No match for '" + field + "' = '" + id + "' at topics[" + i + "]");}
		
			} else {if (gShowConsoleMsgs) console.log("topics[" + i +  "] does not have the property '" + field + "'");}
		}//end loop
								
	} else {if (gShowConsoleMsgs) console.log("No 'topics' array");}

	return selectedTopic;
}


//*****************************************************************************************
//Name: 		getDisplayOrder
//Input:		obj = json object, depending on what you pass to it it may be the module,
//				topic, assignment etc
//				field, depending on the object, the name of the display order field is different
//				for modules it is "moduleDisplayOrder" for assignments and topics etc it is
//				"innerModuleDisplayOrder" etc. See JSON file for specifics
//Returns:		display order int, or null if not found
//Description:	takes an individual single object, looks for the display order property (passed
//				in as 'field' because in the different items it can be named something different
//				returns the integer if found, else returns null
//				does not take arrays
//*****************************************************************************************
function getDisplayOrder(obj, field)
{
	var itemDisplayOrder = null;

	//check to see if object is legit
	if (typeof obj != "undefined"){

		if (obj.hasOwnProperty(field)){
				eval("itemDisplayOrder = obj." + field);
		} else {if (gShowConsoleMsgs) console.log("The object does not have the property '" + field + "'");}
	} else {if (gShowConsoleMsgs) console.log("Object undefined.");}

	return itemDisplayOrder;
}

//********************************************************************
//Writers
//********************************************************************
function writeDocumentTitle(obj){
	var strTitle = obj.course.courseNumber + "-" + obj.course.title;
	document.title = strTitle;
}


function writeInstructorInformation(obj)
{
	instructor = getInstructorObject(obj);
	document.getElementById("instructorName").innerHTML = instructor.name;
	document.getElementById("instructorPhone").innerHTML = instructor.phone;
	document.getElementById("instructorEmail").innerHTML = instructor.email;	
}



function writCourseContent(obj){	
	
	var moduleNumericalSequence = getProperDisplayOrder(obj.course.modules, "moduleDisplayOrder");	
	document.getElementById("modules").innerHTML += "<ul>";
	
	for (var i=0; i<moduleNumericalSequence.length; i++)
	{
		theModule = getModuleObject(obj, "moduleDisplayOrder", moduleNumericalSequence[i])
		document.getElementById("modules").innerHTML += "<li>" + theModule.title + "</li>";		
	}

	document.getElementById("modules").innerHTML += "</ul>";
	
}
		
		