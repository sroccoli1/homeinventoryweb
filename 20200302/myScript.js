/* InternalFileName: myScript.js
/* Project: Home Inventory Helper
/* Version : 0.1
/* Branch : 2
/* Last updated : 2019_08_02_18_18
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
window.onclick = function(e) {
  if (!e.target.matches('.searchview-filters-settings-dropbtn-js')) {
  var myDropdown = document.getElementById("cardboardSearch-filterBar-filterSettings-contents-js");
	if (myDropdown.classList.contains('searchview-filters-dropdown-content-show-js')) {
	  myDropdown.classList.remove('searchview-filters-dropdown-content-show-js');
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
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
	if (myDropdown.classList.contains('show')) {
	  myDropdown.classList.remove('show');
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

function showResultAfterSuggestion() {
	console.log("showResultAfterSuggestion()");
	var valueSelected = document.getElementById("livesearch-input").value; //This gets the current topbar height
	console.log("valueSelected : "+ valueSelected);
}


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
  xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	  document.getElementById("liveresults").innerHTML=this.responseText;
	  document.getElementById("liveresults").style.border="1px solid #A5ACB2";
	}
  }
  xmlhttp.open("POST","liveresults.php",true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("q=" + str);
}