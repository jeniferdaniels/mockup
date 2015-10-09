<?php include_once 'scripts/mockupFunctions.php' ?>
<?php include_once 'scripts/globalVariables.php' ?>


<!doctype html>
<html>
	<head>
		<?php writeHead("Dashboard Mockup"); ?>
		<style>
			.headerWrapper{
				width:100%;
				background-color: rgb(250,250,250);
				padding:0;
				margin: 0;
				height:120px;
			}
			
			.headerContent{
				width: 80%;
				border: 1px solid blue;
				margin-left: auto;
				margin-right:auto;
				text-align:right;
				height: 100%;
			}
		
			.imageWrapper{
				border: 3px solid yellow;
				display:inline-block;
				float: left;
				margin: 10px;
				
			}
		
			.headerButtonWrapper{
				border: 1px solid red;
				text-align: right;
			}
			
			.buttonGroup{
				position: relative;
				border: 3px dotted blue;
				display: inline-block;
			}
			
			.titleWrapper{
				display: block;
				border: 3px solid green;
				text-align: left;
				margin-left: 120px;
			
			}

			.headerUpperButton{
				background-color: white;
				display:inline;
			}
			
			
			.bottomButton{
				display: inline-block;
				border: 1px solid black;			
			}
			
			
			.bottomButtonGroup{
				//position: relative;
				border: 3px dotted blue;
				margin-top:30px;
				display: inline-block;
			}
		</style>
	</head>
	
	<body>
		<div class="headerWrapper">
	
	
	
			<div class="headerContent">
			<div class="imageWrapper"><img src="images/pleLogo.png"></div>
					<!--  <div class="headerButtonWrapper">-->
						<div class="buttonGroup">
							<div class="headerUpperButton"><?php echo $GLOBALS["iconNotificationMedium"];?></div>
							<div class="headerUpperButton"><?php echo $GLOBALS["iconSearchMedium"];?></div>
							<div class="headerUpperButton"><?php echo $GLOBALS["iconChatMedium"];?></div>
							<div class="headerUpperButton"><?php echo $GLOBALS["iconUserMedium"];?></div>
						</div>
					<!-- </div>-->
				
				
				<div class="titleWrapper"><h1>CAT 101 - Fundamentals of Cats</h1></div>
				<div class="bottomButtonGroup">	

						
						<div class="bottomButton">Course Info</div>
						<div class="bottomButton">Dashboard</div>
				</div>
			</div>
		</div>
	</body>
</html>