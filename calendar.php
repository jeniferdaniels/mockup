<?php ?>
<!doctype html>
<head>

  <title>Full Calendar</title>



<style type="text/css">
    .fc-agendaList {
      list-style: none;
      margin: 0;
      padding: 0;
      border: 1px solid #E0E0E0;
      border-bottom: none;
    }
    .fc-agendaList-dayHeader {
      background-color: #F0F0F0;
      border-bottom: 1px solid #E0E0E0;
      padding: 8px;
      overflow: hidden;
    }
    .fc-agendaList-day,
    .fc-agendaList-date {
      font-size: 14px;
      line-height: 20px;
      display: block;
    }
    .fc-agendaList-day {
      font-weight: bold;
      color: #404040;
      float: left;
    }
    .fc-agendaList-date {
      color: #707070;
      float: right;
    }
    .fc-agendaList-item {
      border-bottom: 1px solid #E0E0E0;
    }
    .fc-agendaList-event {
      display: block;
      border-left: 4px solid #FFF;
      padding: 8px;
      margin: 1px;
    }
    /* Event Link */
    a.fc-agendaList-event {
      text-decoration: none;
    }
    a.fc-agendaList-event:hover {
      background-color: #F8F8F8;
    }
    a.fc-agendaList-event .fc-event-title {
      color: #4B66A7;
      text-decoration: underline;
    }
    .fc-apex-events-gcal {
      border-color: #5284C1;
    }
    .fc-apex-events-default01 {
      border-color: #C11E21;
    }
    .fc-apex-events-default02 {
      border-color: #C11E21;
    }
    .fc-apex-events-default03 {
      border-color: #C11E21;
    }
   .fc-apex-events-default04 {
      border-color: #C11E21;
    }
   .fc-apex-events-gcal {
      border-color: #C11E21;
    }
    .fc-event-time {
      display: inline-block;
      vertical-align: top;
      width: 15%;
      margin-right: 8px;
    }
    .fc-event-start-time,
    .fc-event-end-time {
      display: block;
    }
    .fc-event-start-time,
    .fc-event-all-day {
      font-size: 14px;
      line-height: 20px;
      color: #404040;
    }
    .fc-event-end-time {
      font-size: 12px;
      line-height: 16px;
      color: #A0A0A0;
    }
    .fc-agendaList-eventDetails {
      display: inline-block;
      vertical-align: top;
    }
    .fc-eventlist-title {
      font-weight: bold;
      font-size: 14px;
      line-height: 20px;
      color: #404040;
    }
    .fc-eventlist-desc {
      font-size: 12px;
      line-height: 16px;
      color: #707070;
    }
</style>




<style> html {visibility:hidden;} </style>
<script type="text/javascript">
apex.security.framebreaker("D");
</script>





<link rel="stylesheet" href="calendar/agendalist.css" type="text/css">
<link rel="stylesheet" href="calendar/fullcalendar.css" type="text/css">
<link rel="stylesheet" href="calendar/fullcalendar.print.css" type="text/css" media="print">
<script src="calendar/moment.min.js" type="text/javascript"></script>
<script src="calendar/fullcalendarlist.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay,agendaList'
			},
			editable: true,
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1),
                                        className: "greenEvent"
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/'
				}
			]
		});
		
	});

</script>
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="no-cache" /><meta http-equiv="Expires" content="-1" /><meta http-equiv="Cache-Control" content="no-cache" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  <link rel="stylesheet" href="/i/themes/theme_26/css/4_2.css?v=5.0.1.00.06">
  <script src="/i/themes/theme_26/js/4_2.js?v=5.0.1.00.06"></script>
</head>
<body >
  <!--[if lte IE 6]><div id="outdated-browser">You are using an outdated web browser. For a list of supported browsers, please reference the Oracle Application Express Installation Guide.</div><![endif]-->
  <form action="wwv_flow.accept" method="post" name="wwv_flow" id="wwvFlowForm" novalidate >
<input type="hidden" name="p_flow_id" value="28419" id="pFlowId" /><input type="hidden" name="p_flow_step_id" value="1" id="pFlowStepId" /><input type="hidden" name="p_instance" value="100445540378709" id="pInstance" /><input type="hidden" name="p_page_submission_id" value="7739786778250" id="pPageSubmissionId" /><input type="hidden" name="p_request" value="" id="pRequest" />
  <div id="uBodyContainer"><header id="uHeader">
  
  <hgroup>
    <a href="f?p=28419:1:100445540378709" id="uLogo"><span >FullCalendar - List View</span></a>
    <div class="userBlock">
      <img src="/i/f_spacer.gif" class="navIcon user" alt="">
      <span>APEX_PUBLIC_USER</span>
      <a href="apex_authentication.logout&#x3F;p_app_id&#x3D;28419&#x26;p_session_id&#x3D;100445540378709">Logout</a>
    </div>
  </hgroup>
  <nav>
    <ul>
      <li><a href="javascript:apex.submit('T_FULL_CALENDAR');" class="active">Full&nbsp;Calendar</a></li>
    </ul>
    
  </nav>
  
</header>
<div id="uBreadcrumbs"  class="">
  <ul></ul>
  <div class="uBreadcrumbsBG">
    <div class="uLeft"></div>
    <div class="uRight"></div>
  </div>
</div>

<div id="uOneCol">
  
  <section class="uRegion  clearfix" id="R23293887307708014939" >
  <div class="uRegionHeading">
    <h1>Full Calendar Plugin with List View </h1>
    <span class="uButtonContainer">
      
    </span>
  </div>
  <div class="uRegionContent clearfix">
    <div id='calendar'></div>
  </div>
</section>
  
</div><footer id="uFooter">
  <div class="uFooterContent">
    <div id="customize"></div>
    
    <a href="f?p=28419:1::SET_SESSION_SCREEN_READER_ON::::">Set Screen Reader Mode On</a>
    <span class="uFooterVersion">
      release 1.0
    </span>
  </div>
  <div class="uFooterBG">
    <div class="uLeft"></div>
    <div class="uRight"></div>
  </div>
</footer>
</div>
<input type="hidden" name="p_md5_checksum" value=""  /><input type="hidden" name="p_page_checksum" value="grKvldqOPyruOszTa8g2P5EidvWrJLsMk_VFzsYg9WvBP9pdp7YtaN8Dr6mmwhmrdQA5uQXNG2kShBe8upQWrg" id="pPageChecksum" /></form>


<script type="text/javascript">
</script>

</body>
</html>