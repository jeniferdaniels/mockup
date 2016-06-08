function writePageHeader(topDiv){
	if (!((topDiv == "")	|| (typeof topDiv === undefined) || (topDiv == null)))
	{
		$(topDiv).append
		(
			$("<div>").attr("id", "odu_topWrapper").addClass("topWrapper").append
			(
				$("<header>").append
				(
					$("<nav>").attr("id", "nav").append
					(
						$("<ul>").append
						(
							$("<li>").append
							(
								$("<a>").attr("href", "http://google.com").attr("id", "userLink").html("XX")
							)//end li
						).append
						(
							$("<li>").append
							(
								$("<a>").attr("href", "https://placekitten.com/").attr("id", "userLink").html("XX")
							)//end li
						)//end ul
					)//end nav	
				).append
				(
					$("<div>").addClass("clearFix")
				).append
				(
					$("<div>").addClass("oduOnlineLogo")
				).append
				(
					$("<a>").attr("href", "\mockup").append
					(
						$("<h1>").attr("id", "courseTitle").html("CAT 101 Introduction to Kittens")
						
					)
				)
				.append
				(
					$("<h2>").attr("id", "courseInstructorTitle").append
					(	
						(
							$("<span>").attr("id", "semester").html("Fall 2017")
						)
						.append
						(
							$("<span>").attr("id", "Instructor").html(" Instructor(s)")
						)
						.append
						(
							$("<a>").attr("id", "courseInstructor").attr("href", "faculty").html("Jen Daniels")
						)
						
					)
				)
			)//end top wrapper
		)//end top
			
		
		
		
		str = "<div class='topWrapper'>";
		str += "<header>";
		str += "<nav id='nav'>";
		str += "<ul>";
		str += "<li><a href='#' id='userLink'><mark>XX</mark></a></li>";
		str += "<li><a href='#' id='searchLink'><mark>XX</mark></a></li>";
		str += "</ul>";
		str += "</nav>";
		str += "<div style='clear:both'></div>";
		str += "<div class='oduOnlineLogo'></div>";
		str += "<a href='/mockup'><h1 id='courseTitle'>title</h1></a>";
		str += "<h2 id='courseInstructor'><span>Fall 2015</span>Instructors - <a href='/mockup/faculty.php?midas=jdani001'><mark>INSTRUCTOR</mark></a></h2>";
		str += "</header>";
		str += "</div>";
	}
	else{
		var str="nope";
		
	}
	
	
	//$(topDiv).html(str);	
}