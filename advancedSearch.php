<?php
include_once('database.php');
include_once('createQuery.php');
//include_once('userSelect.php');

class advancedSearch {
	
	public function select(){
		session_start();
		
		if(isset($_POST['instName'])){
		
		$instName = '%'. $_POST['instName'] . '%';	
		$instName_1 = $_POST['instName'] . '%';
		$instName_2 = '% '. $_POST['instName'] . '%';	
		
		$create = new createQuery;
		if(!empty($_POST['state'])){
			$state = $_POST['state'];
			$select = $create->getStateSelect();
			
		}else
		    $select = $create->getBaseSelect();
		}
//print_r($select);
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
			//print_r($results);
			return $results;
	}
	
}
	
?>