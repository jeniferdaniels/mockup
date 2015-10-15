function recurringCalendar() {

jQuery('#calendar').fullCalendar({
	dayNamesShort:['Su', 'M', 'T', 'W', 'Th', 'F', 'Sa'],
	editable: false,
	year: '2015',
	month: 1 - 1,
	header: {
		left: 'prev',
		center: 'title',
		right: 'next'
	},
	defaultDate: '2015-01-18',
	events: 
	[
		{
			title: 'Overview and Course Logistics',
			start: '2015-01-10',
			end: '2015-01-15',
			color: "#EEEEEE",
			textColor: "black"
		},
		{
			title: 'Choosing a Kitten',
			start: '2015-01-15',
			end: '2015-01-23',
			color: "#EEEEEE",
			textColor: "black"
		},
		{
			title: 'Caring for Your Kitten',
			start: '2015-01-23',
			end: '2015-01-30',
			color: "#EEEEEE",
			textColor: "black"
		},
		{
			title: 'Legal Requiremens of Owning Kittens',
			start: '2015-01-30',
			end: '2015-02-07',
			color: "#EEEEEE",
			textColor: "black"
		},
		{
			title: '0.A',
			//title: '0.A - Send Test Email',
			//start: '2015-01-12T23:59:00',
			start: '2015-01-12',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '0.B',
			//title: '0.B - Module Feedback',
			//start: '2015-01-15T23:59:00',
			start: '2015-01-15',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '1.A',
			//title: '1.A - Homework #1',
			//start: '2015-01-18T23:59:00',
			start: '2015-01-18',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '1.B',
			//title: '1.B Discussion Forum #1',
			//start: '2015-01-20T23:59:00',
			start: '2015-01-20',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '1.C',
			//title: '1.C Quiz',
			//start: '2015-01-22T23:59:00',
			start: '2015-01-22',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '1.D',
			//title: '1.D Module Feedback',
			//start: '2015-01-22T23:59:00',
			start: '2015-01-22',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '2.A',
			//title: '2.A Homework #2',
			//start: '2015-01-25T23:59:00',
			start: '2015-01-25',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '2.B',
			//title: '2.B Discussion Forum #2',
			//start: '2015-01-27T23:59:00',
			start: '2015-01-27',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '2.C',
			//title: '2.C Homework #3',
			//start: '2015-01-29T23:59:00',
			start: '2015-01-29',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '2.D',
			//title: '2.D Module Feedback',
			//start: '2015-01-30T23:59:00',
			start: '2015-01-30',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '3.A',
			//title: '3.A Homework #4',
			//start: '2015-02-02T23:59:00',
			start: '2015-02-02',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '3.B',
			//title: '3.B Discussion Forum #3',
			//start: '2015-02-05T23:59:00',
			start: '2015-02-05',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '3.C',
			//title: '3.C Final Exam',
			//start: '2015-02-06T23:59:00',
			start: '2015-02-06',
			color: "rgba(68,136,246,1)"
		},
		{
			title: '3.D',
			//title: '3.D Module Feedback',
			//start: '2015-02-07T23:59:00',
			start: '2015-02-07',
			color: "rgba(68,136,246,1)"
		}
	]
  });
}