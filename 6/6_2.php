<?php
function score ($day)
{
	$len = array_fill(1, $day + 1, 0);
	$len[1] = 1;
	$i = 2;
	while ($i <= $day) {
		if ($i < 9) {
			$len[$i] = 2;
		} else {
			$k = $len[$i - 7] - $len[$i - 8];
			if (($k > 0) and ($i + 2) <= $day) {
				$len[$i + 2] = $len [$i + 2] + $k;
			}
			$len[$i] = $len[$i] + $len [$i - 1] + $k;
		}
		$i++;
	}
	return $len;
}


$fifth = file_get_contents('6.txt');
$kol = score(256);
$fifth80 = 0;
foreach (count_chars($fifth, 1) as $i => $val) {
	if (($i) >= 48 and ($i) <= 57) {
		$fifth80 += $kol[count($kol) - (int)chr($i)] * $val;
	}
}
echo $fifth80;

?>