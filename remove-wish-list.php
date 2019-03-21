<?php 

	session_start();

	if( !isset($_SESSION["wish-list"])) {
		header("Location: view-wish-list.php");
	}


	if(isset($_GET["PaintingID"])) {
		$imgID = $_GET["PaintingID"];
		unset($_SESSION["wish-list"][$imgID]);

		if(count($_SESSION["wish-list"]) == 0) {
			session_destroy();
		}

	} else {
		session_destroy();
	}

	header("Location: view-wish-list.php");
?>