<!--
Project: Short PLCS PHP Implementation                                                                                                                                                                                                                         
Started  : 2019, oct 13
From : http://www.plcs.org/plcslib/plcslib/data/PLCS/psm_model/model_base.html

PURPOSE: 
Learn bases of object oriented programming how to : 
- call classes, create objects,
- use inherance, ploymorphism, encapsulation,
- implement Interface and abstract class

=== THIS IS THE DOCUMENT CLAS
SysLM block diagram http://www.plcs.org/plcslib/plcslib/data/PLCS/psm_model/images/SysML_Block_Definition_Diagram__Diagrams__Product.png
-->

<?php
include 'ReferenceData.php';
require 'Product.php';
class Document extends Product
{
	// Remember the inherited properties : 
	// $id, $name, $description, $classifiedAs, state, handling, goingToRoom; $document; $weight; $state; $handling;
    
	private $digitalFile; 
	
	public function __construct($myName)
    {
        parent::__construct($myName);
    }
	public function get_digitalFile()
	{
		//write here to return digitalFile
	}
	public function set_digitalFile(){
		//write here to return digitalFile
	}
}
?> 