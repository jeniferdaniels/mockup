function writeModuleList(pageList, moduleListId, menuDiv){
	var htmlString = "<ul id='" + moduleListId + "'>";
	var currentParent = 0;
	var oldDepth = -1;
	var openLiCount = 1;
	
	for (var i=0; i<pageList.length; i++)
	{
		item= pageList[i];
			
		depth = (item.displayNumber + "").split(".").length;  //needs + "" so it knows its a string. Its js being stupid
		//console.log("depth of " + item.displayNumber + " " + item.title + "-->" + depth + " old depth--> " + oldDepth);
		
		
		if (depth - oldDepth == 1)
				htmlString += "<ul>";	
		else if (depth - oldDepth <= -1){
			htmlString += "</li>";
			for (var j=0; j<oldDepth-depth; j++){
				htmlString += "</ul>";
			}
		}
		else 
			htmlString += "</li>"; 
		
		oldDepth = depth;
		if (depth > 5) depth = 5; //only go down to h5 in size
		
		//add li with text/link
		if ((item.url == "")	|| (typeof item.url === undefined) || (item.url == null))
			htmlString +=  "<li><h" + depth + " class='noUrl'>" + item.displayNumber + " " + item.title + "</h" + depth + ">";				
		else
			htmlString +=  "<li><a href='" + item.url + "'><h" + depth + ">" + item.displayNumber + " " + item.title + "</h" + depth + "></a>";

	}

	htmlString += "</ul>"; //close out id=moduleList
	
	$("#" + menuDiv).html(htmlString);
}




function formatList() {			
	$('#moduleList').find('li:has(ul)')
	.click( function(event) {
		if (this == event.target) {
			$(this).toggleClass('expanded');
			$(this).children('ul').toggle('medium');
		}
		return false;
	})
	.addClass('collapsed')
	.children('ul').hide();

	$('#moduleList a').unbind('click').click(function() {
		window.location = $(this).attr('href');
		return false;
	});

	//Create the button funtionality
	$('#expandList')
	.unbind('click')
	.click( function() {
		$('.collapsed').addClass('expanded');
		$('.collapsed').children().show('medium');
	});
	
	$('#collapseList')
	.unbind('click')
	.click( function() {
		$('.collapsed').removeClass('expanded');
		$('.collapsed').children().hide('medium');
	});

	
	$("ul").addClass("parentsList");
			
	$("#moduleList li").each(function(){
		if ($(this).children("ul").length > 0){
			$(this).addClass("parent");
			$(this).children("ul").addClass("parentsList");
		}
		else
			$(this).addClass("noChildren");
	});

	$('#moduleList .parentsList').hover(function(){$(this).parent().toggleClass("notHighlighted");});
	$('#moduleList .parent').hover(function(){$(this).children('ul').toggleClass("notHighlighted");});
	

	
}