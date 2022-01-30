<?php

$map = file('9.txt', FILE_IGNORE_NEW_LINES);
for ($i = 0; $i <= (count($map) + 1); $i++) {
	for ($j = 0; $j <= (strlen($map[0]) + 1); $j++) {
		if ($i == 0 || $j == 0 || $i == (count($map) + 1) || $j == (strlen($map[0]) + 1)) {
			$heightmap[$i][$j] = 10;
		} else {
			$heightmap[$i][$j] = (int)$map[$i-1][$j-1];
		}
	}
}
for ($i = 1; $i < (count($heightmap) - 1); $i++) {
	for ($j = 1; $j < (count($heightmap[$i]) - 1); $j++) {
		$znach = $heightmap[$i][$j];
		$review1 = $znach < $heightmap[$i + 1][$j] && $znach < $heightmap[$i - 1][$j];
		$review2 = $znach < $heightmap[$i][$j + 1]&& $znach < $heightmap[$i][$j - 1];
		if ($review1 && $review2) {
			 $lowpoints[] = $znach;
		}
	}
}
$sumrisk = 0;
foreach ($lowpoints as $key => $val) {
	$sumrisk += $val + 1;
}
echo $sumrisk;

?>