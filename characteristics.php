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
	    $select = 'SELECT g.instName, f.instID as ID, a.undergradTotal as "Total undergraduates", f.totalAssets as "Total Assets",
	    	f.totalLiab as "Total Liabilities", f.netAssets as "Net Assets", f.netTuitionFees as "Net amount of tuition and fees",
	    	f.totalRevIncome as "Net revenue and income", a.grantTotal as "Total amount of grants received",
	    	a.grantAvg as "Avg. grant amount per student", a.undergradPercentPell "Percent of undergrads receiving Pell grants",
	    	a.totalPell as "Total amount of Pell grants", a.avgPell as "Avg. Pell grant per undergrad",
	    	a.undergradPercentFed as "Percent of undergrads receiving Federal grants", a.totalFed as "Total federal grants",
	    	a.avgFed as "Avg. federal grant per undergrad" 
	    	FROM finance2011 f INNER JOIN aid2012 a ON f.instID=a.instID 
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