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
	require_once("model.php");

    // For debug only. Make sure to remove!!!
    ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);

	// Define User table
	$User = new model("User");
	$User->add_column("user_id", "INT NOT NULL PRIMARY KEY AUTO_INCREMENT");
	$User->add_column("first_name", "VARCHAR(64) NOT NULL");
	$User->add_column("last_name", "VARCHAR(64) NOT NULL");
	$User->add_column("email", "VARCHAR(64)");
	$User->add_column("date_created", "TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
	$User->add_column("birthday", "DATETIME");
	$User->add_column("gender", "CHAR(1)");
	$User->add_column("last_active", "DATETIME");
	$User->add_column("location", "SET('lat', 'long')");
	$User->create_table();

	// Define Tag table
	$Tag = new model("Tag");
	$Tag->add_column("val", "VARCHAR(32) PRIMARY KEY");
	$Tag->create_table();

	// Define Event table
	$Event = new model("Event");
	$Event->add_column("event_id", "INT NOT NULL PRIMARY KEY AUTO_INCREMENT");
	$Event->add_column("title", "VARCHAR(64) NOT NULL");
	$Event->add_column("description", "VARCHAR(256) NOT NULL");
	$Event->add_column("date_created", "TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
    $Event->add_column("creator_id", "INT NOT NULL");
    $Event->add_column("FOREIGN KEY (creator_id)", "REFERENCES User(user_id)");
	$Event->add_column("start_time", "DATETIME NOT NULL");
	$Event->add_column("end_time", "DATETIME NOT NULL");
	$Event->add_column("location", "SET('lat', 'long')");
	$Event->add_column("type", "enum('Frat/Sority', 'Club', 'Bar', 'Private', 'Pregame', 'Performance')");
	$Event->add_column("min_price", "INT");
	$Event->add_column("max_price", "INT");
	$Event->add_column("public", "BOOL NOT NULL");
	// $Event->add_column(""); // Age group
	$Event->create_table();

    // Define Event/Tag table
    // Lists events and their tags
    $Event_Tag = new model("Event_Tag");
    $Event_Tag->add_column("event_id", "INT NOT NULL");
    $Event_Tag->add_column("FOREIGN KEY (event_id)", "REFERENCES Event(event_id)");
    $Event_Tag->add_column("tag", "VARCHAR(32)");
    $Event_Tag->add_column("FOREIGN KEY (tag)", "REFERENCES Tag(val)");
    $Event_Tag->add_column("PRIMARY", "KEY(event_id, tag)");
    $Event_Tag->create_table();

    // Define Event/Attendee table
    // Lists the events and the people who are going to it
    $Event_Attendee = new model("Event_Attendee");
    $Event_Attendee->add_column("event_id", "INT NOT NULL");
    $Event_Attendee->add_column("FOREIGN KEY (event_id)", "REFERENCES Event(event_id)");
    $Event_Attendee->add_column("user_id", "INT NOT NULL");
    $Event_Attendee->add_column("FOREIGN KEY (user_id)", "REFERENCES User(user_id)");
    $Event_Attendee->add_column("PRIMARY", "KEY(event_id, user_id)");
    $Event_Attendee->create_table();

	// Define Group table
	$Group = new model("Social_Group");
	$Group->add_column("group_id", "INT NOT NULL PRIMARY KEY AUTO_INCREMENT");
	$Group->add_column("creator", "INT NOT NULL");
	$Group->add_column("FOREIGN KEY (creator)", "REFERENCES User(user_id)");
	$Group->add_column("date_created", "TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
	$Group->add_column("last_active", "DATETIME");
	$Group->create_table();

    // Define Group/Members table
    // Lists groups and the users in those groups
    $Group_Members = new model("Group_Members");
    $Group_Members->add_column("group_id", "INT NOT NULL");
    $Group_Members->add_column("FOREIGN KEY (group_id)", "REFERENCES Social_Group(group_id)");
    $Group_Members->add_column("user_id", "INT NOT NULL");
    $Group_Members->add_column("FOREIGN KEY (user_id)", "REFERENCES User(user_id)");
    $Group_Members->add_column("PRIMARY", "KEY(group_id, user_id)");
    $Group_Members->create_table();

    // Define Group/Events table
    // Lists the events each group is planning to go to
    $Group_Events = new model("Group_Events");
    $Group_Events->add_column("group_id", "INT NOT NULL");
    $Group_Events->add_column("FOREIGN KEY (group_id)", "REFERENCES Social_Group(group_id)");
    $Group_Events->add_column("event_id", "INT NOT NULL");
    $Group_Events->add_column("FOREIGN KEY (event_id)", "REFERENCES Event(event_id)");
    $Group_Events->add_column("PRIMARY", "KEY(group_id, event_id)");
    $Group_Events->create_table();

?>
<html>
	<head>
		<title>Schema</title>
	</head>
	<body>
		<h1>Setup Successful</h1>
	</body>
</html>
