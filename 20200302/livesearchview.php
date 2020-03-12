<!--
Project: Home Inventory Helper
File Name : searchView.php
Version : 0.1                              
Branch : 1
Started  : 2019_07_30
Last updated : 2019_08_28
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
	</body>
	<script src="myScript.js">
	<!-- This special icons font needs credentials called "Kit Code". -->
		// to prevent a resubmit on refresh and back button.   
		if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    </script>
	<script src="https://kit.fontawesome.com/1e0bf4fd11.js"></script>
</html>
