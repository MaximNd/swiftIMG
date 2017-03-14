<?php

//use app;

require "../../app/swiftImg.php";

$img = new \app\swiftIMG($_POST["path"], $_POST["type"] , $_POST["quality"]);

// echo $imggetImages();

echo $img->mirror('h')->outPut();


?>