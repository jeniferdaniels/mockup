

			$(document).ready(function() {
				
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,basicWeek,agendaList'
					},
					defaultDate: '2015-01-18',
					editable: false,
					eventLimit: true, // allow "more" link when too many events
					events: [
						{
							title: 'Overview and Course Logistics',
							start: '2015-01-10',
							end: '2015-01-15'
						},
						{
							title: 'Choosing a Kitten',
							start: '2015-01-15',
							end: '2015-01-23'
						},
						{
							title: 'Caring for Your Kitten',
							start: '2015-01-23',
							end: '2015-01-30'
						},
						{
							title: 'Legal Requiremens of Owning Kittens',
							start: '2015-01-30',
							end: '2015-02-07'
						},
						{
							title: '0.A - Send Test Email',
							start: '2015-01-12T23:59:00'
						},
						{
							title: '0.B - Module Feedback',
							start: '2015-01-15T23:59:00'
						},
						{
							title: '1.A - Homework #1',
							start: '2015-01-18T23:59:00'
						},
						{
							title: '1.B Discussion Forum #1',
							start: '2015-01-20T23:59:00'
						},
						{
							title: '1.C Quiz',
							start: '2015-01-22T23:59:00'
						},
						{
							title: '1.D Module Feedback',
							start: '2015-01-22T23:59:00'
						},
						{
							title: '2.A Homework #2',
							start: '2015-01-25T23:59:00'
						},
						{
							title: '2.B Discussion Forum #2',
							start: '2015-01-27T23:59:00'
						},
						{
							title: '2.C Homework #3',
							start: '2015-01-29T23:59:00'
						},
						{
							title: '2.D Module Feedback',
							start: '2015-01-30T23:59:00'
						},
						{
							title: '3.A Homework #4',
							start: '2015-02-02T23:59:00'
						},
						{
							title: '3.B Discussion Forum #3',
							start: '2015-02-05T23:59:00'
						},
						{
							title: '3.C Final Exam',
							start: '2015-02-06T23:59:00'
						},
						{
							title: '3.D Module Feedback',
							start: '2015-02-07T23:59:00'
						}
					]
				});
				
			});
