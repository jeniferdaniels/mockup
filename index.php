<!doctype html>
<?PHP 
	$css = (isset($_GET['css'])? $_GET['css']: "oduColors.css");	
	$page = (isset($_GET['iFramePage'])? $_GET['iFramePage']: "testTags.php");	
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
			function changeCSS(iFramePage, cssFile){
				document.getElementById('iframeForTestCSS').src=iFramePage + "?css=" + cssFile;
				document.location.href= "index.php?iFramePage=" + iFramePage + "&css=" + cssFile;
			}
		</script>
		


	</head>
	
	<body>
		<ul>
			<li><a onClick="changeCSS('testTags.php', 'likeFutureLearn.css')" href=#>Style 1 - Catalog of Tags</a></li>
			<li><a onClick="changeCSS('testModuleList.php', 'likeFutureLearn.css')" href=#>Style 1 - Module Listing</a></li>
			<li><a onClick="changeCSS('testTextContent.php', 'likeFutureLearn.css')" href=#>Style 1 - Text Content Page</a></li>
			<li><a onClick="changeCSS('testVideoContent.php', 'likeFutureLearn.css')" href=#>Style 1 - Video Content Page</a></li>
		</ul>
		
		<ul>
			<li><a onClick="changeCSS('testTags.php', 'oduColors.css')" href=#>Style 2 - Catalog of Tags</a></li>
			<li><a onClick="changeCSS('testModuleList.php', 'oduColors.css')" href=#>Style 2 - Module Listing</a></li>
			<li><a onClick="changeCSS('testTextContent.php', 'oduColors.css')" href=#>Style 2 - Text Content Page</a></li>
			<li><a onClick="changeCSS('testVideoContent.php', 'oduColors.css')" href=#>Style 2 - Video Content Page</a></li>
			
		</ul>
		
		
		<iframe src="<?PHP echo $page ?>?css=<?PHP echo $css ?>" id="iframeForTestCSS" width="95%" height="660px"></iframe>
		
	</body>
</html>

