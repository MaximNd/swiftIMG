<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: X-Requested-With, content-type');
//use public\php\swiftIMG_site;

require "swiftImg.php";
//require "SobelEdgeDetector.php";
require "CannyEdgeDetector.php";
require "RegionGrowing.php";
require "Histogram.php";
require "swiftIMG_site.php";




if(isset($_POST['paramsArr']) && isset($_POST['imgParams'])) {



	function toBase64($url) {
		$path = $url;
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
		return $base64;
	}
	// var_dump($_POST['paramsArr']);
	// echo "<br>";
	// var_dump($_POST['imgParams']);

	

	

	$methods = $_POST['paramsArr'];
	$methodsLength = count($methods);
	


	//var_dump($methods);
	$method = '';
	$params = [];
	$imgNameArr = explode('/', $_POST['imgParams']['img']);
	$imgNameArrLen = count($imgNameArr);
	$imgName = $imgNameArr[$imgNameArrLen - 1];
	$imgNameArr2 = explode('.', $imgName);
	$imgNameArr2Len = count($imgNameArr2);
	$imgName = '';
	for($i = 0; $i < $imgNameArr2Len - 1; ++$i) {
		$imgName .= $imgNameArr2[$i];
	}
	//echo $imgName;
	$isSpecImg = false;
	$SpecImg = 0;

		foreach ($methods as $methodsKey => $methodsValue) {
			foreach ($methodsValue as $key => $value) {
				if($key == 'method') {
					$imgName .= "-$value(";
				} else if ($key == 'params' && is_array($value)) {
					foreach ($value as $valueKey => $valueValue) {
						if($valueKey == 'image' && is_array($valueValue)) {
							$newImgNameArr = explode('/', $valueValue['img']);
							$newImgNameArrLen = count($newImgNameArr);
							$newImgName = $newImgNameArr[$newImgNameArrLen - 1];
							$imgName .= "$newImgName";
						} else {
							if($valueValue == '') {
								$valueValue = NULL;
							}
							$imgName .= "$valueValue";
						}
					}
				}
			}
			$imgName .= ")";

		}
		$imgName .= '.' . $imgNameArr2[$imgNameArr2Len - 1];
		
		$swiftIMG_site = new \app\swiftIMG_site();
		//echo $imgName;
		if($swiftIMG_site->isExistImage($imgName, $_POST['imgParams']['key'])) {
			$imgName = str_replace(array('/', ':'), '', $imgName);
			echo toBase64($swiftIMG_site->pathToSaveServer($_POST['imgParams']['key']) . "$imgName");
		} else {

			$img = new \app\swiftIMG($_POST['imgParams']['key'], toBase64($_POST['imgParams']['img']), $_POST['imgParams']['type'], $_POST['imgParams']['quality']);

			foreach ($methods as $methodsKey => $methodsValue) {
				foreach ($methodsValue as $key => $value) {
					if($key == 'method') {
						$method = $value;

						

					} else if ($key == 'params' && is_array($value)) {
						foreach ($value as $valueKey => $valueValue) {
							if($valueKey == 'image' && is_array($valueValue)) {
								//$newImg = new \app\swiftIMG($valueValue['key'], toBase64($valueValue['img']), $valueValue['type'], $valueValue['quality']);
								$params[] = $valueValue['img'];
								
							} else {
								if($valueValue == '') {
									$valueValue = NULL;
								}
								$params[] = $valueValue;
								
							}
						}
						//var_dump($params);
					}
				}
				
				if ($method == 'histogramGraph' || $method == 'CannyBorder' || $method == 'SobelBorder') {
					$isSpecImg = true;
					$SpecImg = $img->$method(...$params);
					$params = [];
					continue;
				}
				if($isSpecImg) {
					if($method == 'save') {
						echo $SpecImg->save($imgName, ...$params);
					} else if($method == 'outPut') {
						echo $SpecImg->outPut();
					} else {
						echo "After histogramGraph, CannyBorder and SobelBorder must save() or outPut() method!!!!";
					}
					$isSpecImg = false;
					break;
				}


				if($method != 'outPut' && $method != 'save') {
					$img->$method(...$params);
					$params = [];
				} else if ($method == 'save') {
					echo $img->save($imgName, ...$params);					
				} else {
					echo $img->$method();
				}
			}
		}

	
	
		
	

} else {
	echo "ERROR!";
}
// $path = "E://OpenServer/domains/localhost/testheroku/images/img.jpg";
// 		$type = pathinfo($path, PATHINFO_EXTENSION);
// 		$data = file_get_contents($path);
// 		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

// $img2 = new \app\swiftIMG("key", $base64);

// echo $img2->histogramGraph('color')->outPut();


?>