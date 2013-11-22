<?php
include_once('view.php');
include_once('search.php');

class viewSearch extends view{
	public function content() { 
?>
		
	<form action="" method="post">
		<fieldset>
		<input type = "text" size="60px" name="instName" default-value=" " placeholder="Enter Institution Name">
		<input type = "submit" value="Find Institution">
		</fieldset>
	</form>

		<div class="container">
			<div class="col-md-3 col-md-offset-7">
				
				<a href="savedView.php"><button class="btn btn-warning btn-block">View my saved colleges</button></a>
			</div>
		</div>
		
	<?php
		
		$search = new search;
		$results = search::select();
		if(!empty($results)){
		//print_r($results);
?>		
		<div class="container">
			<div class="col-md-6">
				<table class ="table table-striped table-bordered table-condensed table-hover">
			      <tr>
			      	<th>Institution</th>
			      	<th>ID</th>
			      	<th>State</th>
			      </tr>
<?php	      
		foreach ($results as $k=>$v) {
			
			echo "<tr>";
			 foreach($v as $col=>$val){
	      
	  			?><td><a href=viewCharacteristics.php?inst=<?php echo $results[$k]['ID'];?>>
	  				<?php echo $val. "</a></td>";
		}		
	}	
		echo "	</tr> 
				</table>
			</div>
		</div>"; 	
		}
		
		//print_r($_SESSION);	
	}
}
$view = new viewSearch;
$view->content();
?>