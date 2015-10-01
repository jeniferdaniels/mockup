function toggleBox(id){

		expandedId = id + "_expanded";
		collapsedId = id + "_collapsed";
		
		toggleDisplay(expandedId, collapsedId);
}

function toggleDisplay(visibleItem, hiddenItem)
{
	
	if (document.getElementById(visibleItem).style.display != "none"){
		dontShowItem(visibleItem);
		showItem(hiddenItem);
	}
	else{
		dontShowItem(hiddenItem);
		showItem(visibleItem);
	}
	
}

function dontShowItem(id)
{
		document.getElementById(id).style.display = "none";
}

function showItem(id)
{
		document.getElementById(id).style.display = "inline-block";
}
