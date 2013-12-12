<?php
abstract class view {
	
	protected $title = 'InstiStats | Search';
	public function __construct() {
?>


<!DOCTYPE html>
<html lang="en">
<head>
	
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo $this->title; ?></title>
  <meta name="description" content="college data">
  <meta name="author" content="Noam Lustiger">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
   <!-- Bootstrap -->
  <link href="css/bootstrap-3.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <title>College Data</title>
</head>

 <body>
 	<div class="navbar navbar-inverse navbar-static-top">
 		<div class="container">
 			<a href="#" class="navbar-brand">InstiStats</a>
 			<ul class="nav navbar-nav navbar-right">
 				<li><a href="viewSearch.php">Home</a></li>
 				<li><a href="viewSearch.php">Search</a></li>
 				<li><a href="savedView.php">My Favorites</a></li>
 			</ul>
 		</div>
 	</div>
  	<div class="container col-md-offset-1">
       <h1>InstiStats</h1>
       <h4>The fastest, easiest way to get data on US colleges</h4>
          <?php
  }
	protected function content(){
		
	?>
 
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
 <?php 
	//}
 //protected function __destruct(){
 	}
 

	public function __destruct(){
	
?>
<div style="overflow:auto; padding-bottom:50px;height: 240px; min-height:100% !important; margin-bottom:50px"></div> 

<footer class="footer" style="position:relative; margin-top:75px; height:50px; clear:both; padding-top:10px;background:linear-gradient(to left, white 15%, #5d4e48 45%, white 85%);">
    <div class="container" style="margin:0 auto">
        <div class="row  col-md-offset-9">
            <div class="span2" style="font-family: 'Trajan Pro', copperplate" >
     &copy; Copyright  by Noam Lustiger
     		</div>
     	</div>
     </div>
</footer>-

</body>
</html>
<?php
    }   
}
//$view = new view;
?>
