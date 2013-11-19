<?php

include_once('view.php');
include_once('characteristics.php');

class viewCharacteristics extends view {
	
	public function content() {
		$characteristics = new characteristics; 
		$ID = $_REQUEST['inst'];
		//print_r($ID);
		$results = characteristics::instChar($ID);
		$name = characteristics::setup($results);
			?> 	<button type="button" class="btn btn-info">Compare side by side with other institutions</button>
			<div class="col-md-3">
			<table class ="table table-striped table-bordered table-condensed ">
					
				<th>
					<tr>
		 <?php
		 foreach($results as $k=>$sub){
					unset($results[$k]['instName']);	
		 }
		 
		  echo"<thead><td>$name</td></thead>";
				
		  foreach($results as $k=>$sub){	
				foreach($sub as $col=>$v){
		
				echo "<tr><td> $col</td>
				    	<td>$v</td></tr>";	
				}					
		  }
				
			echo "</div></table>";
			
    }
	
}
$view = new viewCharacteristics;
$view->content();
?>