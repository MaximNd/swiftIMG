<?php 
	setcookie("name", "", time() - 3600*48, "/"); 
	setcookie("social_id", "", time() - 3600*48, "/"); 
	header("Location: /"); 
?>