
/*
function loadCourseObject(url) {
	var courseObject;
    $.ajax({
        url: url
    }).done(function(blah) {
		return blah;
	});
};
*/

function populateCourseTitle(url) {
    $.ajax({
        url: url
    }).done(function(data) {
		writeDocumentTitle(data);
		writeCourseNameAndInstructor(data);
			
	});
};

function writeDocumentTitle(obj){
	var strTitle = obj.course.courseNumber + "-" + obj.course.title;
	document.title = strTitle;
}

function writeCourseNameAndInstructor(obj){
	var strTitle = obj.course.courseNumber + "-" + obj.course.title;
	document.getElementById("courseTitle").innerHTML = "<a href='index.php'>" + strTitle + "</a>";
	document.getElementById("courseInstructor").innerHTML = "Instructor <a href='faculty.php'>" + obj.course.instructor.name + "</a>";
}

/*
function writeSubtopicTitle(obj){
		document.getElementById("subtopicTitle").innerHTML = obj.title;	
}


function getSubtopic(url, obj) {
	var id=$.url(url, "?id");
	modules = obj.course.modules;
	for (var i=0; i<modules.length; i++) {
		var topics = modules[i].topics;
		for (var j=0; j<topics.length; j++) {
			var subtopics = topics[j];
			for (var k=0; k<subtopics.length; k++){
				if (subtopics[k].id == id) {
					return subtopics[k];
				}
			}
		}
	}
	alert("subtopic found" + subtopic.title);
}


/*
var data;
$.ajax("json/kitten.json").done(function(newdata) { data=newdata; });
*/