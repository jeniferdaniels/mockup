
//needs hasEmptyKeys from utils.js
//TODO: investigate http://requirejs.org/


function processNotifications(notifications){
	expectedKeys = ["announcement_id", "message", "start_date", "finish_date", "announcement_type_id", "crn", "type"];
		
	if (!((notifications == "") || (notifications === null) || (typeof notifications === "undefined")))
	{
		for (var i=0; i<notifications.length; i++){
			var notification = "";	//clear out residule
			notification = notifications[i];

			//if it missing any of the mandatory keys noted above, then skip the announcement_id
			//this checks to ensure a properly formatted string/json object is passed
			if (!hasEmptyKeys(notification, expectedKeys))
			{
				//this comes in as "message", needs to be "text" for pNotify
				notification.text = notification.message; 
				
				//default the message to something since title is not required as a key
				if ((notification.title == "") || (typeof notification.title === "undefined")){
					notification.title = "PLE System Notification";
				}
							
				writeNotification(notification);
			}
		}
	}
}


//*****************************************************************************************
//Function Name: writeNotification()
//Input: 		 json object
//Output:		 nothing
//Purpose:		 creates a notification with some predetermined values
//				 notification types expected by pNotify are: notice, info, success, error
//*****************************************************************************************
function writeNotification(notification){
	var notice = 
		new PNotify ({	
			title: notification.title,
			text: notification.text,
			buttons: {sticker: false, closer: true},
			closer_hover: false,
			type: notification.type,
			addclass: notification.addclass,
			width: "500px",
			remove: true,
			delay: 600000, //10 min
			hide: true,
			type: notification.type
	});
	
	notice.get().click(function() {	notice.remove(); markAsRead(notification.announcement_id);});
	console.log("notice processed" + notification.title);
	return;
}

//*****************************************************************************************
//Function Name: markAsRead()
//Input: 		 id - int, notification identification
//Output:		 none
//Purpose:		 calls functions to write message as seen by user into db
//*****************************************************************************************

function markAsRead(id){
	console.log ("add code here to write to db saying this user clicked message " + id + "at " + moment().format('YYYY-MM-DD'));		
}


