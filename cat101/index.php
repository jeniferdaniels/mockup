<?php include_once '../scripts/mockupFunctions.php' ?>
<?php include_once '../scripts/globalVariables.php' ?>
<?php 
	$isExpandedList = (isset($_GET['isExpanded'])? $_GET['isExpanded']: "0,1,0,0");
	$isDoneList = (isset($_GET['isDone'])? $_GET['isDone']: "1,0,0,0");
	$msg = (isset($_GET['msg'])? $_GET['msg']: "none");
	
	//if the querystring is corrupt, set them all closed
	if ($isExpandedList != "")
		$isExpandedListArray = explode(",", $isExpandedList);
	else
		$isExpandedListArray = array(0,0,0,0);
		
	if ($isDoneList != "")
		$isDoneList = explode(",", $isDoneList);
	else
		$isDoneList = array(0,0,0,0);
		
		
	$navPrevious = "";
	$navNext = "";
	$showModuleProgress = 0;
	$boxes = array (
		array(
			"title" => "0. Overview and Course Logistics",
			"boxId" => "overview",
			"isCollapsed" => $isExpandedListArray[0],
			"isComplete" => $isDoneList[0],
			"dates" => "1/10/2015 - 1/15/2015", 
			"content" => "m0List.php"),
		array(
			"title" => "1. Choosing a Kitten",
			"boxId" => "factor",
			"isCollapsed" => $isExpandedListArray[1],
			"isComplete" => $isDoneList[1],
			"dates" => "1/15/2015 - 1/23/2015",
			"content" => "m1List.php"),
		array(
			"title" => "2. Caring for Your Kitten",
			"boxId" => "care",
			"isCollapsed" => $isExpandedListArray[2],
			"isComplete" => $isDoneList[2],
			"dates" => "1/23/2015 - 1/30/2015",
			"content" => "m2List.php"),
		array(
			"title" => "3. Legal Requirements of Owning Kittens",
			"boxId" => "legal",
			"isCollapsed" => $isExpandedListArray[3],
			"isComplete" => $isDoneList[3],
			"dates" => "1/30/2015 - 2/7/2015",
			"content" => "m3List.php")
		);
?>

<!doctype html>
<html>
	<head>
		<?php writeHead(getCourseName()); ?>
		<link href='../calendar/fullcalendar.css' rel='stylesheet' />
		<link href='../calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
		<script src='../calendar/lib/moment.min.js'></script>
		<script src='../calendar/lib/jquery.min.js'></script>
		<script src='../calendar/fullcalendar.min.js'></script>
		<script>

			$(document).ready(function() {
				
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next',
						center: 'title',
						right: 'month,basicWeek,agendaText'
					},
					views:{
						agendaText:{
							type: 'agenda',
							buttonText: 'text'
							}
						},
					defaultDate: '2015-01-18',
					editable: false,
					eventLimit: true, // allow "more" link when too many events
					events: [
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
		</script>
	</head>
	
	<body>
	<?php writeTop($navNext, $navPrevious, $showModuleProgress, ""); ?>
		<div class="indexContent">
		
			<?php 
				for ($i=0; $i<count($boxes); $i++)
					writeSuccessMessage($i, "You have successfully completed module " . $i . "."); 
			
				if ($msg=="done1")
					echo "<script>document.getElementById('successBox1').style.display='inline-block';</script>";
			?>
			
		
			<div class="scheduleContent">
				<div id='calendar'></div>
			</div>
			
			<div class="courseContent">
			<?php 
				for ($i=0; $i<count($boxes); $i++)
					writeToggleBox($boxes[$i]);
			?>
			</div>
			
			
			</div>
		
		</div>
	</body>
</html>
