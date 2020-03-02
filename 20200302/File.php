<!--
Project: Short PLCS PHP Implementation                                                                                                                                                                                                                         
Started  : 2019, oct 13
From : http://www.plcs.org/plcslib/plcslib/data/PLCS/psm_model/model_base.html

PURPOSE: 
Learn bases of object oriented programming how to : 
- call classes, create objects,
- use inherance, ploymorphism, encapsulation,
- implement Interface and abstract class

=== THIS IS THE FILE CLASS
SysLM block diagram http://www.plcs.org/plcslib/plcslib/data/PLCS/psm_model/images/SysML_Block_Definition_Diagram__Diagrams__Document.png
-->

<?php
include 'ReferenceData.php';
include 'Identifier.php';
// ExternalItem.php is not yet ready
// include 'ExternalItem.php';

/* 
  Definition:
  A File is a file stored on a computer system or in a stack of non-digital documents.
*/
abstract class File_
{
	/******************************************************************************

	/*-------------------------------------Properties----------------------------------

	/************************************************/	

	
	/* * * * * * * Parts properties * * * * * * */
	
	//id [0..*] : Identifier ; a set of Identifiers for the File
	private $id;
	
	// versionIds [0..*] : Identifier ; a set of version identifiers for the File.
	private $versionIds;
	
	//description [0..*] : Descriptor : a set of text based descriptions of the File.
	private $description ;
	
	// classifiedAs [0..*] : Classification: a reference to a class held externally to the exchange file that classifies this File This File is a member of the referenced class.
	private $classifiedAs;
	
	// containedDataType [0..1] : Classification : a string that provides information about the kind of data stored in the file. The value of this attribute need not be specified.
	private $containedDataType;
	
	
	/* * * * * * * References properties * * * * * * */
 
	// locations [0..*] : ExternalItem : the identification of the File in a an external file management system.
	private $locations;
	
	/******************************************************************************

	/*-------------------------------------Functions----------------------------------

	/************************************************/	
	
	public function __construct()
    {
        $this->id = new Identifier();
    }
	public function get_id()
	{
		//write here to get
	}
	public function set_id(){
		//write here to set
	}
	public function get_description()
    {
        return $this->description;
    }
    public function set_description($descr)
    {
        $this->description = $descr;
    }
    public function get_classifiedAs()
    {
        return $this->classifiedAs;
    }
    public function set_classification($classification)
    {
        $this->classifiedAs = $classification;
    }
	public function get_containedDataType()
    {
        return $this->containedDataType;
    }
    public function set_containedDataType($type)
    {
        $this->containedDataType = $type;
    }
	
	/* * * * * * * Get & Set locations reference properties * * * * * * */
 
	public function get_locations()
    {
		//write here to return 
    }
    public function set_containedDataType($type)
    {
		//write here to set
    }

}
?> 