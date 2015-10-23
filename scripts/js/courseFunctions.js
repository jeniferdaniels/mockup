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
//Description:  looks into the json obj into the modules array for 
//				a field that matches the id.  This is cool because you can 
//				pass it differnt field names and it will find the module
//Example Use:	myModule = getModuleObject(obj, "title", "Overview and Course Logistic");
//				myModule = getModuleObject(obj, "moduleDisplayOrder", 1); 
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




//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//XXXXXXXXXXXXXXXXXX OBE XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
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

function nextChar(c) {
    //TODO fix this
	//return String.fromCharCode(c.charCodeAt() + 1);
	return "j";
}



function nextModuleSequenceNumber(runningCount, itemType){
	return (itemType != "assignments")? runningCount+1 :nextChar(runningCount) ;
	
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

			for (var m=0; m<oneLevelDeepModuleItems.length; m++){
				sequenceNumber = nextModuleSequenceNumber(m, oneLevelDeepModuleItems[m].type);
				
				console.log(i + "." + sequenceNumber + " " + oneLevelDeepModuleItems[m].title);
				//console.log("  " + m + ". " + oneLevelDeepModuleItems[m].title + " id = " + oneLevelDeepModuleItems[m].id + "displayOrder" + oneLevelDeepModuleItems[m].innerModuleDisplayOrder);
			
			}
		
		
		//console.log("oneLevelDeepModuleItems" + oneLevelDeepModuleItems);
		
	}
	
	//console.log(modules);
}
		
		