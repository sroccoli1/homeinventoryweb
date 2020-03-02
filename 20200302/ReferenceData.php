<!--
Project: PLCS PHP Implementation                                                                                                                                                                                                                         
Started  : 2019, oct 13
From : http://www.plcs.org/plcslib/plcslib/data/PLCS/psm_model/model_base.html

PURPOSE: 
Learn bases of object oriented programming how to : 
- call classes, create objects,
- use inherance, ploymorphism, encapsulation,
- implement Interface and abstract class

=== THIS IS THE REFERENCE DATA

Note : 
1. Class constants are allocated once per class, and not for each class instance.
ExternalClass instances cannot be declared as Class constants because we need to allocate + than once.

-->

<?php
/* Class URI:   http://docs.oasis-open.org/plcs/ns/plcslib/v1.0/data/plcs/plcs-psm/refdata/plcs-psm#Identifier
Class label: identifier
Definition:
name or code that is used to label something and to refer to that thing */
$CLASSIF_IDENTIFIER ='http://docs.oasis-open.org/plcs/ns/plcslib/v1.0/data/plcs/plcs-psm/refdata/plcs-psm#Identifier';
$ITEM = 'ITEM';
$CARDBOARD = 'CARDBOARD';

/* Object state enumerations */
$STATE_NEW = 'NEW';
$STATE_GOOD = 'GOOD';
$STATE_USED = 'USED';
$STATE_DAMAGED = 'DAMAGED';

/* Object handling enumerations */
$HANDLING_FRAGILE = 'FRAGILE';
$HANDLING_NORMAL = 'NORMAL';
//$WEIGHT = 'http://docs.oasis-open.org/plcs/ns/plcslib/v1.1/data/contexts/OASIS/refdata/plcs-rdl#Weight';
?> 