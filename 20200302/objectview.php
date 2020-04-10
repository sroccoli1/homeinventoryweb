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

	------------------------------UP--------------------------

	-********************************************************************************
	<!--Go back button and photo carousel -->
	<div class="" id="">

		<!-- A GO BACK button -->
	    <!--  Caution : id used by JS script // not at the moment-->
		<a class="goback" id="objectview-goBackButton" href="livesearchview.php" onclick="">
			<i class="fas fa-arrow-left searchview-topbar-goback"></i>
		</a>

	    <!--Search
		See https://www.w3schools.com/howto/howto_js_slideshow.asp-->
		<div class="slideshow-container">

			<div class="mySlides fade">
			  <img src="img_nature_wide.jpg" style="width:100%">
			</div>

			<div class="mySlides fade">
			  <img src="img_snow_wide.jpg" style="width:100%">
			</div>

			<div class="mySlides fade">
			  <img src="img_mountains_wide.jpg" style="width:100%">
			</div>

			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>

		</div>
		<br>

		<div style="text-align:center">
		  <span class="dot" onclick="currentSlide(1)"></span>
		  <span class="dot" onclick="currentSlide(2)"></span>
		  <span class="dot" onclick="currentSlide(3)"></span>
		</div>
	</div>


	<!--*****************************************************************************

	<!------------------------------OBJECT INFO SECTION------------------------

	<!---***************************************************************************-->
	<div class="" id="objectview-info">
		
		<!-- Name  -->
		<div class="" id="objectview-info-name" href="#" onclick="">Name</div>

		<!-- Weight and price  -->

	    <!-- Last edited time -->
		
	    <!-----------------Object Description--------------------->
	    <div class="" id="objectview-info-description" action="">
		Description</div>
		
		<div class="" id="objectview-info-edit-butttons" action="">
			<button id="objectview-edit-buttton" class="" onclick="">Forward<i class="fa fa-share" aria-hidden="true"></i></button>
			<button id="objectview-edit-buttton" class="" onclick="">Save<i class="fa fa-flag" aria-hidden="true"></i></button>
			<button id="objectview-edit-buttton" class="" onclick="">Edit<i class="fa fa-pencil" aria-hidden="true"></i></i></button>
		</div>
		
		<!-----------------Object Details-------------------------->
		<div id="objectview-info-details" class="">Details</div>

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
