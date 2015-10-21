function populateCourse(url) {
	$.ajax({	
        url: url
    }).done(function(obj) {
    	writeDocumentTitle(obj);
		writeInstructorInformation(obj);
		getProperDisplayOrder(obj.course.modules, "moduleDisplayOrder");
		writCourseContent(obj);
    	
    	
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

		//check to see if this is even a valid field
		if (modules[0].hasOwnProperty(field)){

			for (var i=0; i< modules.length; i++){

				//since we are dynamically getting the field name
				eval("moduleFieldValue = modules[i]." + field);
				console.log("module[" + i + "]." + field + " = " + moduleFieldValue)
				
				if (moduleFieldValue == id){
					console.log ("Match for '" + field + "' = '" + id + "' at modules[" + i + "]");

					selectedModule = modules[i];
					i=modules.length; //jump out of loop so we can return this properly
				} else 	console.log("No match for '" + field + "' = '" + id + "' at modules[" + i + "]");
			}//end loop
								
		} else console.log("The first module in the array does not have the property '" + field + "'");

	} else console.log("No 'modules' array");

	return selectedModule;
}

//*****************************************************************************************
//Name: 		getIdWithDisplayOrder
//Input:		obj = json object, specifically the one that needs to get the ordering info
//
//*****************************************************************************************
function getIdAndDisplayOrder(obj, field)
{
	var displayOrderValues = [];
	var itemDisplayOrderValue = null;

	//check to see if object is legit
	if (typeof obj != "undefined"){

		if (obj[0].hasOwnProperty(field)){

			for (var i=0; i< obj.length; i++){

				//since we are dynamically getting the field name and the object
				eval("itemDisplayOrderValue = obj[i]." + field);
				console.log ("itemDisplayOrderValue = obj[i]." + field);

				displayOrderValues.push(itemDisplayOrderValue);
				
			}//end loop
								
		} else console.log("The first object in the array does not have the property '" + field + "'");

	} else console.log("Object undefined.");

	//raw data
	//console.log("Raw data values " + displayOrderValues);
	
	//order them 
	//displayOrderValues.sort(function(a, b){return a-b});
	//console.log("Items in numerical order " + displayOrderValues);
	
	//TODO
	//add ids to the display order
	
	return displayOrderValues;
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
		
		