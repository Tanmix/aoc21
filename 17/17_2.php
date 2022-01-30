<?php
function minVelocity($par, $d)
{
	$a0 = 1;
	$an = 0;
	$s = 1;
	while ($s < $par) {
		$a0++;
		$s = ($a0 + $an) * (($an - $a0) / $d + 1) / 2;
	}
	return $a0;
}


$area = file_get_contents('17.txt');
$pos = strpos($area, '=') + 1;
$x = explode('..', substr($area, $pos, strpos($area, ',') - $pos));
$y = explode('..', substr($area, strrpos($area, '=') + 1));
for ($i=0; $i < 2; $i++) {
	$y[$i] = (int)$y[$i];
	$x[$i] = (int)$x[$i];
}

$ymax = (abs($y[0]) - 1 < $y[1]) ? $y[1] : abs($y[0]) - 1;
$ymin = ($y[0] <= 0) ? $y[0] : minVelocity($y[0], -1);
$min = $ymin;
$max = $ymax;
$nmax = (abs($y[0]) < $y[1]) ? $y[1] * 2 : abs($y[0]) * 2;
$kol = array();

while ($min <= $max) {
	$Velocity = $min;
	$probe = 0;
	for ($i = 0; $i <= $nmax; $i++) {
		if ($probe >= $y[0] && $probe <= $y[1]) {
			$yT[$i][] = $min;
		}
		$probe += $Velocity;
		$Velocity--;
	}
$min++;
}

$n = array_keys($yT);
$d = ($x[0] > 0) ? -1 : 1;
$xmin = minVelocity($x[0], $d);
$xmax = (ceil($x[1] / 2) < $x[0]) ? ceil($x[1] / 2) : $x[1];
$countxy = 0;

while ($xmin <= $xmax) {
	$zero = false;
	$arryn = array();
	foreach($n as $value) {
		if (!$zero) {
			$an = $xmin + ($value - 1) * $d;
			if ($an < 0) {
				$an = 0;
			}
			$s = ($xmin + $an) * (($an - $xmin) / $d + 1)  / 2;
			if ($s >= $x[0] && $s <= $x[1]){
				$arryn = array_merge($arryn, $yT[$value]);
				if ($an == 0) {
					$zero = true;
				}
			} elseif ($s > $x[1]) {
				break;
			}
		} else {
			$arryn = array_merge($arryn, $yT[$value]);
		}
	}
	$countxy += count(array_unique($arryn));
	$xmin++;
}

if ($xmax != $x[1]) {
	$countxy += ($x[1] - $x[0] + 1) * count($yT[1]);
}

echo $countxy;
?>
