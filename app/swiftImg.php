<?php

namespace app;

// include composer autoload
require '../../vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

/**
* Main Class 'swiftIMG'
*/
class swiftIMG
{
	private $images;
	private $format;
	private $quality;
	private $rows;
	private $cols;
	private $imageData = array("");

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

	public function __construct($images, $format = 'jpg', $quality = 90) {
		Image::configure(array('driver' => 'gd'));
		$this->images = Image::make($images);
		//$manager = new ImageManager(array('driver' => 'gd'));
		//$this->images = $manager->make($images);
		echo $this->images;
		$this->format = $format;
		$this->quality = $quality;
		$this->rows = $this->getImages()->width();
		$this->cols = $this->getImages()->height();
		$this->validate();
		//echo "string";
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

	public function gamma($value = 40) {

		$this->getImages()->gamma($value);

		return $this;

	}

	public function bright($value = 40) {

		if($value < -100) $value = -100;
		else if($value > 100) $value = 100;
 
		$this->getImages()->brightness($value);

		return $this;
	}

	public function contrast($value = 50) {

		if($value < -100) $value = -100;
		else if($value > 100) $value = 100;

		$this->getImages()->contrast($value);

		return $this;
	}

	public function colorize($red = 40, $green = 40, $blue = 40) {

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
	// public function filter($value = 45) {
		
	// 	$this->getImages()->filter(new \Intervention\Image\Filters\DemoFilter($value));

	// 	return $this;
	// }

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

	public function insertMerge($img, $opacityValue, $pos = 'top-left', $offsetX = 0, $offsetY = 0) {
		
		$opacityImg = Image::make($img);
		
		$opacityImg->opacity($opacityValue);
		
		return $this->insert($opacityImg, $pos, $offsetX, $offsetY);
	}

	public function insertGrayscale($img, $pos = 'top-left', $offsetX = 0, $offsetY = 0) {
		
		$grayscaleImg = Image::make($img);
		
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


	public function text($text, $startX = 0, $startY = 0, $func) {

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


	public function save($path) {
		return $this->getImages()->save($path, $this->getQuality());
	}

	public function outPut() {
		return $this->getImages()->encode('data-url', $this->getQuality(), $this->getFormat());
	}
}



?>