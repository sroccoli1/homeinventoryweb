<!--
Project: Home Inventory Helper
Version : 0.1                              
Started  : 2019_07_30
Last updated : 2020_05_12
PURPOSE: 
This search page helps to find objects (here mainly cardboard). This search capable of filtering by object type.
-->

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Special icons fonts need to be fetch from here. -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Cardboard search</title>
	</head>
	
	<body class="searchview" onresize="rearrangeObjectOverviewTable();">
		<!--*****************************************************************************

		------------------------------Search Bar--------------------------

		-********************************************************************************-->
		<!--Go back button and Search bar all in a blue top bar -->
		<div class="searchview-topbar" 
			id="cardboardSearch-searchBar">

			<!-- A GO BACK button -->
			<!--  Caution : id used by JS script // not at the moment-->
			<a class="searchview-topbar-goback" 
				id="cardboardSearch-searchBar-goBackButton" 
				href="homePage.php"
				onclick="">
				<i class="fas fa-arrow-left searchview-topbar-goback"></i>
			</a>

			<!--Search
			See https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_searchbar3-->
			<form class="searchview-topbar-form" 
				id="cardboardSearch-searchBar-searchInput" 
				role="search" 
				method="post" 
				action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
				onsubmit="return false">
				
				<input type="search" 
					id="livesearch-input" 
					class="searchview-topbar-input"  
					name="search" 
					placeholder="&#xf002; Cardboard name..."
					aria-label="Search cardboard through site content"
					onkeyup="showSuggestions(this.value)"
					onsearch="showResultsAfterSuggestions(this.value)"/>
				
				<button class="searchview-topbar-delete" 
					id="cardboardSearch-searchBar-deleteBtn">
					<i class="fa fa-times"></i>
				</button>
				<input type="submit" 
					style="visibility: hidden; position: absolute;"/>
				<div id="livesearch"></div>
			</form>
		</div>


		<!--*****************************************************************************

		----------------------------Filter settings bar------------------------

		***************************************************************************-->
		<div class="searchview-filters" 
			id="cardboardSearch-filterBar">
			
			<!-- Name sorting -->
			<!--  Caution : id used by JS script // not at the moment-->
			<a class="searchview-filters-name" 
				id="cardboardSearch-filterBar-nameFilter" 
				href="#" 
				onclick="">
				Name
				<i class="fas fa-arrow-down searchview-filters-name-i"></i>
			</a>

			<!--Filter settings dropdown-->
			<div class="searchview-filters-settings" 
				id="cardboardSearch-filterBar-filterSettings" 
				action="">
				<button
					id="cardboardSearch-filterBar-filterSettings-Button"
					class="searchview-filters-settings-dropbtn-js" 
					onclick="showSearchFiltersSettingsAtClick()">
					Filters settings
				</button>
			</div>
			
			<!--Search filter view button-->
			<button id="cardboardSearch-filterBar-ViewBtn" 
				class="searchview-filters-view" 
				onclick="">
				<i class="material-icons">view_module</i>
			</button>
		</div>
		
		<!--Filter settings categories dropdown -->
		<div class="searchview-categories searchview-filters-dropdown-content" 
			id="cardboardSearch-filterBar-filterSettings-contents-js">
			<button class="searchview-filters-category-button" 
				id="searchFilterSettings-WeightBtn">Weight</button>
			<button class="searchview-filters-category-button" 
				id="searchFilterSettings-StateBtn">State</button>
			<button class="searchview-filters-category-button" 
				id="searchFilterSettings-HandlingBtn">Handling</button>
			<button class="searchview-filters-category-button" 
				id="searchFilterSettings-RoomBtn">Room</button>
		</div>
		<!--*****************************************************************************

		----------------------------Results section------------------------

		***************************************************************************-->
		
		<div id="liveresults" class="searchview-list-results">
			
			<!--CardboardXX picture + main information, etc. -->
			
		</div>

		<div id="objectview-wrapper-js" class="">

			<!--Go back button and photo carousel -->
			<section class="objectview-pict" id="">

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
			</section>


			<!--*****************************************************************************-->

			<!------------------------------OBJECT VIEW'S INFO SECTION-------------------------->

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
			  <h3 style="display:none" class="" id="" action="">General</h3>
			  <div id="" class="objectview-info-undertitle">
				<div id="objectview-info-weight-js" class="objectview-info-undertitle-value">(undefined)</div>
				<div id="objectview-info-price-js" class="objectview-info-undertitle-value-right">(undefined)</div>
			  </div>
			  <div id="" class="system-history-info">Last edited
				<div id="" class="system-history-info-value">22h ago</div>
			  </div>

			  <section><h3 class="" id="">Description</h3>
			    <div class="" id="objectview-info-details-description-js">(no description)</div>
			  </section>

			  <div class="info-edit-button-zone" id="" action="">
				<button id="" class="info-edit-button" onclick=""><i class="fa fa-share fa-2x info-edit-button-i" aria-hidden="true" ></i></button>
				<button id="" class="info-edit-button" onclick=""><i class="fa fa-flag fa-2x info-edit-button-i" aria-hidden="true"></i></button>
				<button id="" class="info-edit-button" onclick=""><i class="fa fa-pencil fa-2x info-edit-button-i" aria-hidden="true"></i></button>
			  </div>
			  <div class="info-edit-button-zone" id="" action="">
				<div class="" id="">Share</div>
				<div class="" id="">Save</div>
				<div class="" id="">Edit</div>
			</div>

			  <!-----------------Object Details-------------------------->

			<section id="objectview-info-details" class=""><div><h3>Details</h3></div>

				<div class="objectview-info-details-line">
				  <div id="" class="objectview-info-details-label" style="display:none">Weight</div>
				  <div id="objectview-info-details-weight-js" class="objectview-info-details-label-value" style="display:none">(undefined)</div>
				</div>
				<div class="objectview-info-details-line">
				  <div id="" class="objectview-info-details-label">Items</div>
				  <div id="objectview-info-details-items-js" class="objectview-info-details-label-value">(no selection)</div>
				</div>
				<div class="objectview-info-details-line">
				  <div id="" class="objectview-info-details-label">Handling</div>
				  <div id="objectview-info-details-handling-js" class="objectview-info-details-label-value">Normal</div>
				</div>
				<div class="objectview-info-details-line">
				  <div id="" class="objectview-info-details-label">State</div>
				  <div id="objectview-info-details-state-js" class="objectview-info-details-label-value">New</div>
				</div>
				<div class="objectview-info-details-line">
				  <div id="" class="objectview-info-details-label">Going to</div>
				  <div id="objectview-info-details-room-js" class="objectview-info-details-label-value">Kid's room</div>
				</div>
				<div class="objectview-info-details-line">
				  <div id="" class="objectview-info-details-label">ID</div>
				  <div id="objectview-info-details-id-js" class="objectview-info-details-label-value">10</div>
				</div>
			</section>
		</div>
			

	  </div>

	</body>
	<script src="myScript.js">
		//	This special icons font needs credentials called "Kit Code".
		// 	to prevent a resubmit on refresh and back button.   
		if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    </script>
	<script src="https://kit.fontawesome.com/1e0bf4fd11.js"></script>
</html>
