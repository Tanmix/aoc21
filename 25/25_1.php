<?php
function movesSouth($map)
{
    $countMap = count($map);
    $counti = count($map[0]);
    for ($j = 0; $j < $counti; $j++) {
        $fl = false;
        $i = 0;
        while ($i < $countMap - 1) {
            if ($map[$i][$j] === 'v' && $map[$i + 1 ][$j] === '.') {
                $map[$i][$j] = '.';
                $map[$i + 1][$j] = 'v';
                if ($i == 0 || $i == $countMap - 2) {
                    $fl = true;
                }
                $i++;
            }
            $i++;
        }
        if ($map[$countMap - 1][$j] === 'v' && $map[0][$j] === '.' && !$fl) {
            $map[$countMap - 1][$j] = '.';
            $map[0][$j] = 'v';
        }
    }

    return $map;
}


function movesEast($map)
{
    $countMap = count($map);
    for ($i = 0; $i < $countMap; $i++) {
        $counti = count($map[$i]);
        $fl = false;
        $j = 0;
        while ($j < $counti - 1) {
            if ($map[$i][$j] === '>' && $map[$i][$j + 1] === '.') {
                $map[$i][$j] = '.';
                $map[$i][$j + 1] = '>';
                if ($j == 0 || $j == $counti - 2) {
                    $fl = true;
                }
                $j++;
            }
            $j++;
        }
        if ($map[$i][$counti - 1] === '>' && $map[$i][0] === '.' && !$fl) {
            $map[$i][$counti - 1] = '.';
            $map[$i][0] = '>';
        }
    }
    $map = movesSouth($map);
    return $map;
}

$arr = file('25.txt', FILE_IGNORE_NEW_LINES);
$countArr = count($arr);
for ($i = 0; $i < $countArr; $i++) {
    $map[$i] = str_split($arr[$i], 1);
}
$kol = 0;
$end = false;
while (!$end) {
    $mapChanged = movesEast($map);
    if ($map != $mapChanged) {
        $map = $mapChanged;
    } else {
        $end = true;
    }
    $kol++;
}

echo $kol.'<br>';
?>