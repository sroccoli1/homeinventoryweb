<!--
Project: Home Inventory Helper
Branch : 2
InternalFileName: 2019_02_02_001_HomePage.html
Version : 0.1
Last updated : 2019_02_10_06_45

PURPOSE: The user can view the overall weight progress, the last edited cardboard and can set the target weight. 
If it's the first time it helps the user to set up the first info.

This code has been moved to a linux based OS.

Google Charts :
https://google-developers.appspot.com/chart/interactive/docs/drawing_charts


-->

<html><!--Migration to HTML5, support to older browser to study-->
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Home</title>
	</head>

	<body 
		class="" 
		onload="closeDropdownAtClickOutside();" 
		onresize="resizeOpenedSidenav()" >
		
		<!--Includes a Top Navigation Menu-->
		<!-- PURPOSE: 
		Define a top navigation (4 buttons) and a responsive menu sidebar with 8 sections :
		- My name, my email and and text to (dis)connect.
		- Home
		- I prepare my moving
		- I receive my items
		- Objects Lists
		- Save
		- Share
		- Bin-->
		<!--Another way	 to include is : <object type="text/html" data="topAndSideNav.php"></object>-->
		<div class="home-topbar topnav grid-container" id="myTopnav">
			<!--*****************************************************************************

			------------------------------Top Navigation Bar--------------------------

			<!-******************************************************************************** -->
			
			<!--Menu icon, Home page icon, Search and Page Relative menu, all in a static top bar always visible-->
			

			<!-- "Hamburger menu" / "Bar icon" to toggle the menu sidebar-->
			<a class="item1" id="sideMenuBarOpenBtn" href="#" onclick="openMenuSideBarOnClick()">
				<i class="fa fa-bars"></i>
				</a>

			<!--Home page link-->
			<a class="item2" id="homePageBtn" href="homePage.php">
				<i class="fa fa-home"></i>
				</a>

			<!--Add homepage search and menu on the right side of the topNav-->

			<!--Search
				See https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_searchbar3-->
			<div class="item3 search-container">
			<form class="search-container" action="livesearchview.php">
				<input type="text" placeholder="Search..." name="search">
				<button id="topBarSearchBtn" type="submit"><i class="fa fa-search"></i></button>
			</form>
			</div>

			<!--Page Relative menu-->
			<div class="item4 dropdown">
				<button id="topNavRelativeMenuDropButton" class="dropbtn" onclick="showDropdownAtClick()">
					<i class="fa fa-ellipsis-v"></i>
				</button>
				<div class="dropdown-content" id="myDropdown">
					<a href="#">Set moving date</a>
					<a href="#">Set weight limit</a>
					<a href="#">Set volume limit</a>
				</div>
			</div>
		</div>

		<div class="home-page-flex-container">
			<!--*****************************************************************************

			------------------------------Menu sidenav------------------------

			-*****************************************************************************/
			A responsive side menu bar-->
			<div class="sidenav home-sidenav" id="myMenuSideBar">
				<a id="sideMenuBarCloseBtn" 
					href="javascript:void(0)" 
					class="closebtn" 
					onclick="closeMenuSideBar()">
					&times;
				</a>

				<!-- - My name, my email and and text to (dis)connect. -
				Improve this section so that behave like this :  
				At first the user is not connected, it displays : 
				"Welcome! 
				Connect"
				Clicking on "connect" send the user to a sign in page.
				When the user is connected, it displays : 
				"Samuel Roccoli 
				samuel.roccoli@laposte.net
				Disconnect"
				Clicking on "connect" send the user to a sign in page.
				-->
				<div id="menuSideBarConnect">
				Welcome!  
					<a href="#" class="icon">
					Connect
					</a>
				</div>
				<!--Link to the Home page-->
				<a href="homePage.php" class="icon">
					Home
				</a>
				<!--Link to the page "I prepare my move"-->
				<a href="#" class="icon">
					I prepare my move.
				</a>
				<!--Link to the page "I receive my items"-->
				<a href="#" class="icon">
					I receive my items.
				</a>
				<!--Link to the page "Objects List"-->
				<a href="#" class="icon">
					Objects Lists
				</a>
				<!--Link to the page "Save"-->
				<a href="#" class="icon">
					Save
				</a>
				<!--Link to the page "Share"-->
				<a href="#" class="icon">
					Share
				</a>
				<!--Link to the page "Bin"-->
				<a href="#" class="icon">
					Bin
				</a>
			</div>
			
			
			<div id="homePageMainDiv" class="home-main">
				<h1 class="home-h1">My Dashboard</h1>
				<hr class="home-hr">
				<h2 class="home-h2">Evolution</h2>
				<p id="onebarchart_div">Loading global weight barchart...</p>
				<!-- <p id="barchart_div">Loading disbribution barchart...</p> -->
			
				<h2 class="home-h2">Edited recently</h2>
					<div id="recent">
						<a href="#">item01Name</a>
						<a href="#">item02Name</a>
						<a href="#">item03Name</a>
						<a href="#">item04Name</a>
						<a href="#">carboard01Name</a>
						<a href="#">carboard02Name</a>
					</div>
			</div>
		</div>
		<div class="home-footer footer">
		  <?php echo date("Y.m.d") . " " . date("l") . ". The server time is " . date("h:i:sa");?>
		  <br>&copy; Samuel Roccoli<br>
			<?php echo date("Y");?>
					<!--This button opens a form to add a new cardboard box.-->
			<button id=""
				class="w3-button w3-xlarge w3-circle w3-red w3-card-4 w3-margin w3-right" 
				onclick="location.href='recordNewCardboard.php';" >
				+
			</button>
		</div>

	</body>
	<script src="myScript.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="weightChart.js"></script>
</html>

