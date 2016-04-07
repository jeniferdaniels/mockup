//*****************************************************************************************
//Function Name: getSystemNotification(msg)
//Input: 		 msg json object
//Output:		 PNotify object
//Purpose:		 creates a system message notification with some predetermined values
//*****************************************************************************************
function getSystemNotification(msg) {
	msg.title = "PLE System Notification";
	msg.type = "notify";
	return getNotification(msg);
}


//*****************************************************************************************
//Function Name: getNotification(msg)
//Input: 		 msg json object
//Output:		 PNotify object
//Purpose:		 creates a notification with some predetermined values
//*****************************************************************************************
function getNotification(msg){
	var notice = new PNotify ({
		title: msg.title,
		text: msg.text,
		buttons: {sticker: false, closer: true},
		closer_hover: false,
		type: msg.type,
		addclass: msg.addClass,
		width: "500px",
		remove: true,
		delay: 8000,
		hide: true
	});
		
	notice.get().click(function() {	notice.remove(); });
	
	return notice;
}

