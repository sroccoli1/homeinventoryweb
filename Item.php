<!--
Project: 

=== THIS IS THE ITEM CLASS
-->

<?php
include 'ReferenceData.php';
require 'Product.php';
class Item extends Product
{
	// Remember the inherited properties : 
	// $id, $name, $description, $classifiedAs, state, handling, goingToRoom; $document; $weight; $state; $handling;
    
	// should this use polymorphism?
	public function __construct($myName)
    {
		global $ITEM;
        parent::__construct($myName);
		$this->new_classification($ITEM);
		// $this->classifiedAs = $ITEM; //inherted proprety can't be modified like this; a setter must be used to do so.
		// $this->state = '' // this should take the value of the form, right?
    }
}

$i1 = new Item('Dishwasher');
print_r($i1->get_ids(TRUE));
$json1 = $i1->jsonSerialize();
echo "<br> i1 :\n";
var_dump($json1);
?> 