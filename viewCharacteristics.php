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
			
			<div class="col-md-3 col-md-offset-7">
				<form method="post" action="">
					<input type="submit" class="btn btn-info btn-block " value="Save this institution for comparison" name="compare">
				</form>	 
				<br>
				
				<a href="savedView.php"><button class="btn btn-warning btn-block">View my saved colleges</button></a>
			</div>
		<div class= "col-md-10">
	<?php 
	//print_r($generalInfo);
		foreach($generalInfo as $k=>$v){
			extract($v);
			foreach($v as $key => $val){
			   
			   echo $val . "<br> ";
			} 
		}
		
		// echo $generalInfo;
	?>	
	</div>	

		<div class="col-md-3">
			<?php //echo "<h3> $name </h3>"; ?>
			<table class ="table table-striped table-bordered table-condensed ">
					
				<th>
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
		//print_r($_SESSION); 
		header('Location:viewSearch');
		}	
	  }
    
	
}
$view = new viewCharacteristics;
$view->content();
?>