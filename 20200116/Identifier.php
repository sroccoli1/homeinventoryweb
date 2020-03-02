<!--
Project: Short PLCS PHP Implementation                                                                                                                                                                                                                         
Started  : 2019, oct 13
From : http://www.plcs.org/plcslib/plcslib/data/PLCS/psm_model/model_base.html

PURPOSE: 
Learn bases of object oriented programming how to : 
- call classes, create objects,
- use inherance, ploymorphism, encapsulation,
- implement Interface and abstract class

=== THIS IS THE IDENTIFIER CLASS
SysLM block diagram http://www.plcs.org/plcslib/plcslib/data/PLCS/psm_model/images/SysML_Block_Definition_Diagram__Diagrams__Identification.png
-->

<?php
include 'ReferenceData.php';
class Identifier implements JsonSerializable
{
	//idString [1] : IdentifierString: the alphanumeric string that represents an identifying name or code.
    private $idString;
	
	//role [1] : ClassSelect : the classification that defines the role of the identification. The possible classifications are subclasses of http://docs.oasis-open.org/plcs/ns/plcslib/v1.0/data/plcs/plcs-psm/refdata/plcs-psm#Identifier
	private $role ;
	
	/* 	Constraint: UR1
	Specification: (OCL2.0)
	Identifier::allInstances()->isUnique(Sequence{idString, role, identificationContext}) */
	
	/*Ap239Ap233Psm:IdentificationContextSelect)
	The context within which the identifier is unique. Typically an organization that "owns" the identifier.*/
	private $identificationContext;
	
	// OASIS:Classifier : Additional classification of the identifier
	private $classifiedAs;
    
	// in practice $role and $classifiedAs are from the same ReferenceData file
	public function __construct()
    {
		global $CLASSIF_IDENTIFIER;
        $this->idString = uniqid();
		$this->role = $CLASSIF_IDENTIFIER;
		// Missing here $identificationContext  
		// Missing here classifiedAs
    }
	
	public function jsonSerialize() {
        return [
		'idString' => $this->idString,
		'role' => $this->role,
		'identificationContext'=> $this->identificationContext,
		'classifiedAs'=> $this->classifiedAs		
		];
	}
	
    public function get_idString()
    {
        return $this->idString;
    }
    public function set_idString($id)
    {
        $this->idString = $id;
    }
    public function get_role()
    {
        return $this->role;
    }
    public function set_role($role)
    {
        $this->role = $role;
    }
	public function get_identificationContext()
	{
		return $this->identificationContext;
	}
	public function set_identificationContext($context)
	{
		$this->identificationContext = $context;
	}
}
?> 