<?php
include_once('enterInfo.php');

class getCSV {
	
	public $field_names = array();
	public $index = array();
		 
	public $first = TRUE;
	
	public function __construct(){
			
		if(($handle = fopen('f1011_f3.csv', "r")) !==FALSE){
			while(($data = fgetcsv($handle, 0,',')) !==FALSE){
				if($this->first == TRUE){
				
					$this->field_names = $data;
					
					$this->first = FALSE;
				//print_r($this->field_names);
					
				} else {
				$columns = array('UNITID','F3A01','F3A02','F3D01','F3D09');
				
				    
    			 $dbKeys = array('instID','totalAssets', 'totalLiab', 'netTuitionFees','totalRevIncome');
				    $data = array_combine($this->field_names, $data);
			    	$data = array_intersect_key($data, array_flip($columns));
			    	$data = array_combine($dbKeys, $data); 
				
				
				    $this->index[] = $data;   
				 //  print_r($this->index);
				    
			    }			    
		    }	
	    }
	   
	    fclose($handle);
	    print_r($this->index);	
		$enter = new enterInfo($this->index);
    }
 //$columns = array('UNITID','F1A06','F1A13','F1A18','F1B01','F1B17','F1B25');
    //public $columns = array('UNITID','INSTNM','STABBR','ZIP','INSTCAT','CCBASIC','CCENRPRF','CCSIZSET','LONGITUD','LATITUDE');
	//public $columns = array('UNITID','SCUGRAD','UAGRNTT','UAGRNTA','UPGRNTP','UPGRNTT','UPGRNTA','UFLOANP','UFLOANT','UFLOANA');
	//$dbKeys = array('instID','undergradTotal', 'grantTotal', 'grantAvg', 'undergradPercentPell', 'totalPell',
    	 			// 'avgPell', 'undergradPercentFed','totalFed','avgFed');
      /*  $dbKeys = array(
				       'instID','instName','state','zip','category','carnegieBasic',
				       'carnegieEnroll','carnegieSize','longitude','latitude');
				      
  $dbKeys = array('instID','totalAssets', 'totalLiab', 'netAssests', 'netTuitionFees', 'investIncome',
    	 			 'totalRev');	 */
    	 		//for "finance2011"
    	 		/*$columns = array('UNITID','F1A06','F1A13','F1A18','F1B01','F1B17','F1B25');
				
				    
    			 $dbKeys = array('instID','totalAssets', 'totalLiab', 'netAssets', 'netTuitionFees', 'investIncome',
    	 			 'totalRev');
				    $data = array_combine($this->field_names, $data);
			    	$data = array_intersect_key($data, array_flip($columns));
			    	$data = array_combine($dbKeys, $data); 
					$totalRevIncome = $data['investIncome'] + $data['totalRev'];
					$data['totalRevIncome'] = $totalRevIncome;
					unset ($data['investIncome']);
					unset ($data['totalRev']); 
				   
				    $this->index[] = $data;	 */
    	 			 
}
?>
