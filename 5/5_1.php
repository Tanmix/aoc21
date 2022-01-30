<?php
function raz($str)
{
    $p = strpos($str, ",");
    $xy[0] = (int)substr($str, 0, $p);
    $xy[1] = (int)substr($str, $p+1);
    return $xy;
}

$arr = file('5.txt', FILE_IGNORE_NEW_LINES);
$arr1 = array_fill(0, 1000, array_fill(0, 1000, 0));
for ($k = 0; $k < count($arr); $k++) {
    $mass[$k] = explode('->', $arr[$k]);
    list($x1, $y1) = raz($mass[$k][0]);
    list($x2, $y2) = raz($mass[$k][1]);
    if ($x1 == $x2) {
        if ($y1 > $y2) {
            $i = $y2;
            $j = $y1;
        } else {
            $i = $y1;
            $j = $y2;
        }
        while ($i <= $j) {
            $arr1[$i][$x1] += 1;
            $i++;
        }
    } elseif ($y1 == $y2) {
        if ($x1 > $x2) {
            $i = $x2;
            $j = $x1;
        } else {
            $i = $x1;
            $j = $x2;
        }
        while ($i <= $j) {
            $arr1[$y1][$i] += 1;
            $i++;
        }
    }
}
$count = 0;
foreach ($arr1 as $key => $item) {
    foreach ($item as $key1 => $value) {
        if ($value > 1) {
            $count += 1;
        }
    }
}
echo $count;
?>