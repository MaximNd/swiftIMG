<?php

//use app;

require "../../app/swiftImg.php";

$img = new \app\swiftIMG("../../".$_POST["path"], $_POST["type"] , $_POST["quality"]);

echo 'data:image/' . $_POST["type"] . ';base64,' . base64_encode($img->mirror('h')->outPut());
?>