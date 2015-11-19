<?php echo '<link rel="stylesheet" type="text/css" href="' . $GLOBALS['mockupDirectory'] . 'css/askAQuestion.css">' ?>

<div class="aaq">
	<div>

		<nav>
		<ul class="aaqHeaderLinks floatLeft">
			<li><a href="">Ask A New Question</a></li>
		</ul>
		
		<ul class="aaqHeaderLinks floatRight">
			<li><a href="">All </a></li>
			<li><a href="">Pinned</a> </li>
			<li><a href="">My Posts</a></li>
		</ul>
		</nav>
		
		<div style="clear:both"></div>
		
	</div>
	
	<h2>Questions about the Material</h2>
	<div class="aaqQuestionAndAnswerWrapper">
		<div class="aaqQuestion">
			<span class="aaqPostTitle"><?php echo icon("fa", "expanded", "s", "") ?>Some question short title here</span>
			<div class="floatRight">
				 <?php echo icon("fa", "pin", "s", "") ?>
			</div>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas</p>
			
			<ul class="aaqPostProperties">
				<li><a href="">Reply</a></li>
				<li class="aaqPostRating"></li>
				<li class="aaqPostEndorsed"></li>
				<li class="aaqPostCommentCount">2 comments</li>
				<li class="aaqPoster">Darly Dixon</li>
				<li class="aaqPostDateTime">1/18/2015 10:55 AM</li>
			</ul>
			
		</div>
		
		<div class="aaqAnswer">
			<span class="aaqPostTitle">Some answer short title here</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>
			
			<ul class="aaqPostProperties">
				<li><a href="">Reply</a></li>
				<li class="aaqPostRating"><?php writeStarRating("3.5:5"); ?></li>
				<li class="aaqPostEndorsed"></li>
				<li class="aaqPostCommentCount">0 comments</li>
				<li class="aaqPoster">Carl Grimes</li>
				<li class="aaqPostDateTime">1/18/2015 12:15 PM</li>
			</ul>
		</div>

		<div class="aaqAnswer">
			<span class="aaqPostTitle">Some answer short title here</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas eu nulla in orci porta pretium. Fusce placerat luctus posuere. Donec blandit ligula non malesuada tristique.</p>
			
			<ul class="aaqPostProperties">
				<li><a href="">Reply</a></li>
				<li class="aaqPostRating"><?php writeStarRating("2:5"); ?></li>
				<li class="aaqPostEndorsed">Instructor Endorsed</li>
				<li class="aaqPostCommentCount">0 comments</li>
				<li class="aaqPoster">Beth Greene</li>
				<li class="aaqPostDateTime">1/18/2015 5:30 AM</li>
			</ul>
		</div>
	</div><!-- end aaqQuestionAndAnswerWrapper -->


	<div class="aaqQuestionAndAnswerWrapper">
		<div class="aaqQuestion">
			<span class="aaqPostTitle"><?php echo icon("fa", "collapsed", "s", "") ?>Some question short title here</span>
			<div class="floatRight">
				<?php echo icon("fa", "pin", "s", "") ?>
			</div>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dictum sem id mauris vehicula lobortis. Aliquam ut tortor odio. Curabitur cursus leo eu pellentesque consequat. Curabitur sapien nibh, vestibulum sed tortor eget, posuere rhoncus nibh. Curabitur efficitur tellus risus. Nullam sit amet massa ultrices lacus facilisis maximus cursus ac arcu. Maecenas</p>
			
			<ul class="aaqPostProperties">
				<li><a href="">Reply</a></li>
				<li class="aaqPostRating"></li>
				<li class="aaqPostEndorsed"></li>
				<li class="aaqPostCommentCount">1 comments</li>
				<li class="aaqPoster">Maggie Greene</li>
				<li class="aaqPostDateTime">1/17/2015 10:25 AM</li>
			</ul>
		</div>
	</div><!-- end aaqQuestionAndAnswerWrapper -->
</div><!-- end aaqContentWrapper -->	