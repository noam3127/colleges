<?php
include_once('database.php');
//include_once('userSelect.php');

class search {
	
	public static function select(){
		session_start();
		
		if(isset($_POST['instName'])){
		
		$instName = '%'. $_POST['instName'] . '%';	
		$instName_1 = $_POST['instName'] . '%';
		$instName_2 = '% '. $_POST['instName'] . '%';	
		if(!empty($_POST['state'])){
			$state = $_POST['state'];
			$select = self::stateSearch($state);
			
		}else
		    $select = 'SELECT instName,instID, state FROM generalInfo2011 WHERE instName LIKE :instName 
		     ORDER BY CASE WHEN instname LIKE :instName_1 THEN 1 WHEN instName LIKE :instName_2 THEN 2 ELSE 3 END LIMIT 700';
		}

		$db = database::getDB();
		$STH = $db->prepare($select);
		$STH->bindParam(':instName', $instName);
		$STH->bindParam(':instName_1', $instName_1);
		$STH->bindParam(':instName_2', $instName_2);
		if(isset($state)){
			$STH->bindParam(':state', $state);
		}
		
		$STH->execute();
		$STH->setFetchMode(PDO::FETCH_ASSOC);  
	
		$results = $STH->fetchAll();
		
		foreach ($results as $k=>$v ){
			 $results[$k] ['institution'] = $results[$k] ['instName'];
			 $results[$k] ['ID'] = $results[$k] ['instID'];
			 $results[$k] ['State'] = $results[$k] ['state'];
			  unset($results[$k]['state']);
			  unset($results[$k]['instID']);
			  unset($results[$k]['instName']);
		}	 
			
			return $results;
		}
		
	public static function stateSearch($state){
		
		$select = 'SELECT instName,instID, state FROM generalInfo2011 WHERE instName LIKE :instName AND state = :state 
		     ORDER BY CASE WHEN instname LIKE :instName_1 THEN 1 WHEN instName LIKE :instName_2 THEN 2 ELSE 3 END LIMIT 700';
			 
		 return $select;
	}	
}
	
?>