<?php
$area = file_get_contents('17.txt');
$pos = strpos($area, '=') + 1;

$x = explode('..', substr($area, $pos, strpos($area, ',') - $pos));
$y = explode('..', substr($area, strrpos($area, '=') + 1));
for ($i=0; $i < 2; $i++) {
	$y[$i] = (int)$y[$i];
	$x[$i] = (int)$x[$i];
}
$yVelocity = (abs($y[0]) - 1 < $y[1]) ? $y[1] : abs($y[0]) - 1;
$ymax = 0;
while ($yVelocity > 0) {
	$ymax += $yVelocity;
	$yVelocity = $yVelocity - 1;
}
echo $ymax;
?>
