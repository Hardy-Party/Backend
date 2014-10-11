<?php
	/********************************************************************
	 * Author: Blake Lawson
	 * Email:  blakemlaws@gmail.com
	 *
	 * This script should define all of the tables in the Party Hardy 
	 * database. If executed, this script will create all of the tables,
	 * but IT SHOULD BE NOTED THAT RUNNING THIS SCRIPT WILL DELETE ANY
	 * DATA IN THE DATABASE!!!!!
	 ********************************************************************/
	require_once __DIR__ . '/model.php';

	// Define User table
	$User = new model("User");
	$User->add_column("id", "INT NOT NULL AUTO_INCREMENT PRIMARY KEY");
	$User->add_column("first_name", "VARCHAR(64) NOT NULL");
	$User->add_column("last_name", "VARCHAR(64) NOT NULL");
	$User->add_column("email", "");


	// Define Event table
	$Event = new model("Event");



?>