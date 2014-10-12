<?php
	/********************************************************************
	 * Author: Blake Lawson
	 * Email:  blakemlaws@gmail.com
	 *
	 * Class file to connect to database.
	 ********************************************************************/
	class DB_CONNECT 
	{
		// Constructor
		function __construct() 
		{
			// Connecting to database
			$this->connect();
		}

		// Destructor
		function __destruct() 
		{
			$this->close();
		}

		// Establist database connection
		function connect() 
		{
			// Import database connection variables
			require_once("config.php");

			// Connect to mysql database
			$con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());

			// Select database
			$db = mysql_select_db(DB_DATABASE, $con) or die(mysql_error()) or die(mysql_error());

			// Return conection cursor
			return $con;
		}

		// Close database connection
		function close() {
			mysql_close();
		}
	}
?>