<?php

// Definitions
define( 'DB_HOST', 'localhost' );
define( 'DB_USER', '' );
define( 'DB_PASS', '' );
define( 'DB_NAME', '' );

// Debug
ini_set( 'display_errors', '1' );

// Database
class Database
{
	private static $database;

	public static function getConnection()
	{
		if ( !self::$database )
		{
			self::$database = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
			self::$database->set_charset("utf8");
        }
		return self::$database;
    }
}

define( 'INITIALIZED', true );

?>