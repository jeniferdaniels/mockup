<!doctype html>
<html>
	<head>
		<title>Style Sheet Test</title>
		<style>
			body  {
				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;;
				color: rgba(25, 25, 25, 1);
				font-size: 10pt;
			}
			ul{
				list-style-type: none;
			}
			li{
				display: inline;
				padding: 0 10px 0 10px;
			}
		</style>
		
		<script>
			function changeCSS(cssFile){
				document.getElementById('iframeForTestCSS').src="test.php?css=" + cssFile;
			}
		</script>
		


	</head>
	
	<body>
		<ul>
			<li><a onClick="changeCSS('likeFutureLearn.css')" href=#>Modeled After FutureLearn</a></li>
			<li><a onClick="changeCSS('oduColors.css')" href=#>Style 1</a></li>
			
		</ul>
		
		
		<iframe src="test.php?css=oduColors.css" id="iframeForTestCSS" width="1200px" height="800px"></iframe>
		
	</body>
</html>

