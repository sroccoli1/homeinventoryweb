<!--
Project: Short PLCS PHP Implementation                                                                                                                                                                                                                         
Started  : 2019, oct 13
From : http://www.plcs.org/plcslib/plcslib/data/PLCS/psm_model/model_base.html

PURPOSE: 
Learn bases of object oriented programming how to : 
- call classes, create objects,
- use inherance, ploymorphism, encapsulation,
- implement Interface and abstract class

=== THIS IS THE PRODUCT CLASS
SysLM block diagram http://www.plcs.org/plcslib/plcslib/data/PLCS/psm_model/images/SysML_Block_Definition_Diagram__Diagrams__Product.png
-->

<?php
include 'ReferenceData.php';
require 'Identifier.php';
/* 
  Definition:
  A Product is the identification of a product or of a type of product. It is a collector of data common to all revisions of the Product.
*/
class Product implements JsonSerializable
{
	/******************************************************************************

	/*-------------------------------------Properties----------------------------------

	/************************************************/	

	/* * * * * * * Parts properties * * * * * * */
	
	//id [1..*] : Identifier ; a set of Identifiers for the Product
    private $id;
	
	// name [0..*] : Name 
	private $name;
	
	// description [0..*] : Descriptor ; a set of text based descriptions of the Product.
	private $description ;
	
	// classifiedAs [0..*] : Classification ; a reference to a class held externally to the exchange file that classifies this Product This Product is a member of the referenced class.
	private $classifiedAs;
	
	// state [1] : Classification 
	private $state;
	
	// handling [1] : Classification 
	private $handling;
	
	// weight [0..1] : NumericalValue ;
	private $weight;
	
	/* * * * * * * Reference properties * * * * * * */
	
	// goingToRoom [0..1] : 
	private $goingToRoom;
	
	// document [0..*] : Document
	private $document;
	
	/******************************************************************************

	/*-------------------------------------Functions----------------------------------

	/************************************************/	
    
	/* Build a product with at least those 3 properties : 
		id, name and state */
	public function __construct($myName=null)
    {	
	// 3 properties : id, name and state
		global $STATE_NEW, $HANDLING_NORMAL;
		$id01 = new Identifier();
		$this->id = array($id01);
		$this->state = $STATE_NEW;
		$this->handling = $HANDLING_NORMAL;
		if($myName != null){
			$this->name[]= $myName;
		}
    }
		
	public function jsonSerialize() {
		return [
		'id' => $this->id,
		'name' => $this->name,
		'descrition' => $this->description,
		'classifiedAs' => $this->classifiedAs,
		'state' => $this->state,
		'handling' => $this->handling,
		'weight' => $this->weight,
		'goingToRoom' => $this->goingToRoom,
		'document' => $this->document
		];
	}

	// Check user input and return the validated string
	public static function test_format($input){
		// check if cardboard name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$input)) {
			$Err = "<br> Only letters and white space allowed <br>";
			echo $Err;
		}
		else return $input;
	}
	
	// If the user add a space or tab, newline, backslashes(\), they should be removed. Trim() and stripslashes() remove them. Hackers might exploit $_SERVER["PHP_SELF"] by adding scripts in the user fields (Cross-site Scriting attack). htmlspecialchars() means to avoid this.
	public static function clean_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	/* Obsolete
	public function get_id()
    {
        return $this->id->get_idString();
    } 
	*/	
    
	// modify existing id of the current product
	public function set_id($newId, $index)
    {
        $this->id[$index] = $newId;
    }
	
	// Add a new id
	// at the end of the array
    public function new_id($newId)
    {	
		$this->id[]= $newId;
    }

	
	// return the last defined current id product
	// might use current — Return the current element in an array
	
	// get_ids (if $full = TRUE): Return the whole property all the id values in an array
	// get_ids (if $full = FALSE):Return only the id values in an array
	// might need 'array_values' — Return all the values of an array
	public function get_ids($full)
	{
		if($full == TRUE){
			return $this->id;
		}
		else{
			$pdt_ids = array();// initiate an empty array
			// For each id[] index, the Identifier's idString is put in an array
			foreach ($this->id as $id_index)
			{
				$pdt_ids[] = $id_index->get_idString();
				// $pdt_ids[] = $id_index  ;                       
			}
			// Return the array
			return $pdt_ids;
		}
	}	 

	/* might use : 
	in_array — Checks if a value exists in an array
	array_search — Searches the array for a given value and returns the first corresponding key if successful
	*/
	
	/**/
	public function in_ids($qid)
	{
		if (in_array($qid, $this->id, TRUE)) 
		{
			echo "this id was found with strict check\n";
		}
	}
	
	// remove the current product's specified id
	
	public function get_name()
    {
        return $this->name;
    }
	
	// modify one of the names
	// by finding the name the index of the name be to modified
    public function set_name($newName, $index)
    {
		if(is_int($index) && $index >= 0 && $index < sizeof($this->name)){
			$this->name[$index] = $newName;
		}
		else{
			echo "<div> parameter index value shall be an integer [0, ". sizeof($this->name) . "[</div>" ;
		}
    }
	
	// Add a new name
	// at the end of the array
    public function new_name($newName)
    {
		$this->name[]= $newName;
    }
	
	public function new_description($newDescription)
    {
		$this->description[]= $newDescription;
    }
	
	public function get_description()
    {
        return $this->description;
    }
	
    public function set_description($descr, $index)
    {
        $this->description[$index] = $descr;
    }
    
	public function get_classifiedAs()
    {
        return $this->classifiedAs;
    }
	
    public function set_classification($classification, $index)
    {
		$this->classifiedAs[$index] = $classification;
    }
	
	public function new_classification($newClassification)
    {
		$this->classifiedAs[]= $newClassification;
    }
	
	public function get_handling()
	{
		return $this->handling;
	}
	
	public function set_handling($handlingWay)
	{
		global $HANDLING_NORMAL, $HANDLING_FRAGILE ;
		if($handlingWay == 0){
				$this->handling = $HANDLING_NORMAL;
		}
		elseif($handlingWay == 1){
				$this->handling = $HANDLING_FRAGILE;
		}
		else{
			echo "Error value range. Please enter value 0 for normal handling or 1 for fragile handling.";
		}
	}
	
	public function get_state()
	{
		return $this->state;
	}
	
	public function set_state($nextState)
	{
		GLOBAL $STATE_NEW, $STATE_GOOD, $STATE_USED, $STATE_DAMAGED ;
		if($nextState == 1){ $this->state = $STATE_NEW; }
		elseif($nextState == 2){ $this->state = $STATE_GOOD; }
		elseif($nextState == 3){ $this->state = $STATE_USED; }	
		elseif($nextState == 4){ $this->state = $STATE_DAMAGED; }
		else{ echo "<div> Argument range error. Value should be :<br>1 for new state, <br>2 for good state, <br>3 for used state, <br>4 for damaged state </div>";
		}
	}
	
	public function get_weight()
	{
		return $this->weight;
	}
	
	public function set_weight($newWeight)
	{
		if(is_numeric($newWeight) && $newWeight > 0){
			$this->weight = $newWeight;
		}
		else{
			return "Weight value shall be a positive number.";
		}
	}
	
	public function add_weight($additionalWeight){
		if(is_numeric($additionalWeight)){
			$this->weight = $this->weight + $additionalWeight;
		}
		else{
			echo "\n Additional weight value shall be a number. \n";
		}
	}
	
	public function remove_weight($removedWeight){
		if(is_numeric($remove_weight)){
			$this->weight = $this->weight - $remove_weight;
		}
		else{
			echo "\n Removed Weight value shall be a number. \n";
		}
	}
	
	public function reset_weight(){
		$this->weight = NULL;
	}
	
	/* * * * * * * 
		Missing 
		setters & getters for : 
		Reference properties 
	* * * * * * */
	
	public function get_goingToRoom(){
		return $this->goingToRoom;
	}
	public function get_document(){
		return $this->document;
	}
}

// Set_weight() set_Name() unit tests

/* $c1 = new Product('Jouets');
//var_dump($c1);
// $c1->set_weight(0);
$json1 = json_encode($c1);
echo "<div> c1 :<br>". $json1 . "</div>"; 

$c1->set_name('jouet ame',0);
$json1 = json_encode($c1, JSON_PRETTY_PRINT);
echo "<div> c1 :<br>". $json1 . "</div>"; 
 */
?> 
