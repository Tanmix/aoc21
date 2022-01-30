<?php
function splitu($arr)
{
    $i = 0;
    $fl = false;
    while ($i < count($arr) && !$fl) {
        if (is_numeric($arr[$i]) && $arr[$i] > 9) {
            $value = $arr[$i];
            array_splice($arr, $i, 1, ['[', floor($value / 2), ',', ceil($value / 2), ']']);
            $fl = true;
        }
        $i++;
    }
    return $arr;
}


function reduce($sum)
{
    $arr = str_split($sum);
    $flag = true;
    while ($flag) {
        $occurrences = 0;
        $chislo = null;
        $flag = false;
        $i = 0;
        while (!$flag && $i < count($arr) - 3) {
            if ($arr[$i] === '[') {
                $occurrences++;
                if ($occurrences >= 5 && is_numeric($arr[$i + 1]) && is_numeric($arr[$i + 3])) {
                    if (!is_null($chislo)) {
                        $arr[$chislo] += (int)$arr[$i + 1];
                    }
                    $j = $i + 4;
                    while ($j < count($arr) && !is_numeric($arr[$j])) {
                        $j++;
                    }
                    if (isset($arr[$j])) {
                        $arr[$j] += (int)$arr[$i + 3];
                    }
                    array_splice($arr, $i, 5, 0);
                    $flag = true;
                }
            } elseif ($arr[$i] === ']') {
                $occurrences--;
            } elseif (is_numeric($arr[$i])) {
                $chislo = $i;
            }
            $i++;
        }
        if (!$flag) {
            $arr1 = splitu($arr);
            if ($arr1 !== $arr) {
                $arr = $arr1;
                $flag = true;
            }
        }
    }
    return implode($arr);
}


function finalSum($snailfish)
{
    $i = 0;
    while ($i < count($snailfish) - 3) {
        if (is_numeric($snailfish[$i + 1]) && is_numeric($snailfish[$i + 3])) {
            $sum = 3 * $snailfish[$i + 1] + 2 * $snailfish[$i + 3];
            array_splice($snailfish, $i, 5, $sum);
            $i = -1;
        }
        $i++;
    }
    return $snailfish[0];
}

$arr = file('18.txt', FILE_IGNORE_NEW_LINES);
$countArr = count($arr);
for ($i = 0; $i < $countArr; $i++) {
    $snailfish = $arr[$i];
    for ($j = 0; $j < $countArr; $j++) {
        if ($i != $j) {
            $sum = '['.$snailfish.','.$arr[$j].']';
            $sum = reduce($sum);
            $fsum[] = finalSum(str_split($sum));
        }
    }
}

echo max($fsum).'<br>';
?>