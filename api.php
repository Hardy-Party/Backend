<?php
    /*********************************************************************
     * Author: Blake Lawson
     * Email:  blakemlaws@gmail.com
     *
     * These functions are used to handle interactions between mobile 
     * users and the database.
     *********************************************************************/
    require_once("db_connect.php");

    // For debugging only. Remove!!!
//    ini_set("display_errors", "on");
//    error_reporting(E_ALL | E_STRICT);

    // Return given whatever needs to be serialized as a json
    function returnJSON($data)
    {
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    // Return all users by given user
    function getUsers(/* params */)
    {
        $data = "getUsers called";
        returnJSON($data);
    }

    // Return all events by given filter
    function getEvents(/* params */)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $query = "SELECT * FROM Event;";
        $data = mysql_query($query, $con) or die(mysql_error());
        
        returnJSON(mysql_fetch_array($data));
    }

    // Return all groups by given filter
    function getGroups(/* params */)
    {
        $data = "getGroups called";
        returnJSON($data);
    }

    // Create new user
    function createUser(/* params */)
    {
        $data = "createUser called";
        returnJSON($data);
    }

    // Create new group
    function createGroup(/* params */)
    {
        $data = "createGroup called";
        returnJSON($data);
    }

    // Create new event
    function createEvent(/* params */)
    {
        $data = "createEvent called";
        returnJSON($data);
    }

    // Update user given new information
    function updateUser(/* params */)
    {
        $data = "updateUser called";
        returnJSON($data);
    }

    // Update group given new information
    function updateGroup(/* params */)
    {
        $data = "updateGroup called";
        returnJSON($data);
    }
    
    // Update event given new information
    function updateEvent(/* params */)
    {
        $data = "updateEvent called";
        returnJSON($data);
    }
?>
