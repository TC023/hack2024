<?php
	class Database {
		private static $dbName 			= 'hack2024' ;
		private static $dbHost 			= '10.50.122.133' ;
		private static $dbUsername 		= 'anoar';
		private static $dbUserPassword 	= 'test';

		private static $cont  = null;

		public function __construct() {
			exit('Init function is not allowed');
		}

		public static function connect(){
		   // One connection through whole application
	    	if ( null == self::$cont ) {
		    	try {
		        	self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
		        }
		        catch(PDOException $e) {
		        	die($e->getMessage());
		        }
	       	}
	       	return self::$cont;
		}

		public static function disconnect() {
			self::$cont = null;
		}
	}
?>
