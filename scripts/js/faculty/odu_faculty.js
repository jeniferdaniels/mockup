

function getFacName(data){
	var expectedKeys = ["first_name", "last_name"];	
	var optionalKeys = ["preferred_display_name"];
	var facultyObj = {};

	if (typeof eventList != "undefined")
	{
		for (var i=0; i< data.length; i++)
		{
			facultyObj.expectedKey[i] = data.expectedKey[i];
		}	
	}
	
	console.log (facultyObj);
}