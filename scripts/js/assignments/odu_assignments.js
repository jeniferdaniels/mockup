DEBUG = true;

//TODO: JMD make this robust, currently there is not error/format checking.
function writeAssignment(baseDiv, assignmentData){
	if (DEBUG) benchMark("start", "writeAssignment", {"baseDiv": baseDiv, "assignmentData":assignmentData}); 

	
	
		$(baseDiv)
			.append($("<li>").attr("id","odu_assignment_" + assignmentData.id)
				.append($("<ul>").attr("id","odu_assignmentDetails_" + assignmentData.id).addClass("odu_assignmentDetails")
					.append($("<li>")
						.append($("<h2>").html(assignmentData.title + " " + assignmentData.longTitle)))//end li
					.append($("<li>")
						.append($("<h3>").html("Due"))
						.append($("<span>").html(assignmentData.dueDate))))); //TODO: format with moment

				if (!((assignmentData.submitVia == "")	|| (typeof assignmentData.submitVia === undefined) || (assignmentData.submitVia == null))){
					$("#odu_assignmentDetails_" + assignmentData.id)
						.append($("<li>")
							.append($("<h3>").html("Submit Via"))
							.append($("<span>").html(assignmentData.submitVia)));
				}
				
				$("#odu_assignmentDetails_" + assignmentData.id)
					.append($("<li>")
						.append($("<h3>").html("Deliverable"))
						.append($("<span>").html(assignmentData.deliverable))
					.append($("<li>")
						.append($("<h3>").html("Description"))
						.append($("<p>").html(assignmentData.description))));//end li 1
	
	
	if (DEBUG) benchMark("end", "writeAssignment", {"baseDiv": baseDiv, "assignmentData":assignmentData}); 

}

function writeAssignments(baseDiv, assignmentsData){

		//if (DEBUG) benchMark("start", "writeAssignments", {"baseDiv": baseDiv, "assignmentsData":assignmentsData}); 

		//create base list
		$(baseDiv).append($("<section>").attr("id","odu_assignmentsSection")
			.append($("<div>").addClass("odu_assignmentsWrapper wrapper")
				.append($("<ul>").attr("id","odu_assignments"))
			)//end div;
		)//end basediv
	
		//create list item for each assignment
		for (i=0; i < assignmentsData.assignments.length; i++){
			writeAssignment("#odu_assignments", assignmentsData.assignments[i]);
		}
		
		//filter here.
	
	
	//if (DEBUG) benchMark("end", "writeAssignments", {"baseDiv": baseDiv, "assignmentData":assignmentsData}); 

}


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

