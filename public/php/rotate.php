<?php

//use app;

require "../../app/swiftImg.php";
require "../../app/Histogram.php";

$img = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/img.jpg', 'jpeg' , 100);

// echo $imggetImages();

$img2 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/test.jpg', 'jpeg', 100);

$img3 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/Kellogg_Forest.jpg', 'jpeg', 100);

$img4 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/hist_test.jpg', 'jpeg', 100);

$img5 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/Original Color Image.png', 'jpeg', 100);

$img6 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/LenaDark.png', 'jpg', 100);

$img7 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/lena.jpg', 'jpg', 100);
//$hist = new \app\Histogram('grayscale', $img6);

//$hist->histogramEqualization($img);
//echo $hist->histogramGraph($img)->response('jpeg', 90);


echo $img4->histogramEqualization('grayscale')->outPut();


?>