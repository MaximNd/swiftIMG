<?php

//use app;

require "../../app/swiftImg.php";

$img = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/img.jpg', 'jpeg' , 90);

// echo $imggetImages();

echo $img->mirror('h')->outPut();


?>