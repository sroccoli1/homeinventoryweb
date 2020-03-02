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
		
		<script>
		function showResult(str) {
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
		</script>
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
		<form class="searchview-topbar-form" id="cardboardSearch-searchBar-searchInput" role="search" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
			<input type="search" class="searchview-topbar-input"  
			name="search" 
			placeholder="&#xf002; Cardboard name..."
			aria-label="Search carboard through site content"
			onkeyup="showResult(this.value)">
			
			<button class="searchview-topbar-delete" id="cardboardSearch-searchBar-deleteBtn"><i class="fa fa-times"></i></button>
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
		<div class="searchview-filters-settings" id="cardboardSearch-filterBar-filterSettings" action="">
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
	
	<div id="cardboardSearch-results" class="searchview-results">
	
		<?php
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
						USER INPUT VALIDATION SECTION
		* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		This section handles form, set required fields are filled and correct, and secure user input.*/
		
		$cardboardName = $cardboardNameErr = ""; 
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  //User input check and Validation for $cardBoardName
		  if (empty($_POST["search"])) {
			$cardboardNameErr = "Carboard name is required";
		  } 
		  else {
			$cardboardName = test_input($_POST["search"]);
			// check if cardboard name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$cardboardName)) {
			  $cardboardNameErr = "Only letters and white space allowed"; 
			}
		  }
		} 
		
		// If the user add a space or tab, newline, backslashes(\), they should be removed. Trim() and stripslashes() remove them. Hackers might exploit $_SERVER["PHP_SELF"] by adding scripts in the user fields (Cross-site Scriting attack). htmlspecialchars() means to avoid this.
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}		
		
		include 'db.php';

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT jdoc FROM Item";
			$stmt = $conn->prepare($sql); 
			// use exec() because no results are returned
			$stmt->execute();
			
			echo "fetching done" ;
			// set the resulting array to associative
			// The data can then be fetched either using $stmt->fetch() and then looping through one row at a time, or all in one hit with the $stmt->fetchAll() function.
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			//var_dump($rows);
			//print_r($rows);
		}
		catch(PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
		}

		$conn = null;
		//This return an array of all the JSON objects of the Item table (1 column: JDOC)
		var_dump($rows);
		//this cannot be put straight to json_decode() which requires a string
		
		/*
		* Etsi tietokannasta pahvilaatikon tiedot ja näyttää sen tauluun.
		* 
		*/
		echo "search results";
		echo "<table>
				<tr>
				  <th>Name</th>
				  <th>Weight</th>
				  <th>Id</th>
				<tr>
				  <td>";
		echo $cardboardName;
		echo "</td>
				  <td></td>
				  <td></td>
				</tr>
			</table>";
		
		?>
	  
		<!--Cardboard01 picture-->
		<!---
		<div id="cardboardSearch-result-01" class="searchview-result">
			<a target="_blank" href="..\Pictures\userpicture.jpg" class="searchview-result-a">
				<img class="searchview-result-a-img" src="..\Pictures\userpicture.jpg" alt="Add missing cardboard picture">
				<i class="fas fa-glass-martini"></i>
				<i class="fas fa-weight-hanging"></i>
			</a>
			
			<!--Cardboard01 main information-->
			<!---
			<div id="cardboardSearch-results-result01Name" class="searchview-result-name">cardboard01Name</div>
			<div id="cardboardSearch-results-result01Price" class="searchview-result-price">cardboard01Price</div>
			<div id="cardboardSearch-results-result01Weight" class="searchview-result-weight">cardboard01Weight</div>
		</div>
		
		<!--Cardboard02 picture-->
		<!---
		<div id="cardboardSearch-result-02" class="searchview-result">
			<a target="_blank" href="..\Pictures\kitchen_boxes.jpg" class="searchview-result-a">
				<img class="searchview-result-a-img" src="..\Pictures\kitchen_boxes.jpg" alt="result kitchen boxes">
				<i class="fas fa-glass-martini"></i>
				<i class="fas fa-weight-hanging"></i>
			</a>	  
			<!--Cardboard02 main information-->
			<!---
			<div id="cardboardSearch-results-result02Name" class="searchview-result-name">cardboard02Name</div>
			<div id="cardboardSearch-results-result02Price" class="searchview-result-price">cardboard02Price</div>
			<div id="cardboardSearch-results-result02Weight" class="searchview-result-weight">cardboard02Weight</div>
		</div>
		
		<!--Cardboard03 picture-->
		<!---
		<div id="cardboardSearch-result-03" class="searchview-result">
			<a target="_blank" href="..\Pictures\userpicture.jpg" class="searchview-result-a">
				<img class="searchview-result-a-img" src="..\Pictures\userpicture.jpg" alt="Add missing cardboard picture">
				<i class="fas fa-glass-martini"></i>
				<i class="fas fa-weight-hanging"></i>
			</a>	  
			<!--Cardboard03 main information-->
			<!---
			<div id="cardboardSearch-results-result03Name" class="searchview-result-name">cardboard03Name</div>
			<div id="cardboardSearch-results-result03Price" class="searchview-result-price">cardboard03Price</div>
			<div id="cardboardSearch-results-result03Weight" class="searchview-result-weight">cardboard03Weight</div>
		</div>
		
		<!--CardboardXX picture + main information, etc.-->
		
	</div>
	</body>
	<script src="myScript.js"></script>
	<!-- This special icons font needs credentials called "Kit Code". -->
	<script src="https://kit.fontawesome.com/1e0bf4fd11.js"></script>
</html>
