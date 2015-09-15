<!doctype html>
<?PHP 

	if (isset($_GET['css']))
		$css = $_GET['css'];
	else
		$css = "oduColors.css";		
?>
<?PHP include 'iconVariables.php' ?>
<html>
	<head>
		<title>Test</title>

		<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?PHP echo $css ?>">

		<style>
			.iconColumn{
				width: 300px;
				vertical-align: top;
				display: inline-block;
				/* border: 1px solid red; */
			}
		
		</style>
		
		<!--fonts from Adobe Typekit -->
		<script src="https://use.typekit.net/scm3ciw.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		
		

	</head>
	
	<body>
		<a href="fakeNewPLE.php?css=<?php echo $css ?>">Fake New PLE Content Page</a>
	    <br>
		<a href="fakeNewPLE_moduleList.php?css=<?php echo $css ?>">Fake New PLE Module Listing</a>
		
		<!--headings-->
		<h1 id="headings">Headings</h1>
		<h1>Heading 1</h1>
		<h2>Heading 2</h2>
		<h3>Heading 3</h3>
		<h4>Heading 4</h4>
		<h5>Heading 5</h5>
		<h6>Heading 6</h6>
		<hr />

		<!--paragraph-->
		<h1 id="paragraph">Paragraph</h1>
		<p>Lorem ipsum dolor sit amet, <a href="#" title="test link">test link</a> adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.</p>
		<p>Lorem ipsum dolor sit amet, <em>emphasis</em> consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.</p>
		<hr />

		<!--lists-->
		<h1 id="list_types">List Types</h1>
		<h3>Definition List</h3>
		<dl>
			<dt>Definition List Title</dt>
			<dd>This is a definition list division.</dd>
		</dl>
		
		<h3>Ordered List</h3>
		<ol>
			<li>List Item 1</li>
			<li>List Item 2</li>
			<li>List Item 3</li>
		</ol>
		
		<h3>Unordered List</h3>
		<ul>
			<li>List Item 1</li>
			<li>List Item 2</li>
			<li>List Item 3</li>
		</ul>
		<hr />

		<!--form-->
		<h1 id="form_elements">Fieldsets, Legends, and Form Elements</h1>
		<fieldset>
			<legend>Legend</legend>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus.</p>
			
			<form>
				<h2>Form Element</h2>			
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui.</p>
				
				<label for="text_field">Text Field:</label><br/>
				<input type="text" id="text_field" /><br/>
				
				<label for="text_area">Text Area:</label><br/>
				<textarea id="text_area"></textarea><br/>
				
				<label for="select_element">Select Element:</label><br/>
				<select name="select_element">
					<optgroup label="Option Group 1">
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
					</optgroup>
					<optgroup label="Option Group 2">
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
					</optgroup>
				</select><br/>
					
				<label for="radio_buttons">Radio Buttons:</label><br />
				<input type="radio" class="radio" name="radio_button" value="radio_1" /> Radio 1<br/>
				<input type="radio" class="radio" name="radio_button" value="radio_2" /> Radio 2<br/>
				<input type="radio" class="radio" name="radio_button" value="radio_3" /> Radio 3<br/>
				
				
				<label for="checkboxes">Checkboxes:</label><br />
				<input type="checkbox" class="checkbox" name="checkboxes" value="check_1" /> Radio 1<br/>
				<input type="checkbox" class="checkbox" name="checkboxes" value="check_2" /> Radio 2<br/>
				<input type="checkbox" class="checkbox" name="checkboxes" value="check_3" /> Radio 3<br/>
				
				
				<label for="password">Password:</label><br />
				<input type="password" class="password" name="password" /><br/>
				
				
				<label for="file">File Input:</label><br />
				<input type="file" class="file" name="file" /><br/>
				
				
				<input class="button" type="reset" value="Clear" /> <input class="button" type="submit" value="Submit" /><br/>
			</form>
		</fieldset>


		<hr />

		<h1 id="tables">Tables</h1>

		<table cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<th>Table Header 1</th><th>Table Header 2</th><th>Table Header 3</th>
				</tr>
				<tr>
					<td>Division 1</td><td>Division 2</td><td>Division 3</td>
				</tr>
				<tr class="even">
					<td>Division 1</td><td>Division 2</td><td>Division 3</td>
				</tr>
				<tr>
					<td>Division 1</td><td>Division 2</td><td>Division 3</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td>Division 1</td><td>Division 2</td><td>Division 3</td>
				</tr>
			</tfoot>
		</table>


		<hr />

		<h1 id="misc">Misc Stuff </h1>

		<h3>Superscript and Subscript</h3>
		<p>Lorem <sup>superscript</sup> dolor <sub>subscript</sub> amet, consectetuer adipiscing elit. 

		<h3>Abbreviation</h3>
		<p>Lorem <abbr title="Avenue">AVE</abbr> ipsim dolor.
		
		<h3>Pre</h3>
		<pre>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. </pre>

		<h3>Code</h3>
		<code>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. <acronym title="National Basketball Association">NBA</acronym> Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus. </code>
		
		<h3>Blockquote</h3>
		<blockquote>"This stylesheet is awesome." <br />-Blockquote</blockquote>
		
		<audio>Audio</audio>
		
		<h3>Address</h3>
		<address>1234 South street<br/>Something, Virginia<br/>12345</address>
		
		<h3>Caption</h3>
		<caption>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est.</caption>
		
		<h3>Footer</h3>
		<footer>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</footer>
		
		<h3>Header</h3>
		<header>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</header>
		
		<h3>Mark</h3>
		<p>Lorem ipsum dolor sit <mark>marked text </mark> amet, consectetuer adipiscing elit. Nullam dignissim convallis est.</p>
		
		<h3>MenuItem</h3>
		<menuitem>Menu Item</menuitem>

		<h3>Nav </h3>
		<nav>Navigation Links</nav><nav>Navigation Links</nav>

		
		<h3>Progress</h3>
		<progress value="30" max="100"></progress>
		
		<h3>Strike through</h3>
		<p>Lorem ipsum dolor sit <s>striked text </s> amet, consectetuer adipiscing elit. Nullam dignissim convallis est.</p>
		
		<h3>Time</h3>
		<p>Lorem ipsum <time datetime="2015-01-01 10:00">10:00</time> amet, consectetuer adipiscing elit. Nullam dignissim convallis est.</p>
		
		
		<hr/>
		
		<!--PLE -->
		<h1 id="ple">PLE Specific</h1>
		
		<div class="logoPle">PLE Logo</div>
		
		<div class="LogoOduOnline">ODU Online Logo</div>
		
		<div class="LogoOdu">ODU Logo</div>
		
		<h1 class="courseTitle">Course Title</h1>
		
		<div class="search">Search box</div>
		
		<div class="announcement">Announcement</div>
		
		<div class="completedModule">Completed Module</div>
		
		<div class="incompletedModule">Incompleted Module</div>
			
		<div class="resumeButton">Resume Button</div>
		
		<div class="startButton">Start Button</div>
		
		<div class="iconColumn">
			<h3>Title Twisty Expanded </h3>
			<?php echo $iconTwistyExpandedLarge ?>
		</div>
	
		<div class="iconColumn">
			<h3>Title Twisty Collapsed </h3>
			<?php echo $iconTwistyCollapsedLarge ?>
		</div>
		
		<div class="iconColumn">
			<h3>Drop Down Menu Icon </h3>
			<?php echo $iconDropDownMenu ?>
		</div>
		
		<div class="iconColumn">
			<h3>Assignment Icon</h3>
			<?php echo $iconAssignmentSmall ?>			
			<?php echo $iconAssignmentMedium ?>
			<?php echo $iconAssignmentLarge ?>
			<?php echo $iconAssignmentExtraLarge ?>
		</div>
		
		<div class="iconColumn">
			<h3>Urgent Assignment Icon</h3>
			<?php echo $iconAssignmentUrgentSmall ?>
			<?php echo $iconAssignmentUrgentMedium ?>
			<?php echo $iconAssignmentUrgentLarge ?>
			<?php echo $iconAssignmentUrgentExtraLarge ?>
		</div>	
			
		
		<div class="iconColumn">
			<h3>Notification Icon</h3>
			<?php echo $iconNotification ?>
		</div>

		<div class="iconColumn">
			<h3>User Icon</h3>
			<?php echo $iconUser ?>
		</div>
		
		<div class="iconColumn">
			<h3>Hamburger Menu Icon</h3>
			<?php echo $iconHamburgerMenu ?>
		</div>
		
		<div class="iconColumn">
			<h3>Completed Icon</h3>
			<?php echo $iconCompletedSmall ?>
			<?php echo $iconCompletedMedium ?>
			<?php echo $iconCompletedLarge ?>
			<?php echo $iconCompletedExtraLarge ?>
		</div>
		
		<div class="iconColumn">
			<h3>Completed Icon - Disabled</h3>
			<?php echo $iconCompletedDisabledSmall ?>
			<?php echo $iconCompletedDisabledMedium ?>
			<?php echo $iconCompletedDisabledLarge ?>
			<?php echo $iconCompletedDisabledExtraLarge ?>
		</div>
		
		<div class="iconColumn">
			<h3>In Progress Icon</h3>
			
		</div>
		
		
		<div class="iconColumn">
			<h3>Acrobat PDF File Type Icon</h3>
			<?php echo $iconFileTypePdfSmall ?>
			<?php echo $iconFileTypePdfMedium ?>
		</div>
		
		<div class="iconColumn">
			<h3>Audio File Type Icon</h3>
			<?php echo $iconFileTypeAudioSmall ?>
			<?php echo $iconFileTypeAudioMedium ?>
		</div>
		
		<div class="iconColumn">
			<h3>Video File Type Icon</h3>
			<?php echo $iconFileTypeVideoSmall ?>
			<?php echo $iconFileTypeVideoMedium ?>
		</div>
		
		<div class="iconColumn">
			<h3>Word File Type Icon</h3>
			<?php echo $iconFileTypeWordSmall ?>
			<?php echo $iconFileTypeWordMedium ?>
		</div>
		
		<div class="iconColumn">
			<h3>Powerpoint File Type Icon</h3>
			<?php echo $iconFileTypePowerpointSmall ?>
			<?php echo $iconFileTypePowerpointMedium ?>
		</div>
		
		<div class="iconColumn">
			<h3>Excel File Type Icon</h3>
			<?php echo $iconFileTypeExcelSmall ?>
			<?php echo $iconFileTypeExcelMedium ?>
		</div>
		
		<div class="iconColumn">
			<h3>Previous Navigation Arrow Icon</h3>
			<?php echo $iconNavPrevious ?>
		</div>
		
		<div class="iconColumn">
			<h3>Next Navigation Arrow Icon</h3>
			<?php echo $iconNavNext ?>
		</div>

		<h3>Topic List</h3>
		<ul class="listTopic">
			<li>Some text <a href="something1.php">Item 1</a> some more text</li>
			<li><a href="something2.php">Item 2</a></li>
			<li><a href="something3.php">Item 3 is a very long item</a></li>
			<li><a href="something4.php">Item 4</a></li>
		</ul>	

		<h3>Subtopic List</h3>
		<ul class="listSubTopic">
			<li>Some text <a href="something1.php">Item 1</a> some more text</li>
			<li><a href="something2.php">Item 2</a></li>
			<li><a href="something3.php">Item 3 is a very long item</a></li>
			<li><a href="something4.php">Item 4</a></li>
		</ul>
		
		<h3>Bread Crumbs </h3>
		<ul class="breadCrumbs">
			<li><a href="#">Course Name Here</a></li>
			<li><a href="#">Topic Name Here</a></li>
			<li><a href="#">Subtopic Name Here</a></li>
			<li>Something Else Name Here</li>
		</ul>
		
		
		<div class="help">Help</div>
		
		<div class="dropDownMenuModule">Module Drop Down Menu</div>
		
		<div class="dropDownMenuNotification">Notification Drop Down Menu</div>
		
		<div class="dropDownMenuUser">User Drop Down Menu</div>
		
		<div class="dropDownMenuCourseInfo">Course Information Drop Down Menu</div>
		
		<div class="pastDue">Past Due</div>
		
		
		
		<div class="phoneNumber">Phone Number</div>

		<div class="emailAddress">Email Address</div>

		<div class="calendarEventMultiDay">Multi Day Calendar Event</div>
		
		<div class="calendarEventOneDay">One Day Calendar Event</div>

		<div class="navDescription">Navigation Arrow On Hover Description</div>
		
		<div class="navPreviousDescription">Previous Navigation Arrow On Hover Description</div>
		
		<div class="navNextDescription">Next Navigation Arrow On Hover Description</div>
		
		<div class="announcementPopUp">Pop Up Announcement</div>
		
	</body>
</html>

