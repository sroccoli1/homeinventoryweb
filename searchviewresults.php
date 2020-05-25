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
