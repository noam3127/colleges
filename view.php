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
  	<div class="container">
       <h1>College Facts</h1>
       <h4>The fastest and easiest way to get data on thousands of colleges across the US</h4>
          <?php
  }
	protected function content(){
		
	?>
  
  <!--       <div class="row">
       	<div class="lead">
       	<div class="col-md-3">Hi this is just a test. I'm in a 3-column column, lihj boihbo iuah sbdo lpij hasbd,n ijbas d  lhjb doq uhb lhuv usw hjnjd</div>
       	</div>
       	<div class="col-md-9">Hi this is just a test. I'm in a 9-column column, qaoiuygroqiwhbd louhwbvdlahj wdlquwhd  oquwhbdqlwjd </div>
        <div class="col-md-9"></div>
  </div>   -->
    </div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 

     <p>&copy; Copyright  by Noam Lustiger</p>
    </footer>
  </div>
</body>
</html>
<?php
    }   
}
//$view = new view;
?>