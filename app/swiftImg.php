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


	public function rotate($degree) {

		$this->getImages()->rotate($degree);

		return $this;
	}

	public function resize($width, $height = null) {

		if($height == null) {
			$imgWidth = $this->getRows();
			$imgHeight = $this->getCols();
			$height = $width * $imgHeight / $imgWidth;
		}

		$this->getImages()->resize($width, $height);

		return $this;

	}

	public function crop($startX, $startY, $width, $height, $isProp = false) {

		if($isProp && $this->isProportional($width, $height)) {
			return $this->resize($width, $height);
		} else {
			$this->getImages()->crop($width, $height, $startX, $startY);

			return $this;
		}
	}

	public function mirror($value = 'h') {

		if($value != 'v' && $value != 'h') $value = 'h';

		$this->getImages()->flip($value);

		return $this;

	}

	public function opacity($value) {

		$this->getImages()->opacity($value);

		return $this;
	}

	public function invert() {

		$this->getImages()->invert();

		return $this;

	}


	public function makeGrayscale() {
		
		$this->getImages()->greyscale();

		return $this;
	}



	public function outPut() {
		return $this->getImages()->response($this->getFormat(), $this->getQuality());
	}
}



?>