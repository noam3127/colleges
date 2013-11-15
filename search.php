<?php
include_once('database.php');
include_once('userSelect.php');

class search {
	public function __construct(){
		
		/*$host = 'localhost';
		$dbname = 'colleges';
		$user = 'root';
		$pass = 'qwerty';
	
		try {
   		    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Success!";
		} catch (PDOException $e) {

 		 echo $e->getMessage();
		}*/
		$instName = '%' .$_POST['instName'] . '%';
		$select = 'SELECT instName,instID, state FROM generalInfo2011 WHERE instName LIKE :instName ORDER BY instName LIMIT 70';
		$db = database::getDB();
		$STH = $db->prepare($select);
		$STH->bindParam(':instName', $instName);
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
		if (!empty($results)){	
			$this->showResults($results);
		}
		
	}
	public function showResults($results) {
		
		echo "<table>
	      <tr>
	      	<th>Institution</th>
	      	<th>ID</th>
	      	<th>State</th>
	      </tr>";
		foreach ($results as $k=>$v) {
			
			echo "<tr>";
			 foreach($v as $col=>$val){
	      
	  			?><td><a href=characteristics.php?inst=<?php echo  $results[$k]['ID'] ;?>><?php echo $val. "</a></td>";
			}		
		}	
		echo "</tr> 
				</table>"; 	
	}
}
$search = new search;
?>