<?php
	/********************************************************************
	 * Author: Blake Lawson
	 * Email:  blakemlaws@gmail.com
	 *
	 * This class is defines the database models for Party Hardy as well
	 * as helper functions for interacting with those models.
	 ********************************************************************/
	class model 
	{
		// The name of this model
		private $title = "";
		// Store every column and corresponding datatype
		private $columns = array();

		// Constructor. Takes a name of the model as input
		function __construct($name)
		{
			$this->title = $name;
		}

		// Add column to table. $field is the name for the column and 
		// $type is the mysql datatype (both should be strings)
		function add_column($field, $type)
		{
			$this->columns[$field] = $type;
		}

		// Create table in database.
		// NOTE: THIS WILL OVERWRITE ANY EXISTING DATA!!!!!
		function create_table() 
		{
			// Import database connection
			require_once("../config.php");

			// Establish connection as root
			// Connect to mysql database
			$con = mysql_connect(DB_SERVER, DB_ROOT, DB_ROOT_PASSWORD) or die(mysql_error());

			// Select database
			$db = mysql_select_db(DB_DATABASE, $con) or die(mysql_error()) or die(mysql_error());

			// Create query
			$query = "CREATE TABLE $this->title (";
			
			foreach ($this->columns as $key => $val)
			{
				$query .= "$key $val, ";
			}
			
			if (count($this->columns) > 0)
			{
				$len = strlen($query);
				$query[$len - 2] = ")";
				$query[$len - 1] = ";";
			}
			else 
			{
				$query .= ");";
			}

			print(nl2br($query . "\n"));

			// Execute command
			$result = mysql_query($query, $con);
			if (!$result)
			{
				// TODO: Replace this with print to log file
				print(nl2br("Could not create table\n"));
			}
		}
	}
?>