function writeModuleList(pageList, moduleListId, moduleListContainerId){
	
	
	
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
		level = "class='level" + depth + "'";
		
		//add li with text/link
		if ((item.url == "")	|| (typeof item.url === undefined) || (item.url == null))
			htmlString +=  "<li " + level + "><h" + depth + " class='noUrl'>" + item.displayNumber + " " + item.title + "</h" + depth + ">";				
		else
			htmlString +=  "<li " + level + "><a href='\\" + item.url + "'><h" + depth + ">" + item.displayNumber + " " + item.title + "</h" + depth + "></a>";

	}

	htmlString += "</ul>"; //close out id=moduleList
	
	$("#" + moduleListContainerId).html(htmlString);
	$("#" + moduleListContainerId).prepend($("<a>").attr("id", "expandList").html("expand all"));
	$("#" + moduleListContainerId).prepend($("<a>").attr("id", "collapseList").html("collapse all"));
	
}

/*function writeAnotherModuleList(pageList, moduleListId, moduleListContainerId){
	$("#" + moduleListContainerId).append($("<ul>").attr("id", moduleListId);
	
	for (var i=0; i<pageList.length; i++)
	{
		item= pageList[i];
		depth = (item.displayNumber + "").split(".").length;  //needs + "" so it knows its a string. Its js being stupid
		
		if ((item.url == "")	|| (typeof item.url === undefined) || (item.url == null)){
			
			
		}
		
	}
 
}
*/



function formatList(moduleListId) {			
	$("#" + moduleListId).find('li:has(ul)')
	.click( function(event) {
		if (this == event.target) {
			$(this).toggleClass('expanded');
			$(this).children('ul').toggle('medium');
		}
		return false;
	})
	.addClass('collapsed')
	.children('ul').hide();

	$("#" + moduleListId + ' a').unbind('click').click(function() {
		window.location = $(this).attr('href');
		return false;
	});

	//Create the button funtionality
	$('#expandList')
	.unbind('click')
	.click( function() {
		$('.collapsed').addClass('expanded');
		$('.collapsed').children().show();
		
		$('.level2').show();
	});
	
	$('#collapseList')
	.unbind('click')
	.click( function() {
		$('.level2').hide();
		$('.level1').removeClass('expanded');
		
		//$('.expanded').removeClass('expanded');
		//$('.collapsed').removeClass('expanded');
		//$('.parentsList').children().hide('medium');
		//$('.collapsed').children().hide('medium');
	});

	
	$("#" + moduleListId + " ul").addClass("parentsList");
			
	$("#" + moduleListId + ' li').each(function(){
		if ($(this).children("ul").length > 0){
			$(this).addClass("parent");
			$(this).children("ul").addClass("parentsList");
		}
		else
			$(this).addClass("noChildren");
	});

	$("#" + moduleListId + ' .parentsList').hover(function(){$(this).parent().toggleClass("notHighlighted");});
	$("#" + moduleListId + ' .parent').hover(function(){$(this).children('ul').toggleClass("notHighlighted");});
	
	//$("#expandAll").click(function(){ });

	
}