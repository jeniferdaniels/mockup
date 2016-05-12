function writeModuleList(pageList){
	var htmlString = "<ul>";
	var currentParent = 0;
	var oldDepth = -1;
	var openLiCount = 1;
	
	for (var i=0; i<pageList.length; i++)
	{
		item= pageList[i];
			
		depth = (item.displayNumber + "").split(".").length;  //needs + "" so it knows its a string. Its js being stupid
		console.log("depth of " + item.displayNumber + " " + item.title + "-->" + depth + " old depth--> " + oldDepth);
		
		
		if (depth - oldDepth == 1){
				htmlString += "<ul>";				
		}
		else if (depth - oldDepth <= -1){
			htmlString += "</li>";
			for (var j=0; j<oldDepth-depth; j++){
				htmlString += "</ul>"
			}
		}
		else 
		{	
			htmlString += "</li>"; 
		}

		
		htmlString +=  "<li>" + item.displayNumber + " " + item.title ;
		oldDepth = depth;
	}

	
	$("#mList").html(htmlString);

}
