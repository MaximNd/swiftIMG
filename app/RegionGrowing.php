<?php

namespace app;

// include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

/**
* 
*/
class RegionGrowing
{
	private $newImage;

	private $newImageCols;
	private $newImageRows;

	//Two-dimensional array, with color(shade of gray) values in each pixel, in RGB format
	private $imageData = [];

	private $newImageData = [];



	public function fillNewImageData() {
		for($i = 0; $i < $this->getNewImageRows(); ++$i) {
			for($j = 0; $j < $this->getNewImageCols(); ++$j) {
				$this->newImageData[$i][$j] = [0, 0, 0, 1.0];
			}
		}
	}
	
	public function __construct(\app\swiftImg $img, $type = 'color') {
		if($type != 'grayscale' && $type != 'color') $type = 'color';
		if($type == 'color') $img->makeGrayscale();
		$this->newImageRows = $img->getRows();
		$this->newImageCols = $img->getCols();
		$this->newImage = Image::canvas($this->getNewImageRows(), $this->getNewImageCols(), '#000000');
		$this->imageData = $img->getImageData();
		$this->fillNewImageData();
	}

	public function getNewImageCols() {
		return $this->newImageCols;
	}

	public function getNewImageRows() {
		return $this->newImageRows;
	}

	public function grow(\app\swiftImg $img, int $T) {
		$flatImageData = [];
		$flatNewImageData = [];

		for($i = 0; $i < $this->getNewImageRows(); ++$i) {
			for($j = 0; $j < $this->getNewImageCols(); ++$j) {
				$flatImageData[] = ($this->imageData[$i][$j])[0];
				$flatNewImageData[] = ($this->newImageData[$i][$j])[0];
			}
		}

		$this->RegGr($flatImageData, $flatNewImageData, $this->getNewImageRows(), $this->getNewImageRows(), $T);


		for($i = 0; $i < $this->getNewImageRows(); ++$i) {
			for($j = 0; $j < $this->getNewImageCols(); ++$j) {
				$this->newImageData[$i][$j] = (int)$flatNewImageData[($i * $this->getNewImageCols()) + $j];
			}
		}
		for($i = 0; $i < $this->getNewImageRows(); ++$i) {
			for($j = 0; $j < $this->getNewImageCols(); ++$j) {
				$img->getImages()->pixel([$this->newImageData[$i][$j],$this->newImageData[$i][$j],$this->newImageData[$i][$j]], $i, $j);
			}
		}
		return $img;

	}

	private function RegGr(array &$ImageData, array &$newImageData, $rows, $cols, $T) {
		$ydata = [];
		$sum = [];
		$xdata = [];
		$x = -1;
		$xx = 0;
		$zdata = [];
		$z = -1;
		for ($i = 0; $i < $rows * $cols; ++$i) {
			$ydata[] = 255;
			$xdata[] = false;
			$sum[] = 0;
		}
		$label = 0;
		$found = false;
		$val = 0;
		for ($i = 0; $i < $rows; ++$i) {
			for ($j = 0; $j < $cols; ++$j) {
				if (!$xdata[$i*$cols + $j]) {
					$ydata[$i*$cols + $j] = $label;
					++$z;
					$zdata[$z] = $i*$cols + $j;
					$sum[$label] += $ImageData[$i*$cols + $j];
					$xx = $z;
					$xdata[$zdata[$z]] = true;
					$val = $ImageData[$i*$cols + $j];
					while ($xx <= $z) {
						for ($ii = -1; $ii <= 1; ++$ii) {
							for ($jj = -1; $jj <= 1; ++$jj) {
								if (($zdata[$xx] + $ii*$cols + $jj < $cols * $rows) && ($zdata[$xx] + $ii * $cols + $jj >= 0)) {
									if (!$xdata[$zdata[$xx] + $ii*$cols + $jj]) {
										if (abs($val - $ImageData[$zdata[$xx] + $ii*$cols + $jj]) <= $T) {
											$ydata[$zdata[$xx] + $ii*$cols + $jj] = $label;
											++$z;
											$zdata[$z] = $zdata[$xx] + $ii*$cols + $jj;
											$sum[$label] += $ImageData[$zdata[$xx] + $ii*$cols + $jj];
											$xdata[$zdata[$z]] = true;
										}
									}
									$found = false;
								}
							}
						}
						++$xx;
					}
				    $sum[$label] = floor((double)$sum[$label]/($z+1) + 0.5);
					++$label;
					for ($k = 0; $k < $rows * $cols; ++$k) {
						$zdata[$k] = -1;
					}
					$z = -1;
				}
				$newImageData[$i*$cols + $j] = ($sum[$ydata[$i * $cols + $j]]);
			}
		}
	}	
}