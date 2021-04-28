<html>
<!--Doctype html declaration prevents the sidebar to come back-->

<!--
Project: Home Inventory Helper
PURPOSE: It creates a form with controls, where user writes the cardboard name, set the weight and the room into it should go, the handling care and cardboard state.
-->
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/1e0bf4fd11.js" crossorigin="anonymous"></script>
		<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
		<title>Record New Cardboard</title>
	</head>
	
	<!--When body is resized sidenav is dynamically resized too-->
	<body onload="" onresize="">


		<?php require 'Cardboard.php';
		
		//Define variables and set to empty values
		$cardboardName = $cardboardDescription = $cardboardContent = $weight= $float_value_of_weight = $room = $handling = $state ="";
		
		$new_cardboard_input = new Cardboard();
		
		$cardboardNameErr = $cardboardContent = $handlingErr = $weightErr = null ;
		
		//cardboardUID to be added later
		
		/****** Improve this section to : 
		-create new cardboardUID It might be based on the last cardboardUID of the file/table.
		-delete cardboard with cardboardUID
		Possible solutions : SQL 
		*/
		
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
										USER INPUT VALIDATION SECTION
		* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		This section handles form, set required fields are filled and correct, and secure user input.*/

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  //User input check and Validation for $cardBoardName
		  if (empty($_POST["name"])) {
			$cardboardNameErr = "Name is required";
		  } else {
			$cardboardName = test_input($_POST["name"]);
			// check if cardboard name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$cardboardName)) {
			  $cardboardNameErr = "Only letters and white space allowed"; 
			}else{
				$new_cardboard_input = new Cardboard($cardboardName);
			}
		  }
		  
		  //User input processing for $cardboardDescription
		  if (!empty($_POST["description"])){
			$cardboardDescription = test_input($_POST["description"]);
			$new_cardboard_input->new_description($cardboardDescription);
		  }

		  /*Improve Input check and validation for $cardboardContent
		if (empty($_POST["cardboardContent"])) {
			$cardboardContent = "";
		  } else {
			$cardboardContent  = test_input($_POST["cardboardContent "]);
			// check if $cardboardContent only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$cardboardContent)) {
			  $cardboardContentErr = "Only letters and white space allowed"; 
			}
		  }*/
		  
		  //User input check and validation for $weight
		  if (!empty($_POST["weight"])) {
			$weight = test_input($_POST["weight"]);
			$float_value_of_weight = floatval($weight);
			// set_weight() check if weight syntax is valid (only positive numbers) aand return an error if not.
			$weightErr = $new_cardboard_input->set_weight($float_value_of_weight);
		  }

		  //User input for $handling	  
		  if (!empty($_POST["handling"])) {
			$handling = test_input($_POST["handling"]);
			$new_cardboard_input->set_handling($handling);
		  }
		  
		  		  //User input for $state	  
		  if (!empty($_POST["state"])) {
			$state = test_input($_POST["state"]);
		  	$new_cardboard_input->set_state($state);
		  }
		  
		  // Improve input check and validation for $room
		  /* 		  
		  if (!empty($_POST["room"])) {
			$room = test_input($_POST["room"]);
		  } 
		  */
		  
		  
		  
		  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
							DISPLAY INPUT VALUES SECTION & SAVE TO DB JSON FORMAT 
							(After validation)
		  * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

		  if($new_cardboard_input->get_name() != null){
			if(($cardboardNameErr && $cardboardContent && $handlingErr && $weightErr) == null){
			  //echo "errors:\n". $cardboardNameErr . "\n". $cardboardContent . "\n". $handlingErr . "\n". $weightErr . "\br";
		  	  echo "<br><h2 class=\"devpurpose\">Your Input:</h2>";
			  $jsontobeinserted = json_encode($new_cardboard_input, JSON_PRETTY_PRINT);
			  echo "<div> New cardboard :<br>" . $jsontobeinserted . "</div>"; 
			
			  
			  // insert to mysql json db
			  include 'db.php';

			  
			  // $servername = "localhost:3307";
			  // $username = "root";
			  // $password = "";
			  // $dbname = "myDBPDO";


			  try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);				
				// set the PDO error mode to exception	
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				// Check if the table exist
				
				$sql = "SELECT 1 FROM Cardboard LIMIT 1";
				$stmt = $conn->prepare($sql); 
				// use exec() because no results are returned
				$stmt->execute();
				
				// If the table exists then insert
				 
				$sql = "INSERT INTO Cardboard VALUES ('$jsontobeinserted')";
				$stmt = $conn->prepare($sql);
				
				$stmt->execute();
				echo "<br>This new " . $new_cardboard_input->get_classifiedAs()[0] . " was successfully saved! "; 
			  }
				
			  // If the table does not exist (error code 42S02), then create it.
				
			  catch(PDOException $e){
				echo $sql . "<br>" . $e->getMessage() . "<br> code: " . $e->getCode();
				$errorcode = $e->getCode();
				var_dump($errorcode);
				if ($errorcode == '42S02'){
					//create table
					echo "<br>If the table does not exist then create it.";
					$sql = "CREATE TABLE Cardboard (jdoc JSON)";
					$stmt = $conn->prepare($sql); 
					$stmt->execute();
				}// creating table ends here
			  }// exception handling ends here
			  $conn = null;
			}// DB insert ends here
		  } // 2nd condtion ends here
		} // 1st condition ends here
		
		// If the user add a space or tab, newline, backslashes(\), they should be removed. Trim() and stripslashes() remove them. Hackers might exploit $_SERVER["PHP_SELF"] by adding scripts in the user fields (Cross-site Scriting attack). htmlspecialchars() means to avoid this.
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		?><!--End of user input validation-->
		

		<div 
			id="form-section-topbar-brand-logo" 
			class="form-section-topbar-brand-logo">
			<i class='fas fa-box-open'>
			</i>
				Oh! My Move	
		</div>

		<!--* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
										FORM SECTION 
		* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *--> 

		<!--It creates a form with 4 controls, i.e. 2 textboxes, 2 option box 
		and a radio button, where user writes the cardboard name, 
		set the weight and the room into it should go, 
		the handling care and cardboard state.-->
		
		<form id="recordNewCardboard" 
			class="form-section" 
			method="post" 
			action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
		>
		
			<!--***************************************************************-->

			<!------------------New Cardboard Top Bar---------------------------->
		
			<!--**********************************************************************-->
			<!--A GO BACK button (=an arrow towards the left), a title, a SAVE button -->
			<!-- Caution : id used by JS script // not at the moment-->
			<div class="form-section-topbar" 
				id="newCardboardTopBar"
			>

			  <!-- A GO BACK button -->
			  <!--  Caution : id used by JS script // not at the moment-->
			  <a class="item1-goback" 
					id="newCardboardTopBarGoBackBtn" 
					href="homePage.php" 
					onclick=""
				>
					<i class="fas fa-arrow-left"></i>
			  </a>

			  <!--The title-->
			  <!--  Caution : id used by JS script // not at the moment-->
			  <div class="item2-title" 
					id="newCardboardTopBarTitle">
					New cardboard
			  </div>

			  <!--SAVE button -->
			  <!--  Caution : button id used by JS script  // not at the moment-->
			  <input class="item3-save" 
					type="submit" 
					name="submit" 
					value="SAVE"
				/>	
			</div>
			
			<!--*****************************************************************

			----------------New Cardboard Top Bar--------------------------
		
			**********************************************************************-->
			
			<h1 class="form-section-title">New Cardboard</h1>
			<div class="dev form-section-info">Pss! <br>The following properties are currently under development : Content, Room and Doc & Pictures. Sorry for the unconvenience.
				<label class="error form-section-info"><br>* required field</label>
			</div>
			<div class="form-section-main">

				<!--The cardboard get a global automatic Id number-->
				<label for="carboardId">Id </label>
				<!-- Inserted in 'value' the logic to generate a new unique* ID (*some limits)-->
				<input id="carboardId" class="record-form-input" type="text" name="carboardId" value="<?php echo $new_cardboard_input->get_ids('')[0]; ?>" placeholder="Id">		
				
				<!--User write a name onto this cardboard with a textbox.-->
				<label for="cardboardName">Name
					<span class="error">* <?php echo $cardboardNameErr;?></span>
				</label>
				<input id="cardboardName" class="record-form-input" type="text" name="name" value="<?php echo $cardboardName;?>" placeholder="Name *" autofocus required>
			
				<!--User write a description about this cardboard with a textbox.-->
				<label for="cardboardDescription">Description</label>
				<input id="cardboardDescription" class="record-form-input" type="text" name="description" value="<?php echo $cardboardDescription;?>" placeholder="Description">
	
			
				<label for="cardboardContent">Content
					<span class="error"></span>
				</label>
				<!--User select the items going to this cardboard with a list box or search field.-->
				<select id="cardboardContent" class="record-form-input" name="cardboardContent" required>
					<option value="placeholder">Content</option>
					<option value="item01">Towels</option>
					<option value="item02">Sam's clothes</option>
				</select>
				
				<label for="cardboardWeight">Weight
					<span class="error"><?php echo $weightErr;?></span>
				</label>
				<!--User sets cardboard weight.-->
				<input id="cardboardWeight" class="record-form-input" type="text" name="weight" value="<?php echo $weight;?>" placeholder="Weight (kg)">
				
				<label for="room">Room</label>
				<!--User sets the destination room with a list box.-->
				<select id="room" class="record-form-input" name="room">
					<option value="placeholder">Going to room...</option>
					<option value="living room">Living Room</option>
					<option value="kitchen">Kitchen</option>
					<option value="bedroom 01">Bedroom 01</option>
					<option value="bedroom 02">Bedroom 02</option>
				</select>
				
				<label for="document">Doc. & Pictures
				<!--User create a reference to documents and pictures describing this cardboard with a list box or search field.-->
				</label>
				<!-- insert here the control to select the existing documents and pictures-->
				<select id="document" name="document" class="record-form-input">
					<option value="placeholder">Files...</option>
					<option value="doc1">Towel Picture</option>
					<option value="doc2">Clothes picture</option>
				</select>
				
				<!--User sets the handling care with a listbox, by default normal handling.-->
				<label for="handling">Handling
					<span class="error"></span>
				</label>
				<select id="handling" class="record-form-input" name="handling">	
					<option value="0">Normal</option>
					<option value="1">Fragile</option>
				</select>
				
				<label for="cardboardState">State</label>
				<!--User sets the carboard state with a list box.-->
				<select id="cardboardState" class="record-form-input" name="state">
					<option value="1">New</option>
					<option value="2">Good</option>
					<option value="3">Used</option>
					<option value="4">Damaged</option>
				</select>
			

			<!-- Improve this section to add a message when going back you're about to cancel the record.-->
			<!--
			<button onclick="cancelRequest()">Cancel</button>
			<script>
			function cancelRequest(){
			  window.alert("You are about to loose all changes and go to the previous page. Are you sure?");"
			}
			</script>
			-->
		
			<?PHP
			/** Cardboard is always going to a room and have a state, and may be documented.
				Improve this section : 
				-to let the user add new rooms from here;
				-to let the user add new documents from here;
				-to let the user add new content from here;
				-to display discrete GUI control help notes
			**/
			if ( isset( $_POST["room"] ) ) {
			$room = $_POST["room"];
			}
			
			//$state = $_POST["state"];

			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
									DATA STORAGE SECTION 
			* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 

			Improves this section to save only if the fields are correctly filled.*/	

			////////////
			// SAVE TO FILE
			////////////
		
			/** This format the data to put in the storage.
			It separates (concatenates) the data with a comma.*/
			$data = $cardboardName . "," .
				$cardboardDescription . "," .
				//$cardBoardContent . "," . 
				$float_value_of_weight . "," . 
				$room . "," . 
				$handling . "," .
				$state
			;//

			//File in which the data is stored.
			$file = "file.csv" ; 

			//This adds the carboard contents to the last line of the file
			file_put_contents($file, $data . PHP_EOL, FILE_APPEND);
			
			///////////////////////////////  
			//
			// SAVE TO DB JSON FORMAT 
			//
			////// 1. CARDBOARD OBJECT
			//
			
			// if name is wrong, $new_cardboard_input->name is NULL
		
			//
			////// 2. INSERT INTO DB
			// no saving until mandatory fields*  are properly filled 
			// *:name, except weight than can be put later.
			

			//insert here the input type to cancel the recording->
			
			//might insert here code to redirect automatically to the previous the page->
			
			
			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
							DISPLAY INPUT VALUES SECTION 
							(for dev purpose only)
			* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

			
			?>
			</div>
		</form><!-- End smartphone / tablet look -->
	</body>
	
	<script src="myScript.js">    
		if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }</script>
</html>

