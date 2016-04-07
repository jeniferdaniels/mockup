function processNotifications(notifications){
	if (!((notifications == "") || (notifications === null) || (typeof notifications === "undefined")))
	{
		for (var i=0; i<notifications.length; i++){
			var notification = "";
			notification = notifications[i];

			//this comes in as "message", needs to be "text" for pNotify
			notification.text = notification.message; 
			
			if ((notification.title == "") || (typeof notification.title === "undefined")){
				if (notification.crn == "0") notification.title = "PLE System Notification";
				else notification.title = "Announcement";
			}
						
			writeNotification(notification);
			
		}
	}
}


//*****************************************************************************************
//Function Name: writeNotification()
//Input: 		 json object
//Output:		 nothing
//Purpose:		 creates a notification with some predetermined values
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


//TODO: move this to a global library
function dumpObject(obj){
	for (var key in obj){
		if (obj.hasOwnProperty(key))
			console.log(key + "->" + obj[key]);
	}
}
