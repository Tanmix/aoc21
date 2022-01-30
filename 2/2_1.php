<?php
$arr = file('2.txt', FILE_IGNORE_NEW_LINES);
for ($i = 0; $i < count($arr); $i++) {
    $arr1 = [];
    $arr1 = explode(' ', $arr[$i] ) ;
    $arr2[$arr1[0]] [] = $arr1[1];
}
$horizontal = 0;
$depth = 0;
foreach ($arr2 as $key => $item){
    foreach ($item as $value) {

        if ($key == 'forward') {
            $horizontal += $value;
        } elseif ($key == 'down') {
            $depth += $value;
        } elseif ($key == 'up') {
            $depth -= $value;
        }
    }
}
echo $horizontal * $depth;
?>