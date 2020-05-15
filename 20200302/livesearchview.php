<!--
Project: Home Inventory Helper
File Name : searchView.php
Version : 0.1                              
Branch : 1
Started  : 2019_07_30
Last updated : 2020_03_12
PURPOSE: 
This search page helps to find objects (here mainly cardboard). This search capable of filtering by object type.
-->

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<!-- Special icons fonts need to be fetch from here. -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<title>Cardboard search</title>
	</head>
	
	<body class="searchview">
		<!--*****************************************************************************

		------------------------------Search Bar--------------------------

		-********************************************************************************
		<!--Go back button and Search bar all in a blue top bar -->
		<div class="searchview-topbar" id="cardboardSearch-searchBar">

			<!-- A GO BACK button -->
			<!--  Caution : id used by JS script // not at the moment-->
			<a class="searchview-topbar-goback" id="cardboardSearch-searchBar-goBackButton" href="homePage.php" onclick="">
				<i class="fas fa-arrow-left searchview-topbar-goback"></i>
			</a>

			<!--Search
			See https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_searchbar3-->
			<form class="searchview-topbar-form" id="cardboardSearch-searchBar-searchInput" role="search" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return false">
				
				<input type="search" id="livesearch-input" class="searchview-topbar-input"  
				name="search" 
				placeholder="&#xf002; Cardboard name..."
				aria-label="Search cardboard through site content"
				onkeyup="showSuggestions(this.value)" onsearch="showResultsAfterSuggestions(this.value)"/>
				
				<button class="searchview-topbar-delete" id="cardboardSearch-searchBar-deleteBtn"><i class="fa fa-times"></i></button>
				<input type="submit" style="visibility: hidden; position: absolute;"/>
				<div id="livesearch"></div>
			</form>
		</div>


		<!--*****************************************************************************

		<!------------------------------Filter settings bar------------------------

		<!---***************************************************************************-->
		<div class="searchview-filters" id="cardboardSearch-filterBar">
			
			<!-- Name sorting -->
			<!--  Caution : id used by JS script // not at the moment-->
			<a class="searchview-filters-name" id="cardboardSearch-filterBar-nameFilter" href="#" onclick="">
				Name<i class="fas fa-arrow-down searchview-filters-name-i"></i>
			</a>

			<!--Filter settings dropdown-->
			<div class="sea1rchview-filters-settings" id="cardboardSearch-filterBar-filterSettings" action="">
				<button id="cardboardSearch-filterBar-filterSettings-Button" class="searchview-filters-settings-dropbtn-js" onclick="showSearchFiltersSettingsAtClick()">
					Filters settings
				</button>
			</div>
			
			<!--Search filter view button-->
			<button id="cardboardSearch-filterBar-ViewBtn" class="searchview-filters-view" onclick="">
				<i class="material-icons">view_module</i>
			</button>
		</div>
		
		<!--Filter settings categories dropdown -->
		<div class="searchview-categories searchview-filters-dropdown-content" id="cardboardSearch-filterBar-filterSettings-contents-js">
			<button class="searchview-filters-category-button" id="searchFilterSettings-WeightBtn">Weight</button>
			<button class="searchview-filters-category-button" id="searchFilterSettings-StateBtn">State</button>
			<button class="searchview-filters-category-button" id="searchFilterSettings-HandlingBtn">Handling</button>
			<button class="searchview-filters-category-button" id="searchFilterSettings-RoomBtn">Room</button>
		</div>
		<!--*****************************************************************************

		<!------------------------------Results section------------------------

		<!---***************************************************************************-->
		
		<div id="liveresults" class="searchview-results">
			
			<!--CardboardXX picture + main information, etc.-->
			
		</div>

		<div id="objectview-wrapper-js" class="objectview-wrapper">

			<!--Go back button and photo carousel -->
			<div class="objectview-pict" id="">

				<!-- A GO BACK button -->
				<!--  Caution : id used by JS script // not at the moment
				<a id="objectview-goBackButton-pict" href="livesearchview.php" onclick="">
					<i class="fas fa-arrow-left searchview-topbar-goback"></i>
				</a>
				-->

				<!-- Slideshow container
				See https://www.w3schools.com/howto/howto_js_slideshow.asp-->
				<div class="slideshow-container">

					<!-- Full-width images -->
					<div class="mySlides fade">
					  <img src="img_nature_wide.jpg" style="width:100%">
					</div>

					<div class="mySlides fade">
					  <img src="img_snow_wide.jpg" style="width:100%">
					</div>

					<div class="mySlides fade">
					  <img src="img_mountains_wide.jpg" style="width:100%">
					</div>

					<!-- Next and previous buttons -->
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>

				</div>
				<br>

				<!-- The dots/circles -->
				<div style="text-align:center">
				  <span class="dot" onclick="currentSlide(1)"></span>
				  <span class="dot" onclick="currentSlide(2)"></span>
				  <span class="dot" onclick="currentSlide(3)"></span>
				</div>
			</div>


			<!--*****************************************************************************

			<!------------------------------OBJECT VIEW'S INFO SECTION------------------------

			<!---***************************************************************************-->
				
			<!-- Name  -->
			<div class="objectview-title">
				
			  <!-- A GO BACK button -->
			  <!--  Caution : id used by JS script // not at the moment-->
			  
			  <!-- NOT NEEDED
			  <a id="objectview-goBackButton-title" href="livesearchview.php" onclick="">
				<i class="fas fa-arrow-left searchview-topbar-goback"></i>
			  </a>
			  -->
			  <h2>Children's staff</h2>
			</div>


			<!-- Weight and price  -->

			<!-- Last edited time -->

			<!-----------------Object Description--------------------->
			<div class="objectview-info">
			  <h3 class="" id="" action="">General</h3>

			  <div class="objectview-info-details-label" id="">Description</div>
			  <div class="objectview-info-details-label-value" id="objectview-info-details-description">(no description)</div>

			  <div class="info-edit-button" id="" action="">
				<button id="" class="info-edit-button" onclick="">Forward<i class="fa fa-share" aria-hidden="true"></i></button>
				<button id="" class="info-edit-button" onclick="">Save<i class="fa fa-flag" aria-hidden="true"></i></button>
				<button id="" class="info-edit-button" onclick="">Edit<i class="fa fa-pencil" aria-hidden="true"></i></button>
			  </div>

			  <!-----------------Object Details-------------------------->
			  <div id="objectview-info-details" class=""><h3>Details</h3></div>

			  <div id="" class="objectview-info-details-label">Items</div>
			  <div id="objectview-info-details-items" class="objectview-info-details-label-value">(no selection)</div>
			  <div id="" class="objectview-info-details-label">Handling</div>
			  <div id="objectview-info-details-handling" class="objectview-info-details-label-value">Normal</div>
			  <div id="" class="objectview-info-details-label">State</div>
			  <div id="objectview-info-details-state" class="objectview-info-details-label-value">New</div>
			  <div id="" class="objectview-info-details-label">Going to</div>
			  <div id="objectview-info-details-room" class="objectview-info-details-label-value">Kid's room</div>
			  <div id="" class="system-history-info">Last edited</div>
			  <div id="" class="system-history-info-value">22h ago</div>

			</div>

	  </div>

	</body>
	<script src="myScript.js">
	<!-- This special icons font needs credentials called "Kit Code". -->
		// to prevent a resubmit on refresh and back button.   
		if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    </script>
	<script src="https://kit.fontawesome.com/1e0bf4fd11.js"></script>
</html>
