<?php

function alignment($arr, $position)
{
	$fuel = 0;
	$kol = count($arr);
	for ($i = 0; $i < $kol; $i++) {
		$n = abs($arr[$i] - $position);
		$s = ((2 + ($n - 1)) * $n) / 2;
		$fuel = $fuel + $s;
	}
	return $fuel;
}

function mass($arr, $posit, $bol)
{
	$arr1 = array();
	for ($i = 0; $i < count($arr); $i++) {
		if ($bol) {
			if ($arr[$i] < $posit) {
			$arr1[] = $arr[$i];
			}
		} else {
			if ($arr[$i] > $posit) {
			$arr1[] = $arr[$i];
			}
		}
	}
	return $arr1;
}

$str = file_get_contents('7.txt');
str_replace(PHP_EOL, ' ', $str);
$arr =  explode(',', $str);

sort($arr);
$arr1 = $arr;
$fl = false;
do {
	$aver = round(array_sum($arr1)/count($arr1));
	$costs0 = alignment($arr, $aver - 1);
	$costs1 = alignment($arr, $aver);
	$costs2 = alignment($arr, $aver + 1);
	if ($costs1 > $costs0){
		$arr1 = mass($arr1, $aver, true);
	} elseif ($costs1 > $costs2) {
		$arr1 = mass($arr1, $aver, false);
	} else {
		$fl = true;
	}
} while (!$fl);


echo $costs1;

?>