DEBUG = true;

//used when writing assignments on assignments page, and used when writing assignments 
//in the popup from the calendars
//baseDiv does not include "#"
function writeAssignment(baseDiv, assignmentData){
	if (DEBUG) benchMark("start", "writeAssignment", {"baseDiv": baseDiv, "assignmentData":assignmentData}); 
	
	if (!isEmpty(baseDiv)){
		if ($("#" + baseDiv).length){	
			expectedKeys = ["id", "title", "longTitle", "start", "url", "deliverable", "description"];
				//end optional.  included in api call calendar
				//start = due date, submitVia is optional from all calls because of 7/7/2016 it isnt fully implemented
				//it only gets filled if we know its a blackboard deliverable 
				if (!hasEmptyKeys(assignmentData, expectedKeys)){	
				
					//if (
					$("#" + baseDiv)
						.append($("<li>").attr("id","odu_assignment_" + assignmentData.id).addClass(getAssignmentVisibilityClass(assignmentData.id, ""))
							.append($("<ul>").attr("id","odu_assignmentDetails_" + assignmentData.id).addClass("odu_assignmentDetails")
								.append($("<li>")
									.append($("<i>").attr("id","odu_assignmentCheckmark_" + assignmentData.id).addClass("fa fa-check fa-3x displayHidden"))
									.append($("<h2>").html(assignmentData.title + " " + assignmentData.longTitle)))//end li
								.append($("<li>")
									.append($("<h3>").html("Due-"))
									.append($("<span>").html((moment(assignmentData.start).format('MMMM DD, YYYY h:mm A')))))));

							//optional data
							if (!isEmpty(assignmentData.submitVia)){
								$("#odu_assignmentDetails_" + assignmentData.id)
									.append($("<li>")
										.append($("<h3>").html("Submit Via-"))
										.append($("<span>").html(assignmentData.submitVia)));
							}
							
							
							$("#odu_assignmentDetails_" + assignmentData.id)
								.append($("<li>")
									.append($("<h3>").html("Deliverable-"))
									.append($("<span>").html(assignmentData.deliverable)))
								.append($("<li>")
									.append($("<h3>").html("Description-"))
									.append($("<p>").html(assignmentData.description)));
									
									
									
			}
			else { if (DEBUG) console.log("one or more expected keys in assignment object missing");}
		}
		else { if (DEBUG) console.log("baseDiv " + baseDiv + " not found.");}
	}
	else { if (DEBUG) console.log("baseDiv not passed to writeAssignent is null.");}
	
	if (DEBUG) benchMark("end", "writeAssignment", {"baseDiv": baseDiv, "assignmentData":assignmentData}); 

}

//baseDiv does not include "#"
function writeAssignments(baseDiv, assignmentsData){
	if (DEBUG) benchMark("start", "writeAssignments", {"baseDiv": baseDiv, "assignmentsData":assignmentsData}); 
	
	
	if (!isEmpty(baseDiv)){
		if ($("#" + baseDiv).length){
			//create base list
			$("#" + baseDiv).append($("<section>").attr("id","odu_assignmentsSection")
				.append($("<div>").addClass("odu_assignmentsWrapper wrapper")
					.append($("<ul>").attr("id","odu_assignments"))
				)//end div;
			)//end basediv

			//create list item for each assignment
			for (i=0; i < assignmentsData.length; i++){
				writeAssignment("odu_assignments", assignmentsData[i]);
			}
			
			//filter here.
		}
		else { if (DEBUG) console.log("baseDiv " + baseDiv + " not found.");}
	}
	else { if (DEBUG) console.log("baseDiv passed to writeAssignments is null");}
}

//baseDiv does not include "#"
function loadAssignments(baseDiv, assignmentsUrl){
	//if (DEBUG) benchMark("start", "loadAssignments", {"baseDiv": baseDiv, "id":id, "listType": listType }); 
	
	
	//get data
	$.ajax({
		url: assignmentsUrl,
		type: 'GET',
		dataType: 'json',
		success: function(data) { console.log("got assignments data"); writeAssignments(baseDiv, data); },
		error: function() { $(baseDiv).append("Unable to load assignment(s) right now."); console.log("There was an error loading the assignment(s)."); },
		xhrFields: { withCredentials: true	},
		crossDomain: true
	});	
	
	//if (DEBUG) benchMark("end", "loadAssignments", {"baseDiv": baseDiv, "id":id, "listType": listType }); 

}


function getAssignmentVisibility(assignmentId, visibleData ){
	visibility = ""; //default to show the assignment
	if (DEBUG) benchMark("start", "isVisibleAssignment", {"assignmentId": assignmentId, "visibleData": visibleData});
	
	if (!isEmpty(assignmentId)){
		if (!isEmpty(visibleData)){
			visibility = ($.inArray(assignmentId, visibleData) > 0 ? "" : "displayHidden"); //returns -1 if not in visibility
		} else { if (DEBUG) console.log("visibleData passed to isVisibleAssignment is null");}
	} else { if (DEBUG) console.log("assignment_id passed to isVisibleAssignment is null"); }
	
	return visibility;
}

