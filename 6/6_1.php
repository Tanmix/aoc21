<?php
function score ()
{
	$s = "1";
	$i = 0;
	while ($i <= 80) {
		$len[$i] = strlen($s);
		for ($j = 0; $j < $len[$i]; $j++){
			if ($s[$j] == "0") {
				$s = substr_replace($s, "6", $j, 1);
				$s .= "8";
			} else {
				$ch = (int)$s[$j] - 1;
				$s = substr_replace($s, $ch, $j, 1);
			}
		}
		$i++;
	}
	return $len;
}


$fifth = file_get_contents('6.txt');
$kol = score();
$fifth80 = 0;
foreach (count_chars($fifth, 1) as $i => $val) {
	if (($i) >= 48 and ($i) <= 57) {
		$fifth80 += $kol[count($kol) - (int)chr($i)] * $val;
	}
}
echo $fifth80;

?>