<!--
Project: Home Inventory Helper
Branch : 2
InternalFileName: 2019_02_02_001_HomePage.html
Version : 0.1
Last updated : 2019_02_10_06_45

PURPOSE: The user can view the overall weight progress, the last edited cardboard and can set the target weight. 
If it's the first time it helps the user to set up the first info.

ADD CHARTS :
https://google-developers.appspot.com/chart/interactive/docs/drawing_charts


-->

<html><!--Migration to HTML5, support to older browser to study-->
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<title>Home</title>
	</head>

	<body onload="setHomePageUnderTopBar();" onresize="setHomePageUnderTopBar();">
		
		<!--Includes a Top Navigation Menu-->
		<!--Another way	 to include is : <object type="text/html" data="topAndSideNav.php"></object>-->
		<?php include 'topAndSideNav.php';?>
		<?php include 'var_quick_draft.php';?>
		
		<div class="main" id="homePageMainDiv">
			<h1>Home</h1>
			<h2>Edited recently</h2>
			<a href="#">item01Name</a>
			<a href="#">item02Name</a>
			<a href="#">item03Name</a>
			<a href="#">item04Name</a>
			<a href="#">carboard01Name</a>
			<a href="#">carboard02Name</a>
			<h2>Weight evolution</h2>
			<div id="homePageGraph">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
			</div>
		</div>
		
		<div class="right" id="homePageRightDiv">
		<h3>Stats</h3>
		<p>Weight Limit:<br><?php include 'var_quick_draft.php'; echo "$weightLimit $unit" ?></p>
		<p>Left:<br><?php include 'var_quick_draft.php'; echo "$weightLeft $unit" ?></p>
		</div>
		
		<div class="footer">
			<?php echo date("Y.m.d") . " " . date("l") . ". The server time is " . date("h:i:sa");?>
			<br>&copy; Samuel Roccoli<br><?php echo date("Y");?>
		</div>
		
		<!--This button opens a form to add a new cardboard box.-->
		<button id="homePage_add"
			class="w3-button w3-xlarge w3-circle w3-red w3-card-4 w3-display-bottomright w3-margin" 
			onclick="location.href='recordNewCardboard.php';" >
			+
		</button>
	</body>
	<script src="myScript.js"></script>
</html>

