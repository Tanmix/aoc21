<?php

function countingSymbol($arr)
{
	$str = implode('', $arr);
	foreach (count_chars($str, 1) as $key => $value) {
		$mas[$value] = (isset($mas[$value])) ? $mas[$value].chr($key) : chr($key);
		}
	return $mas;
}

function choice($arr)
{
	foreach ($arr as $key => $value) {
		$len = strlen($value);
		if ($len == 2 || $len == 4) {
			$mas[$len] = $value;
		}
	}
	return $mas;
}


function outputvalue($mas3, $outv)
{
	$st = array();
	foreach ($mas3 as $key => $value) {
		$i = 0;
		while ($i < strlen($outv)) {
			if ($outv[$i] == $value) {
				$st[] = $key;
				$i = strlen($outv);
			}
			$i++;
		}
	}
	sort($st);
	return implode('', $st);
}

function compliance($mas, $mas1)
{
	foreach ($mas as $key => $value) {
		$mas2[$value] = $mas1[$key];
	}
	return $mas2;
}

function fullcompliance($mas2, $nam, $out)
{
	$mas3 = array();
	$nam1 = $nam;
	for ($i = 0; $i < strlen($nam1); $i++) {
		if (isset($mas2[$nam1[$i]])) {
			$nam = str_replace($nam1[$i], '', $nam);
			$out = str_replace($mas2[$nam1[$i]], '', $out);
		}
	}
	foreach ($mas2 as $key => $value) {
		if (in_array($nam,str_split($key, 1))) {
			$mas3[$nam] = $out;
			$mas3[str_replace($nam, '', $key)] = str_replace($out, '', $value);
		} else {
			$mas3[$key] = $value;
		}
	}
	return $mas3;
}


$numbers = ['abcefg', 'cf', 'acdeg', 'acdfg', 'bcdf', 'abdfg', 'abdefg', 'acf', 'abcdefg', 'abcdfg'];
$patterns = file('8.txt', FILE_IGNORE_NEW_LINES);
for ($i = 0; $i < count($patterns); $i++) {
	$delimiter = strpos($patterns[$i], '|');
	$output[] = explode(' ', trim(substr($patterns[$i], $delimiter + 1)));
	$pattern[] = explode(' ', trim(substr($patterns[$i], 0, $delimiter - 1)));
}
$numbsynbol = countingSymbol($numbers);

$sum = 0;
foreach ($pattern as $key => $mas) {
	$pat14 = choice($mas);
	$prim = (compliance($numbsynbol,countingSymbol($mas)));
	$full = fullcompliance($prim, $numbers[1], $pat14[2]);
	$full = fullcompliance($full, $numbers[4], $pat14[4]);
	$result = '';
	foreach ($output[$key] as $k => $value) {
		$signal = outputvalue($full, $value);
		$i = 0;
		while ($i < count($numbers)) {
			if ($signal == $numbers[$i]){
				$result .= $i;
				$i = count($numbers);
			} else {
				$i++;
			}
		}
	}

	$sum += $result;

}
echo $sum;
?>