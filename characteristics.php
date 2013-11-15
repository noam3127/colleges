<?php

include_once('database.php');

class characteristics{
	
	public function __construct(){
		if(isset($_REQUEST['inst'])){
			$ID = $_REQUEST['inst'];
			echo "hello $ID";
		}
		
	    $select = 'SELECT * FROM finance2011 f INNER JOIN aid2012 a ON f.instID=a.instID WHERE f.instID = :ID ';
		$db = database::getDB();
		$STH = $db->prepare($select);
		$STH->bindParam(':ID', $ID);
		$STH->execute();
		$STH->setFetchMode(PDO::FETCH_ASSOC); 
		$results = $STH->fetchAll();
		//print_r($results); 
		$this->showResults($results);
	}
	protected function showResults($results){
		
		echo "<table>
				<th><tr>";
					foreach($results as $sub){
						foreach($sub as $col=>$v){
							echo "<td> $col</td>";	
						}
					
					}
			echo "</tr></th>";
		foreach ($results as $k=>$v) {
			
			echo "<tr>";
			 foreach($v as $col=>$val){
	      
	  			 echo '<td>'. $val . '</td>';
			}		
		}	
		echo "</tr> 
				</table>"; 	
	}
}

$characteristics = new characteristics;
?>