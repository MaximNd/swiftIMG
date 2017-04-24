<?php
	if (isset($_POST["app-name"]) && isset($_POST["url-address"])) {
		include($_SERVER['DOCUMENT_ROOT'].'/app/swiftIMG_site.php');
		$swiftIMG = new swiftIMG_site();
		$user = $swiftIMG->getUser($_COOKIE["full_name"], $_COOKIE["social_id"]);
		echo $swiftIMG->createApp($_POST["app-name"], $_POST["url-address"], $user["id"]);
	}
?>