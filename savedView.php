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
	session_start();	
	$saved = new saved;
	
	if(array_key_exists('comp', $_SESSION)){
		$favorites = $saved->getFavorites();
		?>
		<div class="col-md-5 col-md-offset-1">
		<h4> 
		<?php	
	//	print_r($_SESSION);
		$n = 1;
		echo "<form method = 'post' action=''>";
		//print_r($favorites);
		echo "<table class ='table table-striped table-bordered table-condensed''>
				<thead><span class='lead'>Saved Institutions</span></thead> <tr>";
		foreach($favorites as $k=>$sub){
		//	print_r($sub);
			$remove = "	<input type='checkbox' name ='removeID[]' value='" . $sub['instID']."'";
			//echo "<div class='lead'> remove";	  
			array_unshift($sub,$remove);
			$y=1;
			foreach($sub as $field=>$val){
				$y++;
				if($y!=4){
				  echo '<td> '. $val. '  ';	
				}		
			}
			echo"</tr>";
		}
		echo"</table></h4>";
?> 
		<input type="submit" name="remove" value ="remove" style = "clear:both">
		</form>
		
	</div>
	
<?php	

		if(isset($_POST['removeID'])){
			foreach($_POST['removeID'] as $ID){
				
			  // if(in_array($ID, $_SESSION['comp'])){
				  $rid = array_search($ID, $_SESSION['comp']);
				  unset($_SESSION['comp'][$rid]);
				  header('Location:');
			   //}
				
			}
			echo "<br><br>";
				
		}
	
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
	?>	
		<div class"container">
				<div class="col-sm-10 col-sm-offset-1"><br><br>
					<span class="lead">Financial Data for 2011</span>
			<table class ="table table-striped table-bordered table-condensed ">
  <?php	   $i = 1;	
  		  
					 foreach($finance as $sub){
					 	 $n = 1;	
						echo"<tr>";	 			               
						foreach($sub as $val){
							 if($i<=count($sub)){
						 	    echo "<td class='warning'><h5>$val</h5></td>";
							    $i++;
						 } 	elseif($n<=2){	
							    echo "
						   		  <td>$val</td>";	
								  $n++;
						 }	else {
						 		$val = '$'. number_format($val); 
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
	?>	<br><div class="col-sm-10 col-sm-offset-1">
				<table class ="table table-striped table-bordered table-condensed">
					<span class="lead">Aid received for 2011-2012</span>
	<?php 
	
		 $i = 0;
					 foreach($aid as $sub){
						$n = 1;	
						echo"<tr>";	
						               
						foreach($sub as $val){
							$i++;
							 if($i<=count($sub)){
						 	   echo "<td class='warning'><h5>$val</h5></td>";
							
						     }elseif($n<=2){
						 	   echo "
						   		<td> $val</td>";	
						 	  
						     } else{

						 	    $val = number_format($val);
								
								if($n!==3 && $n!==6 && $n!==9){
									$val = '$'. $val;
								}elseif($n==6 || $n==9)	{
									$val = $val .'%';
								}               
							    echo "
						   		<td> $val</td>";							
						   }
					   		 $n++;					    	 
						}
						echo "</tr>";						
				     }				 		
			?> </table>
			</div>
		</div>							
	<?php	
	  } else {
	  	echo"<h3>You have no saved institutions.</h3>";
	  }
	 
	}					
	
}
$saved=new savedView;
$saved->content();
?>