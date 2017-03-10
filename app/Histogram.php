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
		$img->makeGrayscale();
		for($i = 0; $i < $img->getRows(); ++$i) {
			for($j = 0; $j < $img->getCols(); ++$j) {
				++$this->histogram[($img->getImages()->pickColor($i, $j))[0]];
				//($img->getImages()->pickColor($i, $j)[0]);
			}
		}
		// for($i = 0; $i < 256; ++$i)
		// echo $i . ': ' . $this->histogram[$i] . '<br>';
	}

	public function __construct($type = 'grayscale', \app\swiftImg $img) {
		$this->type = $type;
		$this->makeHistogram($img);
	}

	public function histogamFilter(\app\swiftImg $img) {
		$sum = 0;
		$newHistogram = [];
		for($i = 0; $i < count($this->histogram); ++$i) {
	        $sum += $this->histogram[$i];
	        $newHistogram[$i] = $sum;
	    }

	    $alpha = 255 / ($img->getRows() * $img->getCols());
	    $c = 0;
	    for($i = 0; $i < $img->getRows(); ++$i) {
			for($j = 0; $j < $img->getCols(); ++$j) {
				$c = ($img->getImages()->pickColor($i, $j))[0];
				$img->getImages()->pixel([$newHistogram[$c] * $alpha, $newHistogram[$c] * $alpha, $newHistogram[$c] * $alpha], $i, $j);
			}
		}
	}

	public function histogramGraph(\app\swiftImg $img) {
		
		$graph = Image::canvas(255, 255, '#000000');
		$indent_1 = 0;
		$indent_2 = 0;

		for($i = 0; $i < 255; $i+=2) {
			$indent_1 = 255 - (($this->histogram[$i] / ($img->getCols() * $img->getRows()))*255)*50;
			$indent_2 = 255 - (($this->histogram[$i+1] / ($img->getCols() * $img->getRows()))*255)*50;
			//$graph->pixel([200, 200, 200], $i, (int)($indent));
			$graph->line($i, (int)$indent_1, $i+1, (int)$indent_2, function ($draw) {
			    $draw->color('#FFFFFF');
			});
		}

		return $graph;
	}
}

?>