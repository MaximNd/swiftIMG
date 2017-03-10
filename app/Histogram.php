<?php

namespace app;

// include composer autoload
require '../../vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

/**
* Histogram class
*/
class Histogram
{
	//1)rgb
	//2)grayscale
	private $type;

	private $histogram = [];
	
	private function makeHistogram(\app\swiftImg $img) {
		if($this->getType() == 'grayscale' || $this->getType() == 'color-to-grayscale') {
			if($this->getType() == 'color-to-grayscale') $img->makeGrayscale();
			for($i = 0; $i < $img->getRows(); ++$i) {
				for($j = 0; $j < $img->getCols(); ++$j) {
					++$this->histogram[($img->getImages()->pickColor($i, $j))[0]];
					//var_dump(($img->getImages()->pickColor($i, $j)));
				}
			}
		} else if ($this->getType() == 'color') {
			for($i = 0; $i < $img->getRows(); ++$i) {
				for($j = 0; $j < $img->getCols(); ++$j) {
					++$this->histogram[0][($img->getImages()->pickColor($i, $j))[0]];
					++$this->histogram[1][($img->getImages()->pickColor($i, $j))[1]];
					++$this->histogram[2][($img->getImages()->pickColor($i, $j))[2]];
					//($img->getImages()->pickColor($i, $j)[0]);
				}
			}
		}
		//var_dump($this->histogram);
		// for($i = 0; $i < 256; ++$i)
		// echo $i . ': ' . $this->histogram[$i] . '<br>';
	}

	public function __construct(\app\swiftImg $img, $type = 'grayscale') {
		if($type != 'grayscale' && $type != 'color-to-grayscale' && $type != 'color') $type = 'grayscale';
		$this->type = $type;
		$this->makeHistogram($img);
	}

	public function getType() {
		return $this->type;
	}

	public function histogramEqualization(\app\swiftImg $img) {
		$sum = 0;
		$alpha = 255 / ($img->getRows() * $img->getCols());
		//$newHistogram = [];
		if($this->getType() == 'grayscale'  || $this->getType() == 'color-to-grayscale') {
			$newHistogram = [];
			for($i = 0; $i < 256; ++$i) {
		        $sum += $this->histogram[$i];
		        $newHistogram[$i] = $sum;
		    }

		    
		    $c = 0;
		    for($i = 0; $i < $img->getRows(); ++$i) {
				for($j = 0; $j < $img->getCols(); ++$j) {
					$c = ($img->getImages()->pickColor($i, $j))[0];
					//var_dump(($img->getImages()->pickColor($i, $j))[0]);
					$img->getImages()->pixel([$newHistogram[$c] * $alpha, $newHistogram[$c] * $alpha, $newHistogram[$c] * $alpha], $i, $j);
				}
			}
		} else if ($this->getType() == 'color') {
			$newHistogram = [[],[],[]];
			for($i = 0; $i < 3; ++$i) {
				for($j = 0; $j < 256; ++$j) {
					$sum += $this->histogram[$i][$j];
					$newHistogram[$i][$j] = $sum;
				}
				$sum = 0;
			}

			$c1 = 0;
			$c2 = 0;
			$c3 = 0;
			for($i = 0; $i < $img->getRows(); ++$i) {
				for($j = 0; $j < $img->getCols(); ++$j) {
					$c1 = ($img->getImages()->pickColor($i, $j))[0];
					$c2 = ($img->getImages()->pickColor($i, $j))[1];
					$c3 = ($img->getImages()->pickColor($i, $j))[2];
					$img->getImages()->pixel([$newHistogram[0][$c1] *$alpha,$newHistogram[1][$c2]*$alpha,$newHistogram[2][$c3]*$alpha],$i,$j);
				}
			
			}
		}
		
	}

	public function histogramGraph(\app\swiftImg $img, $coef = 35) {
		
		$graph = Image::canvas(256, 256, '#000000');
		$indent_1 = 0;
		$indent_2 = 0;
		$indent_3 = 0;

		//$countHist = count($this->histogram);
		if($this->getType() === 'grayscale'  || $this->getType() == 'color-to-grayscale') {
			for($i = 0; $i < 256; $i+=2) {
				$indent_1 = 256 - (($this->histogram[$i] / ($img->getCols() * $img->getRows()))*256)*$coef;
				$indent_2 = 256 - (($this->histogram[$i+1] / ($img->getCols() * $img->getRows()))*256)*$coef;
				$indent_3 = 256 - (($this->histogram[$i+2] / ($img->getCols() * $img->getRows()))*256)*$coef;
				//$graph->pixel([200, 200, 200], $i, (int)($indent));
				$graph->line($i, (int)$indent_1, $i+1, (int)$indent_2, function ($draw) {
				    $draw->color('#FFFFFF');
				});
				$graph->line($i+1, (int)$indent_2, $i+2, (int)$indent_3, function ($draw) {
				    $draw->color('#FFFFFF');
				});
			}

			return $graph;	
		} else if ($this->getType() == 'color') {
			for($i = 0; $i < 3; ++$i) {
				for($j = 0; $j < 256; $j+=2) {
					$indent_1 = 256 - (($this->histogram[$i][$j] / ($img->getCols() * $img->getRows()))*256)*$coef;
					$indent_2 = 256 - (($this->histogram[$i][$j+1] / ($img->getCols() * $img->getRows()))*256)*$coef;
					$indent_3 = 256 - (($this->histogram[$i][$j+2] / ($img->getCols() * $img->getRows()))*256)*$coef;
					//$graph->pixel([200, 200, 200], $i, (int)($indent));
					if($i == 0){
						$graph->line($j, (int)$indent_1, $j+1, (int)$indent_2, function ($draw) {
					    	$draw->color('#FF0000');
						});
						$graph->line($j+1, (int)$indent_2, $j+2, (int)$indent_3, function ($draw) {
						    $draw->color('#FF0000');
						});
					} else if($i == 1){
						$graph->line($j, (int)$indent_1, $j+1, (int)$indent_2, function ($draw) {
					    	$draw->color('#00FF00');
						});
						$graph->line($j+1, (int)$indent_2, $j+2, (int)$indent_3, function ($draw) {
						    $draw->color('#00FF00');
						});
					} else if($i == 2){
						$graph->line($j, (int)$indent_1, $j+1, (int)$indent_2, function ($draw) {
					    	$draw->color('#0000FF');
						});
						$graph->line($j+1, (int)$indent_2, $j+2, (int)$indent_3, function ($draw) {
						    $draw->color('#0000FF');
						});
					}
					
				}
			}
			return $graph;	
		}
		
	}
}

?>