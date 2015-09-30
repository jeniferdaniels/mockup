
	function toggleBox(id){

		expandedId = id + "_expanded";
		collapsedId = id + "_collapsed";
		
		if (document.getElementById(expandedId).style.display != "none"){

			document.getElementById(expandedId).style.display = "none";
			document.getElementById(collapsedId).style.display = "inline-block";
		}
		else{

			document.getElementById(expandedId).style.display = "inline-block";
			document.getElementById(collapsedId).style.display = "none";
		}
}
