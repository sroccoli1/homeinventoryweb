/* InternalFileName: myScript.js
/* Project: Home Inventory Helper
/* Version : 0.1
/* Branch : 2
/* Last updated : 2020_04_10_07_48
*/

/*****************************************************************************

/*------------------------------Set forms below the topbar------------------------

/*****************************************************************************/

/* This is useful to position the form below the topbar.
	It should be used just after  loading screen and when  resizing the screen.  
*/
function setHomePageUnderTopBar() {
	console.log("'setHomePageUnderTopBar()");
	var topBarHeight = document.getElementById("myTopnav").offsetHeight; //This gets the current topbar height
	document.getElementById("homePageMainDiv").style.top = topBarHeight+'px';
}

/*****************************************************************************

------------------------------Set forms below the topbar------------------------

*****************************************************************************/
/* This is useful to position the form below the topbar.
	It should be used just after  loading screen and when  resizing the screen.  
*/
function setFormUnderTopBar() {
	console.log("'setFormUnderTopBar()");
	var topBarHeight = document.getElementById("myTopnav").offsetHeight; //This gets the current topbar height
	document.getElementById("recordNewCardboard").style.top = topBarHeight+'px';
}


/*****************************************************************************

------------------------------Open and Close Menu Sidenav------------------------

*****************************************************************************/

//Resizing the window should be "listened". The sidenav should react responsively when resizing. 

/*Caution : Browser compatibility : window.innerWidth is not compatible with all browser*/

function openMenuSideBar() {
	/**
	-------Logic :
	When the page is loaded the sidebar is hidden.
	Unhide the sidebar and open (=>resize it)
	
	-------Detailed Logic:
	Listen 
	If the browser inner window is not bigger than limitSizeForMobile 
		==> then set the menu side bar width equal to the limitSizeForMobile
	If the browser inner window is bigger than limitSizeForMobile and not bigger than limitSizeForTablet
		==> then set the menu side bar width equal to the limitSizeForTablet
	If the browser inner window is bigger than limitSizeForTablet
		==> then set the menu side bar width equal to 20%
	*/
	
	var isSidebarVisible = ""; //status of the sidenav (=visible/hidden) for debugging/maintenance purpose
	
	//Unhide the bar
	document.getElementById("myMenuSideBar").style.visibility = "visible";
	isSidebarVisible = document.getElementById("myMenuSideBar").style.visibility;
	console.log("Is myMenuSideBar visible ? "+ isSidebarVisible);
	
	/* If the browser inner window is bigger than limitSizeForTablet
		==> then set the menu side bar width equal to 20% */
	if(window.matchMedia("(min-width:700px)").matches){
		console.log("window is greater than 700px wide");
		document.getElementById("myMenuSideBar").style.width = "20%";
	}
	/* If the browser inner window is bigger than limitSizeForMobile and not bigger than limitSizeForTablet
		==> then set the menu side bar width equal to the limitSizeForTablet*/
	else if(window.matchMedia("(min-width:400px)").matches){
		console.log("window is greater than 400px wide");
		document.getElementById("myMenuSideBar").style.width = window.innerWidth;
	}
	/* If the browser inner window is not bigger than limitSizeForMobile 
		==> then set the menu side bar width equal to the limitSizeForMobile*/
	else {
		document.getElementById("myMenuSideBar").style.width = window.innerWidth;
	}
}
function closeMenuSideBar() {
  var isSidebarVisible = "";
  document.getElementById("myMenuSideBar").style.width = "0";
  //Hide the bar
  document.getElementById("myMenuSideBar").style.visibility = "hidden";
  isSidebarVisible = document.getElementById("myMenuSideBar").style.visibility;
  console.log("Is myMenuSideBar visible ? "+ isSidebarVisible);
}
/*****************************************************************************

------------------------------Resize sidenav when opened------------------------

*****************************************************************************/
function resizeOpenedSidenav(){
	console.log("entered resizeOpenedSidenav()");
	var isSidebarVisible = "";
	isSidebarVisible = document.getElementById("myMenuSideBar").style.visibility;
	if('visible' == isSidebarVisible){
		openMenuSideBar();
	}
}
/*****************************************************************************

/*--------------------Re-arrange topbar when resizing------------------------

/****************************************************************************/
/* Mobile design first : 
- if the screen width is under 400px, topbar is only one column (1) : Menu, Home, Search, [...] are displayed in letters on separated rows. 
- if the screen width is over 400px : topbar is only one row (1), with Menu, Home, Search, [...] are displayed as icons. 
(1) covered by CSS media query

Development : 
1. if the screen width is under 400px : Menu, Home, Search, More links icons are not displayed (invisible) and link text are displayed by adding the text. 
2. if the screen width is over 400px : Menu, Home, Search, More links icons are visible so links text are not dislayed by modifying/adding txt. 
*/

function rearrangeTopbar(){
	console.log("entered rearrangeTopbar()");
	// Implements 1.
	if(window.matchMedia("(min-width:400px)").matches){
		console.log("window is greater than 400px wide");
		document.getElementById("sideMenuBarOpenBtn").innerHTML = "<i class=\"fa fa-bars\">";
		document.getElementById("homePageBtn").innerHTML = "<i class=\"fa fa-home\">";
		document.getElementById("topBarSearchBtn").innerHTML =  "<i class=\"fa fa-search\">";
		document.getElementById("topNavRelativeMenuDropButton").innerHTML = "<i class=\"fa fa-ellipsis-v\">";
	}
	else {
		console.log("window is greater than 400px wide");
		document.getElementById("sideMenuBarOpenBtn").innerHTML = "Menu";
		document.getElementById("homePageBtn").innerHTML = "Home";
		document.getElementById("topBarSearchBtn").innerHTML =  "Search";
		document.getElementById("topNavRelativeMenuDropButton").innerHTML = "More";
	}
}
/*****************************************************************************

/*----------------Open and Close Object Search Filter Settings Menu-----------

*****************************************************************************/
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function showSearchFiltersSettingsAtClick(){
	document.getElementById("cardboardSearch-filterBar-filterSettings-contents-js").classList.toggle("searchview-filters-dropdown-content-show-js");
	console.log("showSearchFiltersSettingsAtClick()");
}
// Close the dropdown if the user clicks outside of it
function closeSearchFiltersAtClickOutside(){
	window.onclick = function(e) {
	  if (!e.target.matches('.searchview-filters-settings-dropbtn-js')) {
	  var myDropdown = document.getElementById("cardboardSearch-filterBar-filterSettings-contents-js");
		if (myDropdown.classList.contains('searchview-filters-dropdown-content-show-js')) {
		  myDropdown.classList.remove('searchview-filters-dropdown-content-show-js');
		}
	  }
	}
}
/*****************************************************************************

/*---------------------------Open and Close TopNav Relative Menu

*****************************************************************************/
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function showDropdownAtClick(){
	document.getElementById("myDropdown").classList.toggle("show");
	console.log("showDropdownAtClick()");
}
// Close the dropdown if the user clicks outside of it
function closeDropdownAtClickOutside(){
  window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
	  var myDropdown = document.getElementById("myDropdown");
	  if (myDropdown.classList.contains('show')) {
	    myDropdown.classList.remove('show');
	  }
    }
  }
}

/*****************************************************************************

/*----------------Toggle the forms label 

*****************************************************************************/
/*Depending on the screen size the forms label are removed (or normally displayed).*/


/*****************************************************************************

/*----------------Show the results after selecting a suggestion 

*****************************************************************************/
/*Depending on the screen size the forms label are removed (or normally displayed).*/

// function showResultAfterSuggestion() {
	// console.log("showResultAfterSuggestion()");
	// var valueSelected = document.getElementById("livesearch-input").value; //This gets the current topbar height
	// console.log("valueSelected : "+ valueSelected);
// }


/*****************************************************************************

/*----------------Suggests a search result 

*****************************************************************************/

function showSuggestions(str) {
  console.log("showSuggestions()");
  if (str.length==0) {
	document.getElementById("livesearch").innerHTML="";
	document.getElementById("livesearch").style.border="0px";
	return;
  }
  if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	  document.getElementById("livesearch").innerHTML=this.responseText;
	  document.getElementById("livesearch").style.border="1px solid #A5ACB2";
	}
  }
  xmlhttp.open("POST","livesearch.php",true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("q=" + str);
}

/*****************************************************************************

/*----------------Display a search result 

*****************************************************************************/
/* Note: Only one result at a time unfortunately */

function showResultsAfterSuggestions(str) {
  console.log("showResultsAfterSuggestions()");
  if (str.length==0) {
	document.getElementById("liveresults").innerHTML="";
	document.getElementById("liveresults").style.border="0px";
	return;
  }
  if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	/* xmlhttp.addEventListener("progress", updateProgress);
	xmlhttp.addEventListener("load", transferComplete);
	xmlhttp.addEventListener("error", transferFailed);
	xmlhttp.addEventListener("abort", transferCanceled); */

  xmlhttp.onreadystatechange=function() {
    var text = "";
	if (this.readyState==4 && this.status==200) {
	  text = '{ "cardboard" :[' + this.responseText +']}';
	  console.log("text",text );
	  
	  var data = JSON.parse(text);
	  var formatteddata ="";//for table formatting
	  
	  if(window.matchMedia("(min-width:400px)").matches){
	    console.log("window width is over 400px");
	  
	    formatteddata = "<table id='object-overview-table'>"+"<tr><th></th><th>Id</th><th>Name</th><th>Weight</th><th>Handling</th></tr><tr><td><a id='view-object-button' onclick='toggleObjectView();'><i style='font-size:24px' class='fas'>&#xf49e;</i></a></td><td id='object-overview-table-td-id'>" + data.cardboard[0].id + "</td><td id='object-overview-table-td-name'>" + data.cardboard[0].name + "</td><td id='object-overview-table-td-weight'>" + data.cardboard[0].weight + "</td> <td id='object-overview-table-td-handling'>" + data.cardboard[0].handling + "</td></tr><tr><td 'object-overview-table-td-description'>" + data.cardboard[0].descrition + "</td><td 'object-overview-table-td-goingtoroom'>" + data.cardboard[0].goingToRoom + "</td></tr></table>";
	  }
	  else{
		formatteddata = "<table id='object-overview-table'>"+"<tr><th></th><th></th><th></th><th></th><th></th></tr><tr><td rowspan=3><a id='view-object-button' onclick='toggleObjectView();'><i style='font-size:24px' class='fas'>&#xf49e;</i></a></td><td id='object-overview-table-td-name'>" + data.cardboard[0].name + "</td><td id='object-overview-table-td-weight'>" + data.cardboard[0].weight + "</td></tr><tr><td 'object-overview-table-td-description'>" + data.cardboard[0].descrition + "</td><td id='object-overview-table-td-handling'>" + data.cardboard[0].handling + "</td></tr><tr><td id='object-overview-table-td-id'>" + data.cardboard[0].id + "</td><td 'object-overview-table-td-goingtoroom'>" + data.cardboard[0].goingToRoom + "</td></tr></table>";  
	  }
	  
	  document.getElementById("liveresults").innerHTML=formatteddata;
	  document.getElementById("liveresults").style.border="1px solid #A5ACB2";
	  
	  //rearrangeObjectOverviewTable(data);
	  
	  // Save the key/value paris in the web browser, for only one session (the data is deleted when the browser tab is closed).
	  if (typeof(Storage)!=="undefined"){
		// Store  
		sessionStorage.setItem("cardboard", text);
		// Retrieve
		var itemGotten = sessionStorage.getItem("cardboard");
		/* console.log("Item type: ", typeof(itemGotten));
		console.log("itemGotten : ", itemGotten); */
	  }else{
	    console.log("This browser cannot store data.");
	  }
	}
	
  }
  xmlhttp.open("POST","liveresults.php",true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("q=" + str);
}



/*****************************************************************************

/*----------------Animate a object view carousel 

*****************************************************************************/

// var slideIndex = 0;
// showSlides();

function showSlides() {
  var slideIndex = 0;
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 6000); // Change image every 2 seconds
}


/*****************************************************************************

/*-------------------- Re-arrange objet overview table when resizing ------------------------

/****************************************************************************/
/* Note: For Object View Only */

/* Mobile design first :
(A)If the table is already loaded, 
- 1) if the screen width is under 400px, table is displayed like this 
- 2) if the screen width is over 400px, table is displayed like this https://docs.google.com/presentation/d/1grmjEQGLNG2whgkbZI_GNA8WtDtWpykH0sp0LCP4kiY/edit#slide=id.g7815e9c42c_0_0
*/

function rearrangeObjectOverviewTable(){
  console.log("rearrangeObjectOverviewTable()");
  
  // This stored item is a JSON = string. It must be parsed into an object before using it. Stored previously sessionStorage.setItem();
  var cardboardretrieved = sessionStorage.getItem("cardboard");
  //console.log("Item type: ", typeof(itemGotten));
  //console.log("cardboardretrieved : ", cardboardretrieved);
  //console.log("cardboardretrieved type : ", typeof(cardboardretrieved));

  // Parsing JSON into an JS object before using it.
  // If 'null' is found replace with '(undefined)'
  var obj = JSON.parse(cardboardretrieved, function (key, value) { 
    if (value == null) { 
	return value = "(undefined)";
  }else{ 
	return value;
  }});

  // A: if there is a table id with 'object-overview-table'
  if(document.getElementById("object-overview-table")){
	
	if(window.matchMedia("(min-width:400px)").matches){
	  console.log("window width is over 400px");
	  
	  document.getElementById("object-overview-table").innerHTML = "<table id='object-overview-table'>"+"<tr><th></th><th>Id</th><th>Name</th><th>Weight</th><th>Handling</th></tr><tr><td><a id='view-object-button' onclick='toggleObjectView();'><i style='font-size:24px' class='fas'>&#xf49e;</i></a></td><td id='object-overview-table-td-id'>" + obj.cardboard[0].id + "</td><td id='object-overview-table-td-name'>" + obj.cardboard[0].name + "</td><td id='object-overview-table-td-weight'>" + obj.cardboard[0].weight + "</td> <td id='object-overview-table-td-handling'>" + obj.cardboard[0].handling + "</td></tr><tr><td 'object-overview-table-td-description'>" + obj.cardboard[0].descrition + "</td><td 'object-overview-table-td-goingtoroom'>" + obj.cardboard[0].goingToRoom + "</td></tr></table>";
	}
	else {
	 // table for mobile view
	  console.log("window width is under 400px");
	  document.getElementById("object-overview-table").innerHTML = "<table id='object-overview-table'>"+"<tr><th></th><th></th><th></th><th></th><th></th></tr><tr><td rowspan=3><a id='view-object-button' onclick='toggleObjectView();'><i style='font-size:24px' class='fas'>&#xf49e;</i></a></td><td id='object-overview-table-td-name'>" + obj.cardboard[0].name + "</td><td id='object-overview-table-td-weight'>" + obj.cardboard[0].weight + "</td></tr><tr><td 'object-overview-table-td-description'>" + obj.cardboard[0].descrition + "</td><td id='object-overview-table-td-handling'>" + obj.cardboard[0].handling + "</td></tr><tr><td id='object-overview-table-td-id'>" + obj.cardboard[0].id + "</td><td 'object-overview-table-td-goingtoroom'>" + obj.cardboard[0].goingToRoom + "</td></tr></table>";  
	 }
  } 
}

/*****************************************************************************

/*--------------------View object button ------------------------

/****************************************************************************/
/* Note: For Object View Only */
/* Purpose : Toggle between hiding and showing the content of the object.

/*
Development : 
1. When the object result table is loaded, if the link <a id='view-object-button'> is clicked, the grid-area 'obj' becomes visible, if it is clicked again it hides it.
*/

function toggleObjectView(){
	var buttonClicked = document.getElementById("objectview-wrapper-js");
	console.log("entered toggleObjectView()");
	populateObjectView();
	if (buttonClicked.style.display === "none"){
	  buttonClicked.style.display = "block";
	}
	else {
	  buttonClicked.style.display = "none";
	}
	// document.getElementById(id).style.color="#6495ed"; //for changing the color of the button
}

/*****************************************************************************

/*--------------------Populate object view ------------------------

/****************************************************************************/
/* Note: For Object View Only */

function populateObjectView(){
	console.log("entered populateObjectView()");
	
	// This stored item is a JSON = string. It must be parsed into an object before using it. Stored previously sessionStorage.setItem();
	var cardboardretrieved = sessionStorage.getItem("cardboard");
	//console.log("Item type: ", typeof(itemGotten));
	//console.log("cardboardretrieved : ", cardboardretrieved);
	//console.log("cardboardretrieved type : ", typeof(cardboardretrieved));
	
	// Parsing JSON into an JS object before using it.
	// If 'null' is found replace with '(undefined)'
	var obj = JSON.parse(cardboardretrieved, function (key, value) { 
	  if (value == null) { 
		return value = "(undefined)";
	  }else{ 
		return value;
	  }});
	
	//console.log("object : ", obj);
	
	// If the screen width is over 400px
	  document.getElementsByClassName("objectview-title")[0].getElementsByTagName("h2")[0].innerHTML = obj.cardboard[0].name;
	  document.getElementById("objectview-info-details-description").innerHTML = obj.cardboard[0].descrition;
	  document.getElementById("objectview-info-details-items").innerHTML = obj.cardboard[0].items;
	  document.getElementById("objectview-info-details-handling").innerHTML = obj.cardboard[0].handling;
	  document.getElementById("objectview-info-details-state").innerHTML = obj.cardboard[0].state;
	  document.getElementById("objectview-info-details-room").innerHTML = obj.cardboard[0].goingToRoom;
	  document.getElementById("objectview-info-details-weight").innerHTML = obj.cardboard[0].weight;
}

/*****************************************************************************

/*-------------------- For Unit testing purpose ---------------------

/*********************************************************************


// progress on transfers from the server to the client (downloads)
// from https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/Using_XMLHttpRequest#Handling_responses
function updateProgress (oEvent) {
  if (oEvent.lengthComputable) {
    var percentComplete = oEvent.loaded / oEvent.total * 100;
    // ...
  } else {
    // Unable to compute progress information since the total size is unknown
  }
}

function transferComplete(evt) {
  console.log("The transfer is complete.");
}

function transferFailed(evt) {
  console.log("An error occurred while transferring the file.");
}

function transferCanceled(evt) {
  console.log("The transfer has been canceled by the user.");
}

function testFormatResults(){
  var json={"id": ["5e17195c54745"], "name": ["Deco Noel"], "items": [], "state": "NEW", "weight": 7, "document": null, "handling": "NORMAL", "descrition": null, "goingToRoom": null, "classifiedAs": ["CARDBOARD"]};
  
  return document.getElementById("p1").innerHTML = formatResults(json);
}

/*****************************************************************************

/*-------------------- For Unit testing purpose ---------------------

/****************************************************************************/
/* Note: For Object View Only */


/* @data param : JSON string parsed into a JS object. */	
/* function formatResults(data) {
  var listresult = "<table id='object-overview-table'>"+"<tr><th></th><th>Id</th><th>Name</th><th>Weight</th><th>Handling</th></tr><tr><td><a id='view-object-button' onclick='toggleObjectView();'><i style='font-size:24px' class='fas'>&#xf49e;</i></a></td><td id='object-overview-table-td-id'>" + data.id + "</td><td id='object-overview-table-td-name'>" + data.name + "</td><td id='object-overview-table-td-weight'>" + data.weight + "</td> <td id='object-overview-table-td-handling'>" + data.handling + "</td></tr><tr><td 'object-overview-table-td-description'>" + data.descrition + "</td><td 'object-overview-table-td-goingtoroom'>" + data.goingToRoom + "</td></tr></table>";

  return listresult; 
} */

/* @data param : JSON string parsed into a JS object. */
/* function formatResultsSmallScren(data) {
  var listresult = "<table id='object-overview-table'>"+"<tr><td id='view-object-button'><a id='view-object-button' onclick='toggleObjectView();'><i style='font-size:24px' class='fas'>&#xf49e;</i></a></td><td id='object-overview-table-td-name'>" + data.name + "</td><td id='object-overview-table-td-weight'>" + data.weight + "</td></tr><tr><td id='object-overview-table-td-description'>" + data.descrition + "</td><td id='object-overview-table-td-handling'>" + data.handling + "</td></tr><tr><td id='object-overview-table-td-id'>" + data.id + "</td><td id='object-overview-table-td-goingtoroom'>" + data.goingToRoom + "</td></tr></table>";

  return listresult; 
} */


