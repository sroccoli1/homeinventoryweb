<?php
/*
Project: Home Inventory Helper
Project version : 0.1

PURPOSE:
Searches a DB table for names matching the search string and returns the result name (with id and weight)

HOW:
0 If there is any text sent from the JavaScript (strlen($q) > 0), the following happens:

1 Load the carboard names (+id +weight)
2 Loop through all the carboard names to find matches from the text sent from the JavaScript
3 Sets the correct url and title in the "$response" variable. If more than one match is found, all matches are added to the variable
4 If no matches are found, the $response variable is set to "no suggestion"

Inspired from w3schools AJAX PHP DB and LiveSearch tutorials https://www.w3schools.com/php/php_ajax_intro.asp


**** WARNING *****
HOW is it implemented
1 is actually : Fetch ALL. This should be optimized  it may  not work with big DB !
*/

// here : include BD connection parameters & connect to the BD
include 'db.php';

//get the q parameter from URL
$q=$_POST["q"];

//lookup all cardboard from the DB if length of q>0
if (strlen($q)>0) {
  $hint="";
  
  // here : get all carboard name, id, weight
  $sql = "SELECT jdoc FROM Cardboard";
  $stmt = $conn->prepare($sql); 
  $stmt->execute();
  //var_dump($stmt);
  // set the resulting array to associative
  // The data can then be fetched either using $stmt->fetch() and then looping through one row at a time, or all in one hit with the $stmt->fetchAll() function.
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //var_dump($rows); 
				/* array (size=2)
				  0 => 
					array (size=1)
					  'jdoc' => string '{"id": ["5e0d7b7de61eb"], "name": ["Nouvel An"], "items": [], "state": "NEW", "weight": 5, "document": null, "handling": "NORMAL", "descrition": null, "goingToRoom": null, "classifiedAs": ["CARDBOARD"]}' (length=202)
				  1 => 
					array (size=1)
					  'jdoc' => string '{"id": ["5e0d7b841dcea"], "name": ["Nouvel An"], "items": [], "state": "NEW", "weight": 5, "document": null, "handling": "NORMAL", "descrition": null, "goingToRoom": null, "classifiedAs": ["CARDBOARD"]}' (length=202)
				
				  2 => 
					array (size=1)
					  'jdoc' => string '{"id": ["5e17195c54745"], "name": ["Deco Noel"], "items": [], "state": "NEW", "weight": 7, "document": null, "handling": "NORMAL", "descrition": null, "goingToRoom": null, "classifiedAs": ["CARDBOARD"]}' (length=202)
				  3 => 
					array (size=1)
					  'jdoc' => string '{"id": ["5e171992f3ecd"], "name": ["Deco Paques"], "items": [], "state": "NEW", "weight": 5, "document": null, "handling": "NORMAL", "descrition": null, "goingToRoom": null, "classifiedAs": ["CARDBOARD"]}' (length=204)
				// NB : the table column name is now the array's key
				*/
  // var_dump($rows[0]); // array
  // var_dump($rows[0]['jdoc']); // string
  
   $obj = json_decode($rows[0]['jdoc']);
  // var_dump($obj); // object (stdClass)
  // echo "<br> obj name: ";
  // var_dump($obj->name[0]); //array (size=1)
						//0 => string 'Nouvel An' (length=9)
  
  // $sigle_arr_IdNameWeight = get_carboard_id_name_weight($obj); //array
  // print_r($sigle_arr_IdNameWeight);
  
  // HOW TO set a new carboard out of the row ?
  // Cardboard() = json_decode($rows[0]);
  
  /*****
  Find a cardboard name matching the search text
  ******/
  // Loop through all cardboard name : 
  // For each carboard name check if cardboard name 
  // matches the string $q
  // Caution string comparison
  
  //$i = 0;// init used just in the loop
  $rows_length = count($rows);
  //echo "<br>current length of \$rows: $rows_length.\n";
  for($i=0; $i < $rows_length ; $i++){ // $v is a string
	//var_dump($rows[$i]['jdoc']);
    //echo "<br>current value of \$rows[$i]['jdoc']: $rows[$i]['jdoc'].\n";
	$object = json_decode($rows[$i]['jdoc']);

	//$object_length = sizeof($object);
	//echo "<br>current length of \$object: $object_length.\n";
    foreach($object->name as $val){ //$val is a string
	  //echo "<br>current value of \$object->name: $val.\n";
	  if (stristr($val, $q)) {// if the name matches partly $q  
        if ($hint=="") { // initial $hint value
		  	$hint = formatResults($val,$object,"L" );
		} 
		else { // if updated $hint value 
		  	$hint = formatResults($val,$object,"L" );
        }
      }
	}
	//echo "<br>current value of \$i: $i.\n";
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;

/** 
* Return the result in a list formatted table or mosaic.
* @var object(sdtClass) $object = json_decode($rows[$i]['jdoc']);
* @var String $value : $object->name
* @var String $format : Mozaic or List 
*/
function formatResults($value, $object ,$format) {
	if($format=='L'){ 
		return "<table id='object-overview-table'>
						<tr>
						  <th></th>
						  <th>Id</th>
						  <th>Name</th>
						  <th>Weight</th>
						  <th>Handling</th>
						</tr>
						<tr>
						  <td>
						    <a id='view-object-button' onclick='toggleObjectView();'><i style='font-size:24px' class='fas'>&#xf49e;</i></a>"."
						  </td>
						  <td id='object-overview-table-td-id'>". $object->id[0] . "</td>
						  <td id='object-overview-table-td-name'>". $value . "</td>
						  <td id='object-overview-table-td-weight'>" . $object->weight . "</td> 
						  <td id='object-overview-table-td-weight'>" . $object->handling . "</td>
						</tr>
						<tr>
							<td 'object-overview-table-td-description'>". $object->descrition . "</td>
							<td 'object-overview-table-td-goingtoroom'>". $object->goingToRoom . "</td>
						</tr>
				</table>";
	}
	else if($format=='M'){ 
		return "<table>
						<tr>
							<td>". $value . "</td> <td>" . $object->weight . "</td> <td>" . $object->handling . "</td>
						</tr>
				</table>";
	}
}
?>
