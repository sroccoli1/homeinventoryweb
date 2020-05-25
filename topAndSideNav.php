<!--
Project: Home Inventory Helper
Branch : 2
File Name : TopNav&MenuSidebar
Version : 0.1                                                                                                                                                                                                                                    
Started  : 2019_02_10
Last updated : 2019_09_08

PURPOSE: 
Define a top navigation (4 buttons) and a responsive menu sidebar with 8 sections :
- My name, my email and and text to (dis)connect.
- Home
- I prepare my moving
- I receive my items
- Objects Lists
- Save
- Share
- Bin-->

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<title>Home</title>
	</head>
	<!--When body is resized sidenav is dynamically resized too-->
	<body onload="closeDropdownAtClickOutside();">
	<!--*****************************************************************************

	------------------------------Top Navigation Bar--------------------------

	-********************************************************************************
	<!--Menu icon, Home page icon, Search and Page Relative menu, all in a static top bar always visible-->
	<div class="topnav grid-container" id="myTopnav">

	  <!-- "Hamburger menu" / "Bar icon" to toggle the menu sidebar-->
	  <a class="item1" id="sideMenuBarOpenBtn" href="#" onclick="openMenuSideBar()">
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


	  <!--*****************************************************************************

	------------------------------Menu sidenav------------------------

	-*****************************************************************************/
	A responsive side menu bar-->
	<div class="sidenav" id="myMenuSideBar">
		<a id="sideMenuBarCloseBtn" href="javascript:void(0)" class="closebtn" onclick="closeMenuSideBar()">&times;</a>
	  
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
	  <a href="iReceiveMyItems.html" class="icon">
		I receive my items.
	  </a>
	 
	 <!--Link to the page "Objects List"-->
	  <a href="myObjectsList.html" class="icon">
		Objects Lists
	  </a>

	 <!--Link to the page "Save"-->
	  <a href="save.html" class="icon">
		Save
	  </a>

	 <!--Link to the page "Share"-->
	  <a href="share.html" class="icon">
		Share
	  </a>
	  
	   <!--Link to the page "Bin"-->
	  <a href="bin.html" class="icon">
		Bin
	  </a>

	  </div>
	</body>
	  <script src="myScript.js"></script>
</html>
