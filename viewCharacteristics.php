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
			?> 	
			
			<div class="col-md-3 col-md-offset-7">
				<form method="post" action="">
					<input type="submit" class="btn btn-info" value="Save this institution for comparison" name="compare">
				</form>	 
				
				<form action="viewFavorites.php" method="post">
					<input type="button" class="btn btn-warning" name="saved" value="View my saved colleges"> 
				</form>
			</div>
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
				
			echo "</div></table> </form>";
			
			
	if(isset($_POST['compare'])){	
		session_start();
		
		if(in_array($ID, $_SESSION['comp']) == FALSE){
			$_SESSION['comp'][] = $ID;
		}
		print_r($_SESSION); 
		header('Location:viewSearch');
		}	
    }
	
}
$view = new viewCharacteristics;
$view->content();
?>