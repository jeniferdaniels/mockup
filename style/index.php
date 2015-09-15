<!doctype html>
<?PHP 

	if (isset($_GET['css']))
		$css = $_GET['css'];
	else
		$css = "oduColors.css";		
?>

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
				document.location.href= "index.php?css=" + cssFile;
			}
		</script>
		


	</head>
	
	<body>
		<ul>
			<li><a onClick="changeCSS('likeFutureLearn.css')" href=#>Style 1 - Catalog of Tags</a></li>
			<li><a onClick="changeCSS('oduColors.css')" href=#>Style 2 - Catalog of Tags</a></li>
			
		</ul>
		
		
		<iframe src="test.php?css=<?PHP echo $css ?>" id="iframeForTestCSS" width="95%" height="660px"></iframe>
		
	</body>
</html>

