<?php
function stepInc($arr, $pos)
{
    foreach ($arr as $y => $item){
        foreach ($item as $x => $value){
            if ($x >= $pos) {
                if (!isset($arr[$y][$pos * 2 -$x])) {
                    $arr[$y][$pos * 2 - $x] = 1;
                }
                unset($arr[$y][$x]);
            }
        }

    }
    return $arr;
}
function kolFlashes($arr, $pos)
{
    if (isset($arr[$pos])){
        unset($arr[$pos]);
    }
    foreach ($arr as $y => $item){
        if ($y > $pos) {
            foreach ($item as $x => $value){
                if (!isset($arr[$pos * 2 - $y][$x])) {
                $arr[$pos * 2 - $y][$x] = 1;
                }
            }
            unset($arr[$y]);
        }
    }
    return $arr;
}

$arr = file('13.txt', FILE_IGNORE_NEW_LINES);
for ($i = 0; $i < count($arr) && ($arr[$i] != ''); $i++) {
    $y = (int)substr($arr[$i], strpos($arr[$i], ",")+1);
    $x = (int)substr($arr[$i], 0, strpos($arr[$i], ","));
    $mass[$y][$x] = 1;
}
for ($j = $i + 1; $j < count($arr); $j++) {
    $step = (int)substr($arr[$j], strpos($arr[$j], "=")+1);
    $koor = substr($arr[$j],  strpos($arr[$j], "=") - 1, 1);
    $instructions[] = [$koor, $step];
}
for ($i = 0; $i < count($instructions); $i++){
    if ($instructions[$i][0] == 'y') {
        $y = $instructions[$i][1];
        $mass = kolFlashes($mass, $y);
    } else {
        $x = $instructions[$i][1];
        $mass = stepInc($mass, $x);
    }

}
for ($i = 0; $i < $y; $i++) {
    for ($j = 0; $j < $x; $j++){
        if (isset($mass[$i][$j])) {
            echo '<font color = black> ## </font>';
        } else {
            echo '<font color = white> 00 </font>';
        }
    }
    echo '<br>';
}

?>