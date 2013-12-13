<?php

include_once('database.php');

class characteristics {
	
	public static $rows = array();
	
	public function __construct(){
		
	}
	
	public function getGeneralInfo($ID){
		$selectGeneralInfo = 'SELECT instName, address, city, state, zip, webAddress FROM generalInfo2012 WHERE instID = :ID ';
		$results = $this->query($selectGeneralInfo, $ID);
		return $results;
	}
	public function instChar($ID){
		
		//session_start();
	    $select = 'SELECT g.instName, f.*, a.* FROM finance2011 f INNER JOIN aid2012 a ON f.instID=a.instID 
	    	INNER JOIN generalInfo2012 g ON a.instID = g.instID WHERE f.instID = :ID ';
		 $results = $this->query($select, $ID);
		self::$rows = $results;
		return $results;
	
	}

	public function query($select, $ID){
		$db = database::getDB(); 
		$STH = $db->prepare($select);
		$STH->bindParam(':ID', $ID);
		$STH->execute();
		$STH->setFetchMode(PDO::FETCH_ASSOC); 
		$results = $STH->fetchAll();
		return $results;
	}
	
	public static function setup($results){
		
		foreach($results as $k=>$sub){
							
			$name= $sub['instName'];
			unset($results[$k]['instName']);			
		}
		
		return $name;
	}
}

?>