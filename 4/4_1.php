<?php
function delete($loto, $number)
{
	foreach ($loto as $nboards => $vboards) {
 		foreach ($vboards as $kst => $vst) {
 			foreach ($vst as $key => $value) {
 				if ((int)$value == $number) {
 					unset($loto[$nboards][$kst][$key]);
 				}
 			}
 		}
	}
	return $loto;
}

function changeling($loto)
{
	$loto1 = array();
	foreach ($loto as $kst => $vst) {
 		foreach ($vst as $key => $value) {
			$loto1[$key][$kst] = $value;
		}
	}
	return $loto1;
}

function summa($loto, $board)
{
	$sum = 0;
	foreach ($loto[$board] as $kst => $vst) {
 		foreach ($vst as $key => $value) {
 			$sum += (int)$value;
 		}
	}
 	return $sum;
}

function examination ($loto)
{
	for ($i = 1; $i <= count($loto); $i++) {
		$loto1 = changeling($loto[$i]);
		for ($j = 0; $j < 5; $j++) {
			if (!$loto[$i][$j] || !isset($loto1[$j])) {
				return $i;
			}
		}
	}
	return 0;
}


$str = file('4.txt', FILE_IGNORE_NEW_LINES);
$numbers = explode(',', $str[0]);
$j = 0;
for ($i = 1; $i < count($str); $i++) {
	if ($str[$i]) {
		$loto[$j][] = str_split($str[$i], 3);
	} else {
		$j++;
	}
}
$bingo = 0;
$num = 0;
while ($num < count($numbers) && !$bingo) {
	$number = (int)$numbers[$num];
	$loto = delete($loto, $number);
	$bingo = examination ($loto);
	$num++;
}
if ($bingo){
	$sum = summa($loto, $bingo);
}


echo $sum * $number.'<br>';
?>