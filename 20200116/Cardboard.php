<!--
Project: Home                                                                                        
Started  : 2019, dec 27

=== THIS IS THE CARDBOARD OBJECT


<?php
include 'ReferenceData.php';
require 'Product.php';
class Cardboard extends Product //implements JsonSerializable
{
	// Remember the inherited properties : 
	// $id, $name, $description, $classifiedAs, state, handling, goingToRoom; $document; $weight; $state; $handling;

	// Specific properties:
	// $items [0..*] : Item ; a set of Items
	private $items;
    

	/* Q1: should this use polymorphism? */
	public function __construct($myName = null)
    {
		global $CARDBOARD;
		if($myName != null){
			parent::__construct($myName);
		}
		else{
			parent::__construct();
		}
		$this->new_classification($CARDBOARD);
		//inherted proprety can't be modified like this; a setter must be used to do so.
		$this->items = [];
    }
	
	/* Return the full array items[] */
	public function get_items(){
		return $this->items;
	}

	/* Create a reference to an item (= add item id in $this->items) */
	public function set_items($item_id){
		$this->items[] = $item_id ;
	}

	/* ? Create a reference (= add item id in carboard table)
	public function set_items_db($item_id){
		//
	}*/

	/*
	// Purpose : Cardboard can create a reference to a new item or existing items
	public function items($item_id_list){
		//IF the item exists (= id found in the DB) then create a reference (= add item id in $this->items) ELSE display 'no reference to an item'
	} */
	
	public function jsonSerialize() {
		return [
		'id' => $this->get_ids(''),
		'name' => $this->get_name(),
		'descrition' => $this->get_description(),
		'classifiedAs' => $this->get_classifiedAs(),
		'state' => $this->get_state(),
		'handling' => $this->get_handling(),
		'weight' => $this->get_weight(),
		'goingToRoom' => $this->get_goingToRoom(),
		'document' => $this->get_document(),
		'items'=>$this->items
		];
	}
}

 
// Set_weight() set_Name() unit tests
/* 
$c1 = new Cardboard();
//var_dump($c1);
//$c1->set_weight(jf);
$json1 = json_encode($c1, JSON_PRETTY_PRINT);
echo "c1 :\n";
print($json1);
 */
/* $c1->set_name('jouet ame',0);
$json1 = json_encode($c1, JSON_PRETTY_PRINT);
echo "<div> c1 :<br>". $json1 . "</div>";  */


// formatting function unit tests 
/* 
$n1 = Cardboard::clean_input("fqpb ihf0jfk");
echo "test input " . $n1;
$v1 = Cardboard::test_format($n1);
echo "<div> test format </div>" . $v1;
 */
?> 