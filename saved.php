<?php
include_once('database.php');

class saved {
	
	public static $comps=array();
	public $favorites=array();
	public $results=array();
	private $finance_formatted = array();
	public $aid=array();
	
	public function getFavorites(){
		$this->comps = $_SESSION['comp'];
		$db = database::getDB();
		$select = 'SELECT instName, instID, state FROM generalInfo2012 WHERE instID = :ID';
		$STH = $db->prepare($select);
		$STH->setFetchMode(PDO::FETCH_ASSOC); 
		
		foreach($this->comps as $ID) {
			$remove = "<button value = 'remove'>";
			$STH->bindParam(':ID', $ID);
			$STH->execute();
			$result = $STH->fetch();
			$this->favorites[] = $result; 
			
			
		}
		return $this->favorites;
	
	}
	
	public function getFinance(){	
		
	
		$db = database::getDB();
		$select = 'SELECT g.instName, f.* FROM generalInfo2012 g INNER JOIN finance2011 f ON g.instID = f.instID
				WHERE g.instID = :ID';
		$STH = $db->prepare($select);
		//print_r($this->comps);
		$STH->setFetchMode(PDO::FETCH_ASSOC); 
		
		foreach($this->comps as $ID) {
			$STH->bindParam(':ID', $ID);
			$STH->execute();
			$result = $STH->fetch();			
			$this->results[] = $result; 
			
			$finance_formatted = $result;	
			$i = 0;
			foreach($finance_formatted as $k => &$v){
				$i++;
				if($i > 2){
					$v = '$' . number_format($v);			
				}
				
			}
			
			$this->finance_formatted[] = $finance_formatted; 
				
		}
		$financeFields = array(array('Name','ID','Total assets','Total liabilities','Net assets',
			'Net amount of tuition and fees','Total amount of revenue and income'));
			
		$financeFields = array_splice($this->finance_formatted, 0,0, $financeFields);
		//print_r($this->finance_formatted);
		return $this->finance_formatted;
			
	}
	public function getAid(){
		
		$db = database::getDB();
		$select = 'SELECT g.instName, a.* FROM generalInfo2012 g INNER JOIN aid2012 a ON g.instID = a.instID
				WHERE g.instID = :ID';
		$STH = $db->prepare($select);
		//print_r($this->comps);
		$STH->setFetchMode(PDO::FETCH_ASSOC); 
		
		foreach($this->comps as $ID) {
			$STH->bindParam(':ID', $ID);
			$STH->execute();
			$result = $STH->fetch();
			$this->aid[] = $result; 
		}
	//print_r($this->results);
		return $this->aid;
	}
}
//$saved=new saved;
//$saved->getFinance();
?>