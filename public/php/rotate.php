<?php

//use app;

require "../../app/swiftImg.php";

$img = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/img.jpg', 'jpeg' , 100);

// echo $imggetImages();

$img2 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/img.jpg', 'jpeg', 100);

echo $img->filters('blur-makeGrayscale')->outPut();


?>