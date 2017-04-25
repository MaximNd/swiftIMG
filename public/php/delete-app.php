<?php
	if (isset($_POST["app-id"])) {
		include($_SERVER['DOCUMENT_ROOT'].'/app/swiftIMG_site.php');
		$swiftIMG = new \app\swiftIMG_site();
		$user = $swiftIMG->getUser($_COOKIE["full_name"], $_COOKIE["social_id"]);
		echo $swiftIMG->deleteApp($_POST["app-id"], $user["id"]);
	}
?>