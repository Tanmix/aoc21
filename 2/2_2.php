<?php
$arr = file('2.txt', FILE_IGNORE_NEW_LINES);
$horizontal = 0;
$depth = 0;
$aim = 0;
for ($i = 0; $i < count($arr); $i++) {
    $arr1 = [];
    $arr1 = explode(' ', $arr[$i] ) ;
    if ($arr1[0] == 'forward') {
        $horizontal += $arr1[1];
        $depth += $arr1[1] * $aim;
    } elseif ($arr1[0] == 'down') {
        $aim += $arr1[1];
    } elseif ($arr1[0] == 'up') {
        $aim -= $arr1[1];
    }
}
echo $horizontal * $depth;
?>