<?php
function comparison($str, $comp)
{
    if ($comp){
        return (substr_count($str, '1') >= substr_count($str, '0') ) ? '1' : '0';
    } else {
        return (substr_count($str, '1') < substr_count($str, '0') ) ? '1' : '0';
    }
}

function f1($arr, $comp)
{
    $res = '';
    for ($j = 0; $j < strlen($arr[0]); $j++) {
        $str = '';
        for ($i = 0; $i < count($arr); $i++) {
            $str .=  $arr[$i][$j];
        }
        $max = comparison($str, $comp);
        $res .= $max;
    }
    return $res;
}

$arr = file('3.txt', FILE_IGNORE_NEW_LINES);
$oxygen = bindec(f1($arr, true));
$scrubber = bindec(f1($arr, false));
echo $oxygen * $scrubber;
?>