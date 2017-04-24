<?php
	if (isset($_POST["app-id"]) && isset($_POST["app-name"]) && isset($_POST["url-address"]) && isset($_POST["work"])) {
		include($_SERVER['DOCUMENT_ROOT'].'/app/swiftIMG_site.php');
		$swiftIMG = new swiftIMG_site();
		$user = $swiftIMG->getUser($_COOKIE["full_name"], $_COOKIE["social_id"]);
		echo $swiftIMG->updateApp($_POST["app-id"], $_POST["app-name"], $_POST["url-address"], $_POST["work"], $user["id"]);
	}
?>