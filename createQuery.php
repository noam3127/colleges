<?php
include_once('database.php');

class createQuery{
	
	private $baseSelect;
	
	public function __construct(){
		
		 $this->baseSelect = 'SELECT instName, instID, state FROM generalInfo2011 WHERE instName LIKE :instName 
		   ORDER BY CASE WHEN instname LIKE :instName_1 THEN 1 WHEN instName LIKE :instName_2 THEN 2 ELSE 3 END LIMIT 700';		
	}
	
	public function getBaseSelect(){
		 return $this->baseSelect;		 
	}
	
	public function getStateSelect(){
		
		$beginning = 'SELECT instName, instID, state FROM generalInfo2011 WHERE ';
		$stateCondition = 'state = :state AND ';
		$stateCondition = substr_replace($this->baseSelect, $stateCondition, strlen($beginning), 0);
		//print_r($stateCondition);
		return $stateCondition;
	}
}
//$obj = new createQuery;
//$obj->getStateSelect();
?>