<?php

//use app;

require "swiftImg.php";
require "SobelEdgeDetector.php";
//require_once "../app/CannyEdgeDetector.php";
require "RegionGrowing.php";
require  "Histogram.php";


//echo "dirname: " . dirname(__DIR__) . "<br>" . "DIR: " . __DIR__ . "<br>" . "str_replaceDirnameDIR: " . str_replace("\\", "/", dirname(__DIR__));
//echo "HELLO!";

// var_dump($_SERVER);

// echo  "<br>";

// echo $_SERVER["DOCUMENT_ROOT"] . '/images/img.jpg' . "<br>";

// echo __DIR__;

$path = 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/MilfordSound.jpg/600px-MilfordSound.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

//$img = new \app\swiftIMG($base64, 'jpg' , 100);

 //var_dump($img);
//echo $base64;
// echo $imggetImages();

// $img2 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/test.jpg', 'jpeg', 100);

// $img3 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/Kellogg_Forest.jpg', 'jpeg', 100);

// $img4 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/hist_test.jpg', 'jpeg', 100);

// $img5 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/Original Color Image.png', 'jpeg', 100);

// $img6 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/LenaDark.png', 'jpg', 100);

$img7 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/lena.jpg', 'jpg', 100);

// $img8 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/test4.jpg', 'jpg', 100);

// $img9 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/eleph.jpg', 'jpg', 100);

// $img10 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/yellow.jpg', 'jpg', 100);

// $img11 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/test12.jpg', 'jpg', 40);

// $img12 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/newLena.jpg', 'jpg', 100);

// $img13 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/natureTest1.jpg', 'jpg', 100);
// $img14 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/natureTest2.jpg', 'jpg', 100);
// $img15 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/natureTest3.jpg', 'jpg', 100);
// $img16 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/natureTest4.jpg', 'jpg', 100);
// $img17 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/natureTest5.jpg', 'jpg', 100);
// $img18 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/natureTest6.jpg', 'jpg', 100);
// $img19 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/natureTest7.jpg', 'jpg', 100);
// $img20 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/natureTest8.jpg', 'jpg', 100);

// $img21 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/WinterCat.jpg', 'jpg', 50);

// $img22 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/green.jpg', 'jpg', 100);

// $img23 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/ColorTest1.jpg', 'jpg', 100);

// $img24 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/ColorTest2.jpg', 'jpg', 100);

// $img25 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/ColorTest3.jpg', 'jpg', 100);

// $img26 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/girl-colorful-portrait.jpg', 'jpg', 100);

// $img27 = new \app\swiftIMG('E:/OpenServer/domains/localhost/swiftIMG/images/OZM.jpg', 'jpg', 100);

//$hist = new \app\Histogram('grayscale', $img6);


//var_dump($Canny->fillNewImageData());
//$hist->histogramEqualization($img);
//echo $hist->histogramGraph($img)->response('jpeg', 90);

//var_dump($img->getImageData());


  echo $img7->histogramEqualization('color')->outPut();


?>