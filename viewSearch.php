<?php
include_once('view.php');
include_once('search.php');
include_once('advancedSearch.php');

class viewSearch extends view{
	public function content() { 
?>
		
	<form action="" method="post">
		<fieldset>
		<input type = "text" size="60px" name="instName" default-value=" " placeholder="Search for an Institution">&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="state"> State</label>
		<select size="1"name="state" placeholder="Any">
			 <option value="">Any</default>	
			  <option value="AK">AK</option>
			  <option value="AL">AL</option>
			  <option value="AR">AR</option>
			  <option value="AZ">AZ</option>
			  <option value="CA">CA</option>
			  <option value="CO">CO</option>
			  <option value="CT">CT</option>
			  <option value="DC">DC</option>
			  <option value="DE">DE</option>
			  <option value="FL">FL</option>
			  <option value="GA">GA</option>
			  <option value="HI">HI</option>
			  <option value="IA">IA</option>
			  <option value="ID">ID</option>
			  <option value="IL">IL</option>
			  <option value="IN">IN</option>
			  <option value="KS">KS</option>
			  <option value="KY">KY</option>
			  <option value="LA">LA</option>
			  <option value="MA">MA</option>
			  <option value="MD">MD</option>
			  <option value="ME">ME</option>
			  <option value="MI">MI</option>
			  <option value="MN">MN</option>
			  <option value="MO">MO</option>
			  <option value="MS">MS</option>
			  <option value="MT">MT</option>
			  <option value="NC">NC</option>
			  <option value="ND">ND</option>
			  <option value="NE">NE</option>
			  <option value="NH">NH</option>
			  <option value="NJ">NJ</option>
			  <option value="NM">NM</option>
			  <option value="NV">NV</option>
			  <option value="NY">NY</option>
			  <option value="OH">OH</option>
			  <option value="OK">OK</option>
			  <option value="OR">OR</option>
			  <option value="PA">PA</option>
			  <option value="RI">RI</option>
			  <option value="SC">SC</option>
			  <option value="SD">SD</option>
			  <option value="TN">TN</option>
			  <option value="TX">TX</option>
			  <option value="UT">UT</option>
			  <option value="VA">VA</option>
			  <option value="VT">VT</option>
			  <option value="WA">WA</option>
			  <option value="WI">WI</option>
			  <option value="WV">WV</option>
			  <option value="WY">WY</option>
			</select><br>

		<input type = "submit" value="Find Institution">
		</fieldset>
	</form>

		<div class="container">
			<div class="col-md-3 col-md-offset-7">
				
				<a href="savedView.php"><button class="btn btn-warning btn-block">View my saved colleges</button></a>
			</div>
		</div>
		
	<?php
	if(!empty($_POST['instName'])){
		//$search = new search;
		//$results = search::select();
		
		$select = new advancedSearch;
		$results = $select->select();
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
		
	}	
	//print_r($_POST);	
	}

}

$view = new viewSearch;
$view->content();
?>