<?php

include_once('view.php');
include_once('saved.php');

class savedView extends view {
		
	public function content(){
		
		?>
			
			<div class="col-md-3 col-md-offset-7">
				
				<a href="viewSearch.php"><button class="btn btn-warning">Search for more colleges</button></a>
			</div>
		</div>
<?php		
		
		$saved = new saved;
					
		$finance = $saved->getFinance();
		//unset($finance['instID']);
		$financeFields = array(array('Name','ID','Total assets','Total liabilities','Net assets',
			'Net amount of tuition and fees','Total amount of revenue and income'));
			
		$financeFields = array_splice($finance, 0,0, $financeFields);
		
		foreach($finance as $sub){
			$i=0;
			foreach($sub as $v){ 
				$ordered[$i++][] = $v;
			}
		}
	//	print_r($ordered);
	?>		<div class"container">
				<div class="col-sm-12">
					<h4>Financial Data for 2011</h4>
			<table class ="table table-striped table-bordered table-condensed ">
  <?php	   $i = 1;		
					 foreach($finance as $sub){
						echo"<tr>";	 			               
						foreach($sub as $val){
							 if($i<=count($sub)){
						 	echo "<td><h5>$val</h5></td>";
							 $i++;
						 } 	else{	
							echo "
						   		<td>$val</td>";	
						 }					   							    	 
						}
						echo "</tr>";
				     }				 		
			?> </table>
			
			</div>
		</div>
		
			
		
  <?php	   		
 		
  		$aid = $saved->getAid();
		//unset($aid['instID']);
		//print_r($aid);
		$aidFields= array(array('Name','ID','Total undergraduates','Total grants','Avg. grant per undergrad',
			'Percent of undergraduates receiving Pell grants','Total Pell grants','Avg. Pell grant per undergrad',
			'Percent of undergraduates receiving federal grants','Total federal grants','Avg. federal grant per undergrad'));
		$aidFields = array_splice($aid, 0,0, $aidFields);	
	?>	<div class="col-sm-12">
				<table class ="table table-striped table-bordered table-condensed ">
					<h4>Aid received for 2011-2012</h4>
	<?php 
		 
					 foreach($aid as $sub){
						$i = 0;	
						echo"<tr>";	
						               
						foreach($sub as $val){
							 if($i<=count($sub)){
						 	echo "<td><h5>$val</h5></td>";
							
						 } 	else{
						 	 $i++;
						 	 
						 	//$val = ($i==1 ? $val: number_format($val));		               
							echo "
						   		<td> $val</td>";	
						 }					   							    	 
						}

						echo "</tr>";
						
				     }				 		
			?> </table>
			</div>
		</div>
			
				
	<?php	
	}					
	
}
$saved=new savedView;
$saved->content();
?>