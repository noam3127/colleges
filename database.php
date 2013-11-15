<?php

class database{
	
	  private static $connect= 'mysql:host=localhost;dbname=colleges';
      private static $user = 'root';
      private static $pass = 'qwerty';
	  private static $DBH;
	
	public  function getDB(){
		try {
   		    self::$DBH = new PDO(self::$connect, self::$user, self::$pass);
		    self::$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Success!";
		} catch (PDOException $e) {
 		   echo $e->getMessage();
		}
		return self::$DBH;
	}	
}	
//$database = new database;
//$database->getDB();	
?>