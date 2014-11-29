<?php
    /*********************************************************************
     * Author: Blake Lawson
     * Email:  blakemlaws@gmail.com
     *
     * Read POST request and make proper api call.
     *********************************************************************/
    require_once("api.php");

    // For debugging only. Remove!!!
    ini_set("display_errors", "on");
    error_reporting(E_ALL | E_STRICT);

//    $request = $_POST["type"];
//    $params = $_POST["params"];
    $request = $_GET["type"];
    $params = $_GET["params"];


    if ($request == "getUsers")
    {
        getUsers($params);
    }
    else if ($request == "getEvents")
    {
        getEvents($params);
    }
    else if ($request == "getGroups")
    {
        getGroups($params);
    }
    else if ($request == "createUser")
    {
        createUser($params);
    }
    else if ($request == "createGroup")
    {
        createGroup($params);
    }
    else if ($request == "createEvent")
    {
        createEvent($params);
    }
    else if ($request == "updateUser")
    {
        updateUser($params);
    }
    else if ($request == "updateGroup")
    {
        updateGroup($params);
    }
    else if ($request == "updateEvent")
    {
        updateEvent($params);
    }
    else
    {
        echo "$request is not a valid api call.";
    }
?>
