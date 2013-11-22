<?php
abstract class view {
	public function __construct() {
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>view</title>
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
  	<div class="container">
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
 
	<footer class="footer">
     <p>&copy; Copyright  by Noam Lustiger</p>
    </footer>

</body>
</html>
<?php
    }   
}
//$view = new view;
?>
