<?php
$measurements = file('1.txt', FILE_IGNORE_NEW_LINES);
$countInc = 0;

for ($i = 0; $i < count($measurements) - 2; $i++) {
    $sum = 0;
    for ($j = $i; $j < ($i + 3); $j++) {
        $sum += (int)$measurements[$j];
    }
    $arr[] = $sum;
}
for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i-1] < $arr[$i]) {
        $countInc++;
    }
}
echo $countInc;
?>