<?php
include_once('collegeInfo.php');

class enterInfo extends getCSV {

	public $index = array();
	
	public function __construct ($index) {
	
		$host = 'localhost';
		$dbname = 'colleges';
		$user = 'root';
		$pass = 'qwerty';
	

		try {
   		    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {

 		 echo $e->getMessage();
		}
		
		$this->index = $index;
		
		$STH = $DBH->prepare("INSERT INTO finance2011 
			(instID, totalAssets, totalLiab, netTuitionFees, totalRevIncome) 
			VALUES (:instID,:totalAssets, :totalLiab, :netTuitionFees, :totalRevIncome) ");
			
		//iterate through each nested array and execute the query for each one
	
		/*foreach($this->index as $sub) {	
		    $STH->execute($sub);
		    }*/
		
	/*	while($row = $STH->fetch()) {
		    foreach($row as $key => $value) {
		    echo $key . ': ' . $value . '<br>';
 		 }
 		 echo '<hr>';
		}
	*/
	}
}	

?>