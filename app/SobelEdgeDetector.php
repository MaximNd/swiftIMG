<?php 

namespace app;

// include composer autoload
require '../../vendor/autoload.php';


// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

/**
* 
*/
class SobelEdgeDetector
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


	public function SobelOperator(int $k) {
		$flatImageData = [];
		$flatNewImageData = [];

		for($i = 0; $i < $this->getNewImageRows(); ++$i) {
			for($j = 0; $j < $this->getNewImageCols(); ++$j) {
				$flatImageData[] = ($this->imageData[$i][$j])[0];
				$flatNewImageData[] = ($this->newImageData[$i][$j])[0];
			}
		}

		$this->Sobel($flatImageData, $flatNewImageData, $this->getNewImageRows(), $this->getNewImageCols(), $k);

		for($i = 0; $i < $this->getNewImageRows(); ++$i) {
			for($j = 0; $j < $this->getNewImageCols(); ++$j) {
				$this->newImageData[$i][$j] = (int)$flatNewImageData[($i * $this->getNewImageCols()) + $j];
			}
		}
		//var_dump($this->newImageData);
		for($i = 0; $i < $this->getNewImageRows(); ++$i) {
			for($j = 0; $j < $this->getNewImageCols(); ++$j) {
				$this->newImage->pixel([$this->newImageData[$i][$j],$this->newImageData[$i][$j],$this->newImageData[$i][$j]], $i, $j);
			}
		}
		return $this->newImage;

	}


	protected function convolution(array &$mask, array&$ImageData, array &$newImageData, int $sizeR, int $sizeC, $rows, $cols) {
		$sum = 0;
		for ($i = (int)($sizeR / 2); $i < $rows - (int)($sizeR / 2); ++$i) {
			for ($j = (int)($sizeC / 2); $j < $cols - (int)($sizeC / 2); ++$j) {
				for ($k = 0; $k < $sizeR; ++$k) {
					for ($l = 0; $l < $sizeC; ++$l) {
						$sum += $ImageData[($i + $k - (int)($sizeR / 2)) * $cols + ($j + $l - (int)($sizeC / 2))] * $mask[$k * $sizeC + $l];
					}
				}
				$newImageData[$i * $cols + $j] = $sum;
				//if(($j) == 224) echo $newImageData[$i * $cols + $j] . "<br>";
				$sum = 0;
			}
		}

	}

	protected function Sobel(array &$ImageData, array &$newImageData, $rows, $cols, int $k, array &$arc = NULL) {
		$PI = pi();
		$E = exp(1);
		//$size = 3;
		$Gxx = [];
		$Gxx[0] = 1;
		$Gxx[1] = 0;
		$Gxx[2] = -1;

		$Gxy = [];
		$Gxy[0] = 1;
		$Gxy[1] = 2;
		$Gxy[2] = 1;

		$Gyx = [];
		$Gyx[0] = 1;
		$Gyx[1] = 2;
		$Gyx[2] = 1;

		$Gyy = [];
		$Gyy[0] = 1;
		$Gyy[1] = 0;
		$Gyy[2] = -1;

		$Gx = [];
		$Gy = [];
		$GX = [];
		$GY = [];

		$this->convolution($Gxx, $ImageData, $Gx, 1, 3, $rows, $cols);
		$this->convolution($Gxy, $Gx, $GX, 3, 1, $rows, $cols);
		$this->convolution($Gyx, $ImageData, $Gy, 1, 3, $rows, $cols);
		$this->convolution($Gyy, $Gy, $GY, 3, 1, $rows, $cols);


		if(!(is_null($arc))) {
			if (($k != 0) && ($k != 1)) {
				for ($i = 0; $i < $rows*$cols; ++$i) {
					$GX[$i] = (int)(($GX[$i]) / $k);
					$GY[$i] = (int)(($GY[$i]) / $k);
				}
			}

			for ($i = 0; $i < $rows*$cols; ++$i) {
				$newImageData[$i] = (double)(sqrt(pow($GX[$i], 2) + pow($GY[$i], 2)));

				if (($GX[$i] == 0) && ($GY[$i] == 0)) {
					//echo "Set 0 <br>";
					$arc[$i] = 0;
				}
				else if($GX[$i] == 0) {
					//echo "Set 90 <br>";
					$arc[$i] = 90;
				}
				else {
					//echo "Set atan <br>";
					$arc[$i] = (atan((double)($GY[$i]) / (double)($GX[$i])) * 180) / $PI;
				}
				if ($newImageData[$i] >= 255) {
				    $newImageData[$i] = 255;
				}
				else if ($newImageData[$i] <= 0) {
					$newImageData[$i] = 0;
				}
			}
		} else {
			for ($i = 0; $i < $rows * $cols; ++$i) {
				$newImageData[$i] = sqrt(pow($GX[$i], 2)/$k + pow($GY[$i], 2)/$k);

		//        cout << test[i]<< endl;
				if ($newImageData[$i] >= 255) {
					$newImageData[$i] = 255;
				}
				if ($newImageData[$i] <= 0) {
					$newImageData[$i] = 0;
				}
			}
		}
		
		// echo "<br>arc: <br>";
		// var_dump($arc);
	}


}


?>