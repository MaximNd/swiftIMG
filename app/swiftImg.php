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

	public function __construct($images, $format = 'jpg', $quality = 90) {
		Image::configure(array('driver' => 'gd'));
		$this->images = Image::make($images);
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

	public function resize($width, $height = null) {

		if(is_null($height)) {
			$imgWidth = $this->getRows();
			$imgHeight = $this->getCols();
			$height = $width * $imgHeight / $imgWidth;
		}

		$this->getImages()->resize($width, $height);

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

			return $this;
		}
	}

	

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

	public function rotate($degree = 90) {

		$this->getImages()->rotate($degree);

		return $this;
	}

	public function blur($value = 1) {

		$this->getImages()->blur($value);

		return $this;
	}



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
		return $this->getImages()->response($this->getFormat(), $this->getQuality());
	}
}



?>