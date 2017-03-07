<?php


// include composer autoload
require '../../vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

Image::configure(array('driver' => 'gd'));

$img = Image::make('../../images/img.jpg')->rotate(20);
//$img = Image::canvas(800, 600, '#000000');
//header("Content-Type:image/jpg");
echo $img->response('jpg', 90);
//$img1 = imagecreatefromjpeg('../../images/res1.jpeg');
//imagejpeg($res, NULL, 100);

?>