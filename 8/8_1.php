<?php
$numbers = ['abcefg', 'cf', 'acdeg', 'acdfg', 'bcdf', 'abdfg', 'abdefg', 'acf', 'abcdefg', 'abcdfg'];
$patterns = file('8.txt', FILE_IGNORE_NEW_LINES);
for ($i = 0; $i < count($patterns); $i++) {
	$delimiter = strpos($patterns[$i], '|');
	$outvalues = substr($patterns[$i], $delimiter + 1);
	$output[] = explode(' ', trim($outvalues));
}
	$numbkol = [strlen($numbers[1]), strlen($numbers[4]), strlen($numbers[7]), strlen($numbers[8])] ;
$sum = 0;
foreach ($output as $key => $mas) {
	foreach ($mas as $key1 => $value) {
		$kol = strlen($value);
		if (in_array($kol, $numbkol)) {
			$sum++;
		}
	}
}
echo $sum;
?>