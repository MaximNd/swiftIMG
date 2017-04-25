<?php
	if (isset($_POST["app-id"]) && isset($_POST["src"])) {
		include($_SERVER['DOCUMENT_ROOT'].'/app/swiftIMG_site.php');
		$swiftIMG = new \app\swiftIMG_site();
		echo $swiftIMG_site->deleteImage($_POST["app-id"], $_POST["src"]);
	}
?>