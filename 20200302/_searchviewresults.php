<?php
/*
Project: Home Inventory Helper
File Name : searchView.php
Version : 0.1                                                      
Branch : 1
Started  : 2019_07_30
Last updated : 2019_08_28
PURPOSE: 
This search page collects the cardboard data and display them.


<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<!-- Special icons fonts need to be fetch from here. -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<title>Cardboard search results</title>
	
		
	</head>
*/	
	include 'livesearchview.php';

	$search = $searchErr = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  //User input check and Validation for $cardBoardName
		  if (empty($_POST["search"])) {
			$searchErr = "A cardboard name is required";
		  } else {
			$search = test_input($_POST["search"]);
			// check if cardboard name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$search)) {
			  $searchErr = "Only letters and white space allowed"; 
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
	/*****************************************************************************

	<!------------------------------Results section------------------------

	<!---***************************************************************************-->
	*/
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
