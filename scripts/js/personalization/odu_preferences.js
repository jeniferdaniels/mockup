//PREFS can be globally accessible and used as ie: alert(PREFS['calendar']);...alert(PREFS['events']);


function loadPreferences(data){
	PREFS = new Array();
	
	for (i = 0; i < data.length; ++i) {
		PREFS[data[i].name] = data[i].value;						
	}
	
	return PREFS;
}