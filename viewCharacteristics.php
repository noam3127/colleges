<?php

include_once('view.php');
include_once('characteristics.php');

class viewCharacteristics extends view {
	
	public function content() {
		
		$characteristics = new characteristics; 
		$ID = $_REQUEST['inst'];
		//print_r($ID);
		$generalInfo = $characteristics->getGeneralInfo($ID);
		$results = $characteristics->instChar($ID);
		$name = characteristics::setup($results);
	?> 	
		<div class="container col-md-offset-1">
		<div class= "col-md-3" style="border: 2px solid black; border-radius: 8px; float:left;">
	<?php 

		foreach($generalInfo as $k=>$v){
			extract($v);
		}
		
		echo "<h2>";
		echo $instName . "</h2>";
		echo  '<h4 class = "lead">' . $address . '<br />' . $city . ', ' . $state . ' <br />' . $zip . '</h4>';
		if($webAddress != " "){
	?>		
			<a href= http://<?php echo $webAddress; ?>  target='_blank'>
			<h3 style='border: 1px solid darkgray; border-radius: 8px; width: 9em; text-align:center; background: linear-gradient(to top, gray 0%,lightgray 40%); '>Visit website</h3></a> 
<?php   }
?>		
	  </h3>
	
	</div>
	
	<form method="post" action="" style="clear:both; width: 19em; padding-top: 2em;float:left;">
		<input type="submit" class="btn btn-info btn-block " value="Save this institution for comparison" name="compare">
	</form>	 
		
	<div class="col-md-3" style="">	
		<a href="savedView.php"><button class="btn btn-warning btn-block">View my saved colleges</button></a>
	</div>
	
	<div class="col-md-5" style="">
		<table class ="table table-striped table-bordered table-condensed ">
			<tr>				
	<?php
		
		 foreach($results as $k=>$sub){
					unset($results[$k]['instName']);	
		 }
		 
		  echo"<thead><td><h4>$name</h4></td></thead>";
				
		  foreach($results as $k=>$sub){	
				foreach($sub as $col=>$v){
				$v=number_format($v);
				echo "<tr><td> $col</td>
				    	<td>$v</td></tr>";	
				}					
		  }
				
			echo "</div></table> </form>";?>
			<div id="map-canvas"/>
			</div>
			
			</div>
	
	<?php
		if(isset($_POST['compare'])){	
			session_start();
			
			if(in_array($ID, $_SESSION['comp']) == FALSE){
				$_SESSION['comp'][] = $ID;
			}
		}	
    }	
}
$view = new viewCharacteristics;
$view->content();
?>