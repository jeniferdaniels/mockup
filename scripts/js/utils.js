
/**
 * Function : dump()
 * Arguments: The data - array,hash(associative array),object
 *    The level - OPTIONAL
 * Returns  : The textual representation of the array.
 * This function was inspired by the print_r function of PHP.
 * This will accept some data as the argument and return a
 * text that will be a more readable version of the
 * array/hash/object that is given.
 * Docs: http://www.openjs.com/scripts/others/dump_function_php_print_r.php
 */
function dump(arr,level) {
	var dumped_text = "";
	if(!level) level = 0;
	
	//The padding given at the beginning of the line.
	var level_padding = "";
	for(var j=0;j<level+1;j++) level_padding += "    ";
	
	if(typeof(arr) == 'object') { //Array/Hashes/Objects 
		for(var item in arr) {
			var value = arr[item];
			
			if(typeof(value) == 'object') { //If it is an array,
				dumped_text += level_padding + "'" + item + "' ...\n";
				dumped_text += dump(value,level+1);
			} else {
				dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
			}
		}
	} else { //Stings/Chars/Numbers etc.
		dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
	}
	return dumped_text;
}



//changes the key name
//if the key is not there, it returns the object unaltered
function changeKeyName(obj, currentName, newName){
	if (typeof obj != "undefined"){
		if (obj.hasOwnProperty(currentName)){
			var newValue = obj[currentName];
			obj[newName] = newValue;
			delete obj[currentName];
		}
	}
	return obj;
}

//adds key value pair to object
function addKeyValuePair(obj, key, value){
	if (typeof obj != "undefined"){
		obj[key] = value;
	}
	return obj;
}


function hasEmptyKeys(obj, keys){
	var isEmpty = 0;
	
	if (typeof obj != "undefined"){
		for(var i=0; i<keys.length; i++){
			if (!obj.hasOwnProperty(keys[i])){
				isEmpty = 1; 
				//console.log("key " + keys[i] + " NOT found in object");
			}
		} 
	}
	return isEmpty;
}

//http://jquery-howto.blogspot.com/2009/09/get-url-parameters-values-with-jquery.html
//returns array
//to access data getUrlVars()["key"]
//so for http://something?first=John&last=Doe
//using getUrlVara()["first"] would return John
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}


//JMD
function isUndefined(obj){
	return ((obj == "") || (obj === null) || (typeof obj === "undefined"));
}


function benchMark(place, functionName, params){
	d = new Date; 
	console.log("----- " + place + " of " + functionName + " ----- at " + d.getTime());
	
	
	
	/*if (params != "")
	{
		console.log("| VARS/PARAMS:");
		console.log("| " + dump(params));
	}
	else{
		console.log("params empty");
	}
	console.log("---------------------------------");
	*/
}


function isEmpty(theVar){
	return ((theVar == "") || (typeof theVar === undefined) || (theVar == null));
}
