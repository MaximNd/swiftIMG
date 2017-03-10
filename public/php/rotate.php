<?php

//use app;

require "../../app/swiftImg.php";
require "../../app/Histogram.php";

$img = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/img.jpg', 'jpeg' , 100);

// echo $imggetImages();

$img2 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/test.jpg', 'jpeg', 100);

$img3 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/Kellogg_Forest.jpg', 'jpeg', 100);

$hist = new \app\Histogram('grayscale', $img);

//$hist->histogamFilter($img);
echo $hist->histogramGraph($img)->response('jpeg', 90);


//echo $img->outPut();


?>