//GLOBALS
var gShowConsoleMsgs = true;
	
	
	
function populateCourse(url) {
	$.ajax({	
        url: url
    }).done(function(obj) {
    	writeDocumentTitle(obj);
		writeInstructorInformation(obj);
		
		writeCourseContent(obj);

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

				console.log(objArray[i]);
				//check to see if this is even a valid field
				if (objArray[i].hasOwnProperty(field)){
	
					//since we are dynamically getting the field name
					eval("itemFieldValue = objArray[i]." + field);
					console.log("object[" + i + "]." + field + " = " + itemFieldValue)
						
					if (itemFieldValue == id){
							if (gShowConsoleMsgs) console.log ("Match for '" + field + "' = '" + id + "' at object[" + i + "]");	
							
							selectedItem = objArray[i];
							matchCount++;
							//normally I would use i=objArray.length; to jump out of loop so we can return this properly
							//but since something like "parent" can be passed in where more than one item can have 
							//the same parent id, I'll continue throught the object to see if there are others that match
							//if there are, then I'll error out after it goes through the loop
							
					} else 	{if (gShowConsoleMsgs) console.log("No match for '" + field + "' = '" + id + "' at object[" + i + "]");}
				} else {if (gShowConsoleMsgs) console.log("object[" + i +  "] does not have the property '" + field + "'");}
					
			}//end loop
	} else {if (gShowConsoleMsgs) console.log("object is undefined");}
	
	if (matchCount < 1)
	{
		if(gShowConsoleMsgs) console.log("More than one object found with property '" + field + "' = '" + id + "'. Returning null")
		selectedItem = null;
	}
	
	return selectedItem;
}



function nextChar(c) {
	//63 is start of capital letters,
	//64 will give next char
	return (String.fromCharCode(c+64));
}



function nextModuleSequenceNumber(runningCount, itemType){
	return (itemType != "assignments")? runningCount+1 : nextChar(runningCount) ;
	
}


//*****************************************************************************************************
//Sorts by field
//*****************************************************************************************************
var sort_by = function(field, reverse){

	   var key = function(x) {return x[field]};

	   reverse = !reverse ? 1 : -1;

	   return function (a, b) {
	       return a = key(a), b = key(b), reverse * ((a > b) - (b > a));
	     } 
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



function writeCourseContent(obj){	
	var html = "";
	
	//put in display order
	var modules = obj.course.modules.sort(sort_by("moduleDisplayOrder", false));
	
	//LOOP THROUGH EACH MODULE IN DISPLAY ORDER
	for (var i=0; i<modules.length; i++){
		var theModule = modules[i];
		console.log(i + ". " + theModule.title);

		moduleItems = theModule.items;
		oneLevelDeepModuleItems = [];

		//GET THE ITEMS IN THE MODULE, IF THEY HAVE ITEMS THEMSELVES, GET THOSE
		//FLATTEN THIS ARRAY
		for (var j=0; j<moduleItems.length; j++){

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

		html += "<ul> Module " + i;
		//build module string to write to screen
		for (var n=0; n<oneLevelDeepModuleItems.length; n++){
			sequenceNumber = nextModuleSequenceNumber(n, oneLevelDeepModuleItems[n].type);
			
			if (gShowConsoleMsgs) { console.log(i + "." + sequenceNumber + " " + oneLevelDeepModuleItems[n].title + "type is" + oneLevelDeepModuleItems[n].type); }
			
			html += "<li><a href='" + oneLevelDeepModuleItems[n].url + "'>" + i + "." + sequenceNumber + " " + oneLevelDeepModuleItems[n].title + "</a>";
			if (oneLevelDeepModuleItems[n].type == "topics"){
				html += "<ul>";
				//get the subtopics on display order
				var subTopics = oneLevelDeepModuleItems[n].subtopics.sort(sort_by("subtopicDisplayOrder", false));
					for (var p=0; p<subTopics.length; p++){
						if (gShowConsoleMsgs) { console.log(i + "." + sequenceNumber + "." + p + " " + subTopics[p].title)}
						html += "<li><a href='" + subTopics[p].url + "'>" + i + "." + sequenceNumber + "." + p + " " + subTopics[p].title + "</a></li>";
					}
						
				
				html += "</ul>"; 
			}
			html += "</li>";	
		}
		html += "</ul>";
		
		document.getElementById("courseContent").innerHTML = html;
	}
}
		
		