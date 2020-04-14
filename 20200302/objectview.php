<!--
Project: Home Inventory Helper
File Name : objectview.php
Version : 0.1                              
Branch : 1
Started  : 2020_04_10
PURPOSE: 
Display one object details.
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
	
	<body class="objectview">

	<!--*****************************************************************************

	------------------------------TOP--------------------------

	-********************************************************************************-->


	<!--*****************************************************************************

	------------------------------SEARCH BAR--------------------------

	-********************************************************************************-->
	
	<!--*****************************************************************************

	------------------------------ MENU --------------------------

	-********************************************************************************-->


	<!--*****************************************************************************

	------------------------------Object View Upper Section--------------------------

	-********************************************************************************-->
	<!--Go back button and photo carousel -->
	<div class="objectview-pict" id="">

		<!-- A GO BACK button -->
	    <!--  Caution : id used by JS script // not at the moment-->
		<a class="goback" id="objectview-goBackButton" href="livesearchview.php" onclick="">
			<i class="fas fa-arrow-left searchview-topbar-goback"></i>
		</a>

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
	  <h2>Children's staff</h2>
	</div>


	<!-- Weight and price  -->

    <!-- Last edited time -->
	
    <!-----------------Object Description--------------------->
    <div class="objectview-info">
	  <h3 class="" id="" action="">General</h3>

      <div class="objectview-info-details-label" id="">Description</div>
	
	  <div class="info-edit-button" id="" action="">
		<button id="" class="info-edit-button" onclick="">Forward<i class="fa fa-share" aria-hidden="true"></i></button>
		<button id="" class="info-edit-button" onclick="">Save<i class="fa fa-flag" aria-hidden="true"></i></button>
		<button id="" class="info-edit-button" onclick="">Edit<i class="fa fa-pencil" aria-hidden="true"></i></button>
	  </div>
	
	  <!-----------------Object Details-------------------------->
	  <div id="objectview-info-details" class="">Details</div>

	  <div id="" class="objectview-info-details-label">Items</div>
	  <div id="" class="objectview-info-details-label-value">(no selection)</div>
	  <div id="" class="objectview-info-details-label">Handling</div>
	  <div id="" class="objectview-info-details-label-value">Normal</div>
	  <div id="" class="objectview-info-details-label">State</div>
	  <div id="" class="objectview-info-details-label-value">New</div>
	  <div id="" class="objectview-info-details-label">Going to</div>
	  <div id="" class="objectview-info-details-label-value">Kid's room</div>
	  <div id="" class="system-history-info">Last edited</div>
	  <div id="" class="system-history-info-value">22h ago</div>

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
