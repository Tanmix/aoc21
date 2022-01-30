<?php
function del($arr, $j, $max)
{
    $arr1 = [];
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i][$j] == $max) {
            $arr1[] = $arr[$i];
        }
    }
    return $arr1;
}

function comparison($str, $comp)
{
    if ($comp){
        return (substr_count($str, '1') >= substr_count($str, '0') ) ? 1 : 0;
    } else {
        return (substr_count($str, '1') < substr_count($str, '0') ) ? 1 : 0;
    }
}

function f1($arr, $j, $comp)
{
    while (count($arr) != 1){
        $str = '';
        for ($i = 0; $i < count($arr); $i++) {
            $str .=  $arr[$i][$j];
        }
        $max = comparison($str, $comp);
        $arr = del($arr, $j, $max);
        $j++;
    }
    return $arr[0];
}

$arr = file('3.txt', FILE_IGNORE_NEW_LINES);
$oxygen = bindec(f1($arr, 0, true));
$scrubber = bindec(f1($arr, 0, false));
echo $oxygen * $scrubber;
?>