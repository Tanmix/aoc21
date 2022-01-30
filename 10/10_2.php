<?php
$arr = file('10.txt', FILE_IGNORE_NEW_LINES);
$score = [')' => 3, ']' => 57, '}' => 1197, '>' => 25137];
$point = [')' => 1, ']' => 2, '}' => 3, '>' => 4];
$characters = ['(' => ')', '[' => ']', '{' => '}', '<' => '>'];
for ($i = 0; $i < count($arr); $i++) {
    $j = 0;
    $corrupted = false;
    $open = array();
    while ($j < strlen($arr[$i]) && !$corrupted) {
        if (array_key_exists($arr[$i][$j],$characters)) {
            $open[] = $arr[$i][$j];
        } else {
            if ($arr[$i][$j] != $characters[array_pop($open)]) {
                $illegal[] = $arr[$i][$j];
                $corrupted = true;
            }
        }
        $j++;
    }
    if (!$corrupted) {
        $incomplete[$i] = array_reverse($open);
    }
}

$illegal = array_count_values($illegal);
$sum = 0;
foreach ($illegal as $key => $value) {
    $sum += $score[$key] * $value;
}


$arrPoint = array();
foreach ($incomplete as $i => $mass) {
    $sumPoint = 0;
    foreach ($mass as $key => $value) {
        $sumPoint = $sumPoint * 5 + $point[$characters[$value]];
    }
    $arrPoint [] = $sumPoint;
}
sort($arrPoint);
$middle = (count($arrPoint) - 1) / 2;
echo $arrPoint[$middle];
?>