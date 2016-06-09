function writePageHeader(topDiv, courseData){
	//check to see that object is not empty, if it is then display minimal header
	
	if (!((topDiv == "")	|| (typeof topDiv === undefined) || (topDiv == null)))
	{
		if ((courseData == "")	|| (typeof courseData === undefined) || (courseData == null)) {
			$(topDiv).prepend($("<div>").html("Missing data for header.")); 
		}
		else 
		{
			//make sure the things that are needed are here, otherwise fill it in with blanks, so the show can go on
			var expectedKeys = ["course_title", "course_number", "course_subject", "semester_display", "faculties", "potatoe"];
			//var expectedFacKeys = ["preferred_name", "email"];
			var groomedCourseData = [];
			
			//load only the keys we need and load it with "unknown" if the key dne
			//TODO: does it matter that there are extra keys?, fix later
			for (var i=0; i< expectedKeys.length; i++)
				groomedCourseData[expectedKeys[i]] = (courseData.hasOwnProperty(expectedKeys[i]))? courseData[expectedKeys[i]] : "unknown";

		
			//now display it
			$(topDiv).append($("<div>").attr("id", "odu_topWrapper").addClass("topWrapper")
				.append($("<header>")
						.append($("<nav>").attr("id", "nav")
							.append($("<ul>")
								.append($("<li>").append($("<a>").attr("href", "http://google.com").attr("id", "userLink").html("XX")))
								.append($("<li>").append($("<a>").attr("href", "https://placekitten.com/").attr("id", "userLink").html("XX")))
							)//end ul	
						)//end nav
						.append($("<div>").addClass("clearFix"))
						.append($("<div>").addClass("oduOnlineLogo"))
						.append($("<a>").attr("href", "\mockup").append($("<h1>").attr("id", "courseTitle").html(groomedCourseData.course_subject + " " + groomedCourseData.course_number + " " + groomedCourseData.course_title)))
						.append($("<h2>").attr("id", "courseInstructorTitle")
								.append($("<span>").attr("id", "semester").html(groomedCourseData.semester_display))
								.append($("<span>").attr("id", "Instructor").html(" Instructor(s)"))
								.append($("<a>").attr("id", "courseInstructor").attr("href", "faculty").html("Jen Daniels"))
						)//end h2
					)//end header
				)//end div
		}
	} 
	else { $("body").append($("<div>").html("Cannot load header, div missing.")); }
}