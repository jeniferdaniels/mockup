DEBUG = true;

//TODO: JMD make this robust, currently there is not error/format checking.
//baseDiv does not include "#"
function writeAssignment(baseDiv, assignmentData){
	if (DEBUG) benchMark("start", "writeAssignment", {"baseDiv": baseDiv, "assignmentData":assignmentData}); 
	
	if (!isEmpty(baseDiv)){
		if ($("#" + baseDiv).length){
			$("#" + baseDiv)
				.append($("<li>").attr("id","odu_assignment_" + assignmentData.id)
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
							.append($("<span>").html(assignmentData.deliverable))
						.append($("<li>")
							.append($("<h3>").html("Description-"))
							.append($("<p>").html(assignmentData.description))));//end li 1
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

