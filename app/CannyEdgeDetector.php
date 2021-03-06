<?php 

namespace app;

// include composer autoload
require 'E:/OpenServer/domains/localhost/swiftIMG/vendor/autoload.php';
require "SobelEdgeDetector.php";

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;


/**
* 
*/
class CannyEdgeDetector extends SobelEdgeDetector
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


	public function CannyOperator($sigma = 1, $sobelK = 1, $low = 50, $high = 150, $size = 2) {
		if($size < 2)$size = 2;
		(int)$sobelK;
		$flatImageData = [];
		$flatNewImageData = [];

		for($i = 0; $i < $this->getNewImageRows(); ++$i) {
			for($j = 0; $j < $this->getNewImageCols(); ++$j) {
				$flatImageData[] = ($this->imageData[$i][$j])[0];
				$flatNewImageData[] = ($this->newImageData[$i][$j])[0];
			}
		}

		//echo "ImageData: " . "<br>";
		//var_dump($this->imageData);
		//echo "<br>" . "NewImageData: " . "<br>";
		//var_dump($this->newImageData);


		// echo "FlatImageData: " . "<br>";
		// var_dump($flatImageData);
		// echo "<br>" . "FlatNewImageData: " . "<br>";
		// var_dump($flatNewImageData);
		//$res = [];
		//$res = 
		$this->Canny($flatImageData, $flatNewImageData, $this->getNewImageRows(), $this->getNewImageCols(), $size, $sigma, $sobelK, $low, $high);
		//var_dump($flatNewImageData);
		for($i = 0; $i < $this->getNewImageRows(); ++$i) {
			for($j = 0; $j < $this->getNewImageCols(); ++$j) {
				// if($j < $this->getNewImageCols()/2){
				// 	$this->newImageData[$i][$j] = [$flatNewImageData[($i * $this->getNewImageCols() + $j) + $this->getNewImageCols() * ($this->getNewImageCols()/4)],$flatNewImageData[($i * $this->getNewImageCols() + $j)*2],$flatNewImageData[($i * $this->getNewImageCols() + $j)*2], 1.0];
				// } else {
				// 	$this->newImageData[$i][$j] = [$flatNewImageData[($i * $this->getNewImageCols() + $j) - $this->getNewImageCols() * ($this->getNewImageCols()/4)],$flatNewImageData[$i * $this->getNewImageCols() + $j],$flatNewImageData[$i * $this->getNewImageCols() + $j], 1.0];
				// }
				$this->newImageData[$i][$j] = (int)$flatNewImageData[($i * $this->getNewImageCols()) + $j];
			}
		}
		//var_dump($this->newImageData);
		for($i = 0; $i < $this->getNewImageRows(); ++$i) {
			for($j = 0; $j < $this->getNewImageCols(); ++$j) {
				//$this->newImage->pixel([$this->newImageData[$i][$j][0],$this->newImageData[$i][$j][0],$this->newImageData[$i][$j][0]], $i, $j);
				$this->newImage->pixel([$this->newImageData[$i][$j],$this->newImageData[$i][$j],$this->newImageData[$i][$j]], $i, $j);
			}
		}
		return $this->newImage;
	}



	private function convolutionG(array &$mask, array &$ImageData, array &$newImageData, int $sizeR, int $sizeC, $rows, $cols) {
		$div = 0;
		for ($i = 0; $i < $sizeR*$sizeC; ++$i) {
			$div += $mask[$i];
		}
		$sum = 0;
		for ($i = (int)($sizeR / 2); $i < $rows - (int)($sizeR / 2); ++$i) {
			for ($j = (int)($sizeC / 2); $j < $cols - (int)($sizeC / 2); ++$j) {
				for ($k = 0; $k < $sizeR; ++$k) {
					for ($l = 0; $l < $sizeC; ++$l) {
						$sum += $ImageData[($i + $k - (int)($sizeR / 2)) * $cols + ($j + $l - (int)($sizeC / 2))] * $mask[$k * $sizeC + $l];
					}
				}
				$newImageData[$i * $cols + $j] = (int)($sum/$div);
				$sum = 0;
			}
		}

	}

	private function maskGaus(array &$mask, int $size, $sigma) {
		$PI = pi();
		$E = exp(1);

		$arr1 = [];
		$arr2 = [];

		for ($i = $size*$size - 1; $i >= 0; --$i) {
			$arr1[$i] = $i / $size - $size / 2;
		}
		for ($i = 0; $i < $size; ++$i) {
			for ($j = 0; $j < $size; ++$j) {
				$arr2[$j*$size + $i] = $i - $size / 2;
			}
		}
		for ($i = 0; $i < $size*$size; ++$i) {
			$mask[$i] = (pow($E, -(double)(pow($arr1[$i], 2) + pow($arr2[$i], 2)) / (double)(2 * $sigma*$sigma))) / ((double)(2 * $sigma*$sigma)*$PI);
		}
	}

	private function Canny(array &$ImageData, array &$newImageData, $rows, $cols, $size, $sigma, $sobelK, $low, $high) {
		$ImageDataCopy = $ImageData;
		
		//1.Зглажування шуму Гаусом
		$maskG = [];
		$this->maskGaus($maskG, $size, $sigma);
		$newImageCopy1 = [];
		$this->convolutionG($maskG, $ImageDataCopy, $newImageCopy1, $size, $size, $rows, $cols);
		//2.Знаходженя градієнта та його кута Собелем
		$newImageCopy2 = [];
		$arc = [];
		$this->Sobel($newImageCopy1, $newImageCopy2, $rows, $cols, $sobelK, $arc);
		//var_dump($ImageDataCopy);
		//echo "MaskG: <br>";
		//var_dump($maskG);
		//var_dump($newImageCopy1);
		//var_dump($newImageCopy2);
		
		//3.1 Округлення кутів до 45
		for ($i = 0; $i < $rows*$cols; ++$i) {
			if ((($arc[$i] > -22.5) && ($arc[$i] < 22.5)) || (($arc[$i] > 157.5) && ($arc[$i] < 202.5))) {
				$arc[$i] = 0;
			}
			else if ((($arc[$i] >= 22.5) && ($arc[$i] < 67.5)) || (($arc[$i] < 247.5) && ($arc[$i] >= 202.5))) {
				$arc[$i] = 45;
			}
			else if ((($arc[$i] < 112.5) && ($arc[$i] >= 67.5)) || (($arc[$i] >= 247.5) && ($arc[$i] < 292.5))) {
				$arc[$i] = 90;
			}
			else {
				$arc[$i] = 135;
			}
		}
		//3.2 Відкидаємо слабкі границі
		$x = 0;
		for ($i = 1; $i < $rows - 1; ++$i) {
			for ($j = 1; $j < $cols - 1; ++$j) {
				if (($arc[$i] = 0) && (($newImageCopy2[$i*$cols + $j] < $newImageCopy2[$i*$cols + $j + 1]) ||
					($newImageCopy2[$i*$cols + $j] < $newImageCopy2[$i*$cols + $j - 1]))){
					$newImageCopy2[$i*$cols + $j] = 0;
				}
				else if (($arc[$i] = 45) && (($newImageCopy2[$i*$cols + $j] < $newImageCopy2[$cols*($i + 1) + $j - 1]) ||
					($newImageCopy2[$i*$cols + $j] < $newImageCopy2[$cols*($i - 1) + $j + 1]))) {
					$newImageCopy2[$i*$cols + $j] = 0;
				}
				else if (($arc[$i] = 90) && (($newImageCopy2[$i*$cols + $j] < $newImageCopy2[$cols*($i + 1) + $j]) ||
					($newImageCopy2[$i*$cols + $j] < $newImageCopy2[$cols*($i - 1) + $j]))){
					$newImageCopy2[$i*$cols + $j] = 0;
				}
				else if(($arc[$i] = 135) && (($newImageCopy2[$i*$cols + $j] < $newImageCopy2[$cols*($i + 1) + $j + 1]) ||
					($newImageCopy2[$i*$cols + $j] < $newImageCopy2[$cols*($i - 1) + $j - 1]))) {
					$newImageCopy2[$i*$cols + $j] = 0;
				}
			}
		}
		//4-5 Знаходження остаточних границь
		for ($i = 0; $i < $rows; ++$i) {
			for ($j = 0; $j < $cols; ++$j) {
				if ($newImageCopy2[$i*$cols + $j] <= $low) {
					$newImageCopy2[$i*$cols + $j] = 0;
					$newImageData[$i*$cols + $j] = $newImageCopy2[$i*$cols + $j];
				}
				else if ($newImageCopy2[$i*$cols + $j] < $high) {
					if (($newImageCopy2[$i*$cols + $j + 1] < $high) &&
						($newImageCopy2[$i*$cols + $j - 1] < $high) &&
						($newImageCopy2[$cols*($i + 1) + $j + 1] < $high) &&
						($newImageCopy2[$cols*($i - 1) + $j + 1] < $high) &&
						($newImageCopy2[$cols*($i + 1) + $j] < $high) &&
						($newImageCopy2[$cols*($i - 1) + $j - 1] < $high) &&
						($newImageCopy2[$cols*($i + 1) + $j - 1] < $high) &&
						($newImageCopy2[$cols*($i - 1) + $j] < $high)) {
						$newImageCopy2[$i*$cols + $j] = 0;
						$newImageData[$i*$cols + $j] = $newImageCopy2[$i*$cols + $j];
					}
				}
				else {
					$newImageCopy2[$i*$cols + $j] = 255;
					$newImageData[$i*$cols + $j] = $newImageCopy2[$i*$cols + $j];
				}
			}
		}
	}



}





?>