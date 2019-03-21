<?php
include 'include/config.php';
/*
Defines functions to connect to the Database, retrieve the result and 
return them. You need several functions for different questions
*/

function getDB()
{
	$db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
	$db->set_charset("utf8");

	if($db->connect_error) {
	    die("Connection failed: " . $db->connect_error);
	    echo "Can't connect to DB";
	}

	return $db;
}

$db = getDB();

function runQuery($db, $query) {

	
    $sqlResult = $db->query($query);

    if($sqlResult->num_rows > 0) {

        return $sqlResult;

    } else {
       return;
    }
}




?>
