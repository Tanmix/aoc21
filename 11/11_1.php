<?php
function adjacentInc($arr, $flashes)
{
    for ($k = 0; $k < count($flashes); $k++)
    {
        $fi = $flashes[$k]['i'];
        $fj = $flashes[$k]['j'];
        $arr[$fi][$fj] = 0;
        for ($i = $fi - 1; $i <= $fi + 1; $i++) {
            for ($j = $fj - 1; $j <= $fj + 1; $j++) {
                if (isset($arr[$i][$j]) && $arr[$i][$j] != 0) {
                    if ($arr[$i][$j] == 9) {
                        $flashes[] = ['i' => $i, 'j' => $j];
                    }
                    $arr[$i][$j]++;
                }
            }
        }
    }
    return $arr;
}

function stepInc($arr)
{
    $flashes = array();
    foreach ($arr as $i => &$item){
        foreach ($item as $j => &$value){
        $value = (int)$value + 1;
        if ($value > 9) {
            $flashes[] = ['i' => $i, 'j' => $j];
        }
        }
    }
    $arr = adjacentInc($arr, $flashes);
    return $arr;
}
function kolFlashes($arr, $kol)
{
    foreach ($arr as &$item){
        foreach ($item as &$value){
            if ($value == 0) {
                $kol++ ;
            }
        }
    }
    return $kol;
}

$arr = file('11.txt', FILE_IGNORE_NEW_LINES);
for ($i = 0; $i < count($arr); $i++) {
    $mass[$i] = str_split($arr[$i]);
}
$amount = 0;

for ($i = 0; $i < 100; $i++) {
    $mass = stepInc($mass);
    $amount = kolFlashes($mass, $amount);
}
echo $amount;
?>