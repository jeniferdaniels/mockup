<!DOCTYPE HTML>
<head>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript">
if (typeof jQuery == 'undefined') {
    document.write(unescape("%3Cscript src='/etc/designs/odu/clientlibs/libs/jquery-1.8.1.min.js' type='text/javascript'%3E%3C/script%3E"));
}
</script>
<script type="text/javascript" src="https://www.odu.edu/etc/designs/odu/clientlibs.js"></script>
<link rel="stylesheet" href="https://www.odu.edu/etc/designs/odu/clientlibs.css" type="text/css">
<link href="https://www.odu.edu/etc/designs/odu.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color: white">
<header>
<style>
    .cq-eventcomponent-editbtn-wrapper {
        display: none;
    }
    
    .cq-wcm-edit .cq-eventcomponent-editbtn-wrapper {
        display: block;
    }
    
    .cq-eventcomponent-editbtn-wrapper {
        float: right;
        margin: 5px;
    }
    
    .cq-eventcomponent-editbtn-wrapper td {
        border: none;
    }    
</style>


<div class="grid-3 alpha">
<script type="text/javascript">
    if (typeof jQuery.fn.fullCalendar == 'undefined') {

        document.write(unescape("%3Cscript src='https://www.odu.edu/etc/designs/odu/clientlibs/libs/fullcalendar/fullcalendar.js' type='text/javascript'%3E%3C/script%3E"));

    }
</script>
<script type="text/javascript">

    function recurringCalendar() {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        jQuery('#recurringCalendar').fullCalendar({
            dayNamesShort:['Su', 'M', 'T', 'W', 'Th', 'F', 'Sa'],
            editable: false,
            year: '2015',
            month: 1 - 1,
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events: [
				{
					title: '',
					start: '2015-01-18', 
					color: "#4488F6",
					url: '../../cat101/whyGetAKitten.php'
				},
				{
					title: 'Assignment Due',
					start: '2015-01-19',
					color: "#4488F6",
					url: '#'
				},
				{
					title: '',
					start: '2015-01-20',
					color: "#4488F6",
					url: '#'
				},
				{
					title: '',
					start: '2015-01-22',
					color: "#4488F6",
					url: '../../cat101/whyBuy.php'
				},
				{
					title: '',
					start: '2015-01-23',
					color: "#4488F6",
					url: 'cat101/whyBuy.php'
				}
			]
				//[ {title: 'R',start: new Date(2015, 10 - 1, 26),color: "green",url: '/univevents/calendar/2015/10/lifelong_learning_ar'} ]
            
        });

    }
   
    $(document).ready(function() {
        //setTimeout(recurringCalendar, 500);
        recurringCalendar();
          
        // fix for recurringCalender items not loading in their proper position.
//        fancyboxRules();
//       $.when($.fancybox.isOpened = true).then(fancyboxRules());
//        $($.fancybox.isOpened).promise().done(fancyboxRules());
    });
     
    
</script>
<style type="text/css">
    
    .fc table {
        margin-bottom: 0px;
    }

    table.fc-header td {
        border: none;
    }

    .fc-view table {
        background-color: white;
        font-size: 12px;
    }

    .fc-button-content {
        font-size: 10px;
        height: 16px;
        line-height: 16px;
        padding: 0px;
    }

    .fc-event-inner {
        height: 10px;
    }

    .fc-event-time {
        display: none;
    }

    .fc-event-title {
        display: none;
    }

    .fc-header .fc-button {
        margin-bottom: 7px;
    }

    .fc-header-title h2 {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 7px;
        padding: 0px;
    }
    
	.fc-button-next, .fc-button-prev{
		border: none;
		background: transparent;
		border-radius: 0;
		box-shadow: none;
	}
</style>
<div id="recurringCalendar"></div>
</div>
            
</body>
</html>