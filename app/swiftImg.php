<?php

namespace app;

// include composer autoload

require '../vendor/autoload.php';
// require '../intervention/image/src/Intervention/Image/AbstractColor.php';
// require '../intervention/image/src/Intervention/Image/AbstractDecoder.php';
// require '../intervention/image/src/Intervention/Image/AbstractDriver.php';
// require '../intervention/image/src/Intervention/Image/AbstractEncoder.php';
// require '../intervention/image/src/Intervention/Image/AbstractFont.php';
// require '../intervention/image/src/Intervention/Image/AbstractShape.php';
// require '../intervention/image/src/Intervention/Image/Commands/AbstractCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/Argument.php';
// require '../intervention/image/src/Intervention/Image/Commands/ChecksumCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/CircleCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/EllipseCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/ExifCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/IptcCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/LineCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/OrientateCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/PolygonCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/PsrResponseCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/RectangleCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/ResponseCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/StreamCommand.php';
// require '../intervention/image/src/Intervention/Image/Commands/TextCommand.php';
// require '../intervention/image/src/Intervention/Image/Constraint.php';
// require '../intervention/image/src/Intervention/Image/Exception/ImageException.php';
// require '../intervention/image/src/Intervention/Image/Exception/InvalidArgumentException.php';
// require '../intervention/image/src/Intervention/Image/Exception/MissingDependencyException.php';
// require '../intervention/image/src/Intervention/Image/Exception/NotFoundException.php';
// require '../intervention/image/src/Intervention/Image/Exception/NotReadableException.php';
// require '../intervention/image/src/Intervention/Image/Exception/NotSupportedException.php';
// require '../intervention/image/src/Intervention/Image/Exception/NotWritableException.php';
// require '../intervention/image/src/Intervention/Image/Exception/RuntimeException.php';
// require '../intervention/image/src/Intervention/Image/Facades/Image.php';
// require '../intervention/image/src/Intervention/Image/File.php';
// require '../intervention/image/src/Intervention/Image/Filters/DemoFilter.php';
// require '../intervention/image/src/Intervention/Image/Filters/FilterInterface.php';
// require '../intervention/image/src/Intervention/Image/Gd/Color.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/BackupCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/BlurCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/BrightnessCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/ColorizeCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/ContrastCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/CropCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/DestroyCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/FillCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/FitCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/FlipCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/GammaCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/GetSizeCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/GreyscaleCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/HeightenCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/InsertCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/InterlaceCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/InvertCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/LimitColorsCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/MaskCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/OpacityCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/PickColorCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/PixelateCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/PixelCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/ResetCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/ResizeCanvasCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/ResizeCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/RotateCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/SharpenCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/TrimCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Commands/WidenCommand.php';
// require '../intervention/image/src/Intervention/Image/Gd/Decoder.php';
// require '../intervention/image/src/Intervention/Image/Gd/Driver.php';
// require '../intervention/image/src/Intervention/Image/Gd/Encoder.php';
// require '../intervention/image/src/Intervention/Image/Gd/Font.php';
// require '../intervention/image/src/Intervention/Image/Gd/Shapes/CircleShape.php';
// require '../intervention/image/src/Intervention/Image/Gd/Shapes/EllipseShape.php';
// require '../intervention/image/src/Intervention/Image/Gd/Shapes/LineShape.php';
// require '../intervention/image/src/Intervention/Image/Gd/Shapes/PolygonShape.php';
// require '../intervention/image/src/Intervention/Image/Gd/Shapes/RectangleShape.php';
// require '../intervention/image/src/Intervention/Image/Image.php';
// require '../intervention/image/src/Intervention/Image/ImageManager.php';
// require '../intervention/image/src/Intervention/Image/ImageManagerStatic.php';
// require '../intervention/image/src/Intervention/Image/ImageServiceProvider.php';
// require '../intervention/image/src/Intervention/Image/ImageServiceProviderLaravel4.php';
// require '../intervention/image/src/Intervention/Image/ImageServiceProviderLaravel5.php';
// require '../intervention/image/src/Intervention/Image/ImageServiceProviderLeague.php';
// require '../intervention/image/src/Intervention/Image/ImageServiceProviderLumen.php';

// require '../intervention/image/src/Intervention/Image/Point.php';
// require '../intervention/image/src/Intervention/Image/Response.php';
// require '../intervention/image/src/Intervention/Image/Size.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

/**
* Main Class 'swiftIMG'
*/

// $img = new \app\swiftIMG('http://swiftimg.herokuapp.com/images/img.jpg', 'jpg' , 100);
class swiftIMG
{
	private $images;
	private $format;
	private $quality;
	private $rows;
	private $cols;

	private $imageData = array("");
	//private $key;


	//The function checks the data that was written to the object
	protected function validate() {
		$format = $this->getFormat();
		$quality = $this->getQuality();
		if($format != 'jpg' && $format != 'png' && $format != 'gif' && $format != 'tif' && $format != 'bmp')
			$this->setFormat('jpg');
		if($quality <= 0 || $quality > 100)
			$this->setQuality(90);
	}

	private function isProportional($width, $height) {


		if(($this->getRows() / $width) == ($this->getCols() / $height)) return true;

		return false;

	}

	private function updateData() {
		$this->rows = $this->getImages()->width();
		$this->cols = $this->getImages()->height();
	}

	public function __construct(/*$key,*/ $images, $format = 'jpg', $quality = 90) {
		 echo "start_constructor";

		Image::configure(array('driver' => 'gd'));
		// echo "1";
		// echo $images;
		$this->images = Image::make($images);
		// echo "2";
		//$manager = new ImageManager(array('driver' => 'gd'));
		//$this->images = $manager->make($images);

		//echo $this->images;
		$this->format = $format;
		$this->quality = $quality;
		//$this->rows = $this->getImages()->width();
		//$this->cols = $this->getImages()->height();
		$this->validate();
		//echo "string";
		 echo "end_constructor";
		//$this->key = $key;

	}

	public function getImages() {
		return $this->images;
	}

	public function setImages($value) {
		$this->images = $value;
	}

	public function getRows() {
		return $this->rows;
	}

	public function getCols() {
		return $this->cols;
	}

	public function getFormat() {
		return $this->format;
	}

	public function setFormat($format) {
		$this->format = $format;
	}

	public function getQuality() {
		return $this->quality;
	}

	public function setQuality($quality) {
		$this->quality = $quality;
	}


	public function getKey() {
		return $this->key;
	}


	public function getImageData($setNewData = false) {
		if($this->imageData[0] == "" || !$setNewData){
			for($i = 0; $i < $this->getRows(); ++$i) {
				for($j = 0; $j < $this->getCols(); ++$j) {
					$this->imageData[$i][$j] = $this->getImages()->pickColor($i, $j);
				}
			}	
		}
		return $this->imageData;
	}

	public function histogramEqualization($type = 'grayscale') {

		$hist = new \app\Histogram($this, $type);

		$hist->histogramEqualization($this);


		return $this;
	}


	public function histogramGraph($type = 'grayscale', $format = 'jpg', $quality = 90, $coef = 35) {
		
		$hist = new \app\Histogram($this, $type);

		return new swiftIMG($hist->histogramGraph($this, $coef), $format, $quality);
	}

	public function CannyBorder($type = 'color', $format = 'jpg', $quality = 90, $sigma = 1, $sobelK = 1, $low = 50, $high = 150, $size = 2) {

		$Canny = new \app\CannyEdgeDetector($this, $type);
		
		return new swiftIMG($Canny->CannyOperator($sigma, $sobelK, $low, $high, $size), $format, $quality);
	}

	public function SobelBorder($type = 'color', $k = 1, $format = 'jpg', $quality = 90) {

		$Sobel = new \app\SobelEdgeDetector($this, $type);
		
		return new swiftIMG($Sobel->SobelOperator($k), $format, $quality);
	}

	public function regionGrowing(int $T = 10, $type = 'color') {

		$RegGR = new \app\RegionGrowing($this, $type);
		
		return $RegGR->grow($this, $T);
	}



	public function resize($width, $height = null) {

		if(is_null($height)) {

			$imgWidth = $this->getRows();
			$imgHeight = $this->getCols();
			$height = $width * $imgHeight / $imgWidth;
		}

		$this->getImages()->resize($width, $height);


		$this->updateData();


		return $this;

	}


	public function crop($width = null, $height = null, $startX = null, $startY = null, $isProp = false) {


		if($isProp && $this->isProportional($width, $height)) {
			return $this->resize($width, $height);
		} else {
			if($width == 'img-width' || is_null($width)) $width = $this->getRows();
			else if($width == 'img-half-width') $width = (int)($this->getRows() / 2);
			if($height == 'img-height' || is_null($height)) $height = $this->getCols();
			else if($height == 'img-half-height') $height = (int)($this->getCols() / 2);

			//if(!is_null($startX)) $startX = $width - $startX;

			$this->getImages()->crop($width, $height, $startX, $startY);

			$this->updateData();


			return $this;
		}
	}


	// public function trim() {
		
	// 	$this->getImages()->trim('top-left', null, 25, 50);

	// 	return $this;
	// }

	

	public function opacity($value = 60) {

		if($this->getFormat() != 'png') $this->setFormat('png');

		$this->getImages()->opacity($value);

		return $this;
	}

	// ________________________Adjusting Images________________________

	public function gamma($value = 2) {
		if($value <= 0) $value = 1;
		$this->getImages()->gamma($value);

		return $this;

	}

	public function bright($value = 15) {

		if($value < -100) $value = -100;
		else if($value > 100) $value = 100;
 
		$this->getImages()->brightness($value);

		return $this;
	}

	public function contrast($value = 20) {

		if($value < -100) $value = -100;
		else if($value > 100) $value = 100;

		$this->getImages()->contrast($value);

		return $this;
	}

	public function colorize($red = 10, $green = 10, $blue = 10) {

		$this->getImages()->colorize($red, $green, $blue);

		return $this;
	}

	public function makeGrayscale() {
		
		$this->getImages()->greyscale();

		return $this;
	}

	public function invert() {

		$this->getImages()->invert();

		return $this;
	}


	public function mirror($value = 'h') {

		if($value != 'v' && $value != 'h') $value = 'h';

		$this->getImages()->flip($value);

		return $this;

	}


	//__________________________--Applying Effects___________________________
	public function filter() {
		
		$this->getImages()->filter(new \Intervention\Image\Filters\DemoFilter($value));

		return $this;
	}

	public function pixelate($size = 1) {

		$this->getImages()->pixelate($size);

		return $this;
	}

	public function sharpen($value = 10) {

		if($value < -100) $value = -100;
		else if($value > 100) $value = 100;

		$this->getImages()->sharpen($value);

		return $this;
	}

	public function rotate($degree = 90) {

		$this->getImages()->rotate($degree);

		$this->updateData();


		return $this;
	}


	public function blur($value = 1) {

		$this->getImages()->blur($value);

		return $this;
	}

	// public function fill($filling, array $pos) {

	// 	$this->getImages()->fill($filling, $pos[0], $pos[1]);
		
	// 	return $this;
	// }

	// public function mask($scource) {

	// 	$this->getImages()->mask($scource);

	// 	return $this;
	// }



	//$pos param:   
				// top-left (default)
				// top
				// top-right
				// left
				// center
				// right
				// bottom-left
				// bottom
				// bottom-right
	public function insert($img, $pos = 'top-left', $offsetX = 0, $offsetY = 0) {

		$this->getImages()->insert($img, $pos, $offsetX, $offsetY);
		
		return $this;
	}

	public function insertMerge($img, $opacityValue = 100, $pos = 'top-left', $offsetX = 0, $offsetY = 0) {
		
		if(is_string($img))
			$opacityImg = Image::make($img);
		else
			$opacityImg = Image::make($img->getImages());
		if($opacityValue < 100 && $opacityValue >= 0)
			$opacityImg->opacity($opacityValue);
		
		return $this->insert($opacityImg, $pos, $offsetX, $offsetY);
	}

	public function insertGrayscale($img, $pos = 'top-left', $offsetX = 0, $offsetY = 0) {
		
		if(is_string($img))
			$grayscaleImg = Image::make($img);
		else
			$grayscaleImg = Image::make($img->getImages());
		
		$grayscaleImg->greyscale();
		
		return $this->insert($grayscaleImg, $pos, $offsetX, $offsetY);
	}

	public function insertResize($img, array $size, $pos = 'top-left', $offsetX = 0, $offsetY = 0) {
		$resizeImg = $img;

		if(is_string($img))
			$resizeImg = new swiftIMG($img);

		$resizeImg->resize($size[0], $size[1]);

		return $this->insert($resizeImg->getImages(), $pos, $offsetX, $offsetY);
	}

	public function insertCrop($img, array $values, $pos = 'top-left', $offsetX = 0, $offsetY = 0) {
		$cropImg = $img;

		if(is_string($img))
			$cropImg = new swiftIMG($img);
			//crop($width = null, $height = null, $startX = null, $startY = null, $isProp = false)
		$cropImg->crop($values[0], $values[1], $values[2], $values[3], $values[4]);

		return $this->insert($cropImg->getImages(), $pos, $offsetX, $offsetY);
	}

	public function frame($type = 'type-1') {

		return $this->insertResize($_SERVER["DOCUMENT_ROOT"] . "/swiftIMG/frames/" . $type . ".png", [$this->getRows(), $this->getCols()]);
	}


	public function text($text, $startX = 0, $startY = 0, $func = NULL) {

		$this->getImages()->text($text, $startX, $startY, $func);


		return $this;
	}




	public function filters($filters = 'blur-makeGrayscale') {
		$arrFilters = explode('-', $filters);
		
		if($arrFilters[0] == 'blur' || $arrFilters[1] == 'blur') $this->blur();
		if($arrFilters[0] == 'pixelate' || $arrFilters[1] == 'pixelate') $this->pixelate();
		if($arrFilters[0] == 'invert' || $arrFilters[1] == 'invert') $this->invert();
		if($arrFilters[0] == 'makeGrayscale' || $arrFilters[1] == 'makeGrayscale') $this->makeGrayscale();
		if($arrFilters[0] == 'colorize' || $arrFilters[1] == 'colorize') $this->colorize();
		if($arrFilters[0] == 'contrast' || $arrFilters[1] == 'contrast') $this->contrast();
		if($arrFilters[0] == 'bright' || $arrFilters[1] == 'bright') $this->bright();
		if($arrFilters[0] == 'gamma' || $arrFilters[1] == 'gamma') $this->gamma();
		if($arrFilters[0] == 'opacity' || $arrFilters[1] == 'opacity') $this->opacity();

		return $this;		
	}


	public function save($path = NULL) {

		// if(is_null($path)) {
		// 	$swiftIMG_site = new swiftIMG_site();
		// 	if() {
		// 		if($swiftIMG_site->saveImage($name, $this->getKey(), $domain)) {

		// 		} else {

		// 		}
		// 	} else {

		// 	}
				
		// }


		return $this->getImages()->save($path, $this->getQuality());
	}

	public function outPut() {
		//return $this->getImages()->encode('data-url', $this->getQuality(), $this->getFormat());
	return $this->images;
	}
}



?>