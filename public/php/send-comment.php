<?php
	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
		include($_SERVER['DOCUMENT_ROOT'].'/app/swiftIMG_site.php');
		$swiftIMG = new swiftIMG_site();
		echo $swiftIMG->sendComment($_POST["name"], $_POST["email"], $_POST["message"]);
	}
?>