<?php

	session_start();

	if( !isset($_SESSION["wish-list"])) {
		$_SESSION["wish-list"] = array();
	}


	if(isset($_GET["PaintingID"]) && isset($_GET["ImageFileName"]) && isset($_GET["Title"])) {
		$imgID = $_GET["PaintingID"];
		$imgFileName = $_GET["ImageFileName"];
		$imgTitle = $_GET["Title"];
	} else {
		echo "String not properly set";
	}

	$_SESSION["wish-list"][$imgID] = array('PaintingID' => $imgID, 'ImageFileName' => $imgFileName, 'Title' => $imgTitle);

	header("Location: view-wish-list.php");

?>