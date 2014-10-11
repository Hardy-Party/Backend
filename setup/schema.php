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
	$User->add_column("user_id", "INT NOT NULL AUTO_INCREMENT");
	$User->add_column("PRIMARY KEY", "(user_id)");
	$User->add_column("first_name", "VARCHAR(64) NOT NULL");
	$User->add_column("last_name", "VARCHAR(64) NOT NULL");
	$User->add_column("email", "VARCHAR(64)");
	$User->add_column("date_created", "DATETIME DEFAULT CURRENT_TIMESTAMP");
	$User->add_column("birthday", "DATETIME");
	$User->add_column("gender", "CHAR(1)");
	$User->add_column("last_active", "DATETIME DEFAULT CURRENT_TIMESTAMP");
	// $User->add_column(); // Events posted
	// $User->add_column(); // Groups
	// $User->add_column(); // Location
	$User->create_table();

	// Define Tag table
	$Tag = new model("Tag");
	$Tag->add_column("tag_id", "INT NOT NULL AUTO_INCREMENT");
	$Tag->add_column("PRIMARY KEY", "(tag_id)");
	$Tag->add_column("val", "VARCHAR(32)");
	$Tag->create_table();


	// Define Event table
	$Event = new model("Event");
	$Event->add_column("event_id", "INT NOT NULL AUTO_INCREMENT");
	$Event->add_column("PRIMARY KEY", "(event_id)");
	$Event->add_column("title", "VARCHAR(64) NOT NULL");
	$Event->add_column("description", "VARCHAR(256) NOT NULL");
	$Event->add_column("date_created", "DATETIME DEFAULT CURRENT_TIMESTAMP");
	$Event->add_column("time", "DATETIME NOT NULL");
	// $Event->add_column(""); // Location
	// $Event->add_column(""); // Type
	// $Event->add_column(""); // Tag
	$Event->add_column("min_price", "INT");
	$Event->add_column("max_price", "INT");
	$Event->add_column("public", "BOOL NOT NULL");
	// $Event->add_column(""); // Age group
	// $Event->add_column("attendees", ); // People who have RSVPed
	$Event->create_table();

	// Define Group table
	$Group = new model("Group");
	$Group->add_column("group_id", "INT NOT NULL AUTO_INCREMENT");
	$Group->add_column("PRIMARY KEY", "(group_id)");
	// $Group->add_column("creator", "") // Group creator
	$Group->add_column("date_created", "DATETIME DEFAULT CURRENT_TIMESTAMP");
	$Group->add_column("last_active", "DATETIME DEFAULT CURRENT_TIMESTAMP");
	// $Group->add_column(""); // Users in group
	// $Group->add_column(""); // Itinerary (Events)
	$Group->create_table();
?>