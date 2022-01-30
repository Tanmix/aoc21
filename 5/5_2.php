<?php
function raz($str)
{
    $p = strpos($str, ",");
    $xy[0] = (int)substr($str, 0, $p);
    $xy[1] = (int)substr($str, $p+1);
    return $xy;
}

function exchange($coordinat1 ,$coordinat2)
{
    if ($coordinat1 > $coordinat2) {
        $coordinat[0] = $coordinat2;
        $coordinat[1] = $coordinat1;
    } else {
        $coordinat[0] = $coordinat1;
        $coordinat[1] = $coordinat2;
    }
    return $coordinat;
}

$arr = file('5.txt', FILE_IGNORE_NEW_LINES);
$arr1 = array_fill(0, 1000, array_fill(0, 1000, 0));
for ($k = 0; $k < count($arr); $k++) {
    $mass[$k] = explode('->', $arr[$k]);
    list($x1, $y1) = raz($mass[$k][0]);
    list($x2, $y2) = raz($mass[$k][1]);
    if ($x1 == $x2) {
        list($i, $j) = exchange($y1, $y2);
        while ($i <= $j) {
            $arr1[$i][$x1] += 1;
            $i++;
        }
    } elseif ($y1 == $y2) {
        list($i, $j) = exchange($x1, $x2);
        while ($i <= $j) {
            $arr1[$y1][$i] += 1;
            $i++;
        }
    }else {
            $fx = ($x1 < $x2) ? 1 : 0;
            $fy = ($y1 < $y2) ? 1 : 0;
            while (($x1 != $x2) && ($y1 != $y2)) {
                $arr1[$y1][$x1] += 1;
                $x1 = ($fx) ? $x1 + 1 : $x1 - 1;
                $y1 = ($fy) ? $y1 + 1 : $y1 - 1;
            }
             $arr1[$y2][$x2] += 1;
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