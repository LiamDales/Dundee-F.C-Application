<?php
class Database
{
    private static $dbName = 'sql1505254' ;
    private static $dbHost = 'lochnagar.abertay.ac.uk' ;
    private static $dbUsername = 'sql1505254';
    private static $dbUserPassword = 'OWR6GSorV8Z2';

    private static $cont  = null;
	 
	public function __construct() {
		die('Init function is not allowed');
	}
	 
	public static function connect()
	{
		// One connection through whole application
		if ( null == self::$cont )
		{
			try
			{
				self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
			}
			catch(PDOException $e)
			{
				die($e->getMessage());
			}
		}
		return self::$cont;
	}
	 
	public static function disconnect()
	{
		self::$cont = null;
	}
}
?>
