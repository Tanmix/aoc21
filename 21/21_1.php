<?php
function movePlayer($player, $rolls)
{
    $pos = ($player['position'] + $rolls) % 10;
    if ($pos == 0) {
        $pos = 10;
    }
    $player['position'] = $pos;
    $player['score'] += $pos;
    return $player;
}


$arr = file('21.txt', FILE_IGNORE_NEW_LINES);
$countArr = count($arr);
for ($i = 0; $i < $countArr; $i++) {
    $start = substr($arr[$i], strpos($arr[$i], ':') + 1);
    $j = (strpos($arr[$i],'Player 1') === false) ? 2 : 1;
    $players[$j]['position'] = (int) $start;
    $players[$j]['score'] = 0;
}
$j = 4;
$i = 1;
$counter = 0;
$k = 1;
while ($players[1]['score'] < 1000 && $players[2]['score'] < 1000) {
    $rolls = 0;
    for ($j = 0; $j < 3; $j ++) {
        if ($k > 100) {
            $k = 1;
        }
        $rolls += $k;
        $k++;
    }
    $rolls = $rolls % 10;
    $players[$i] = movePlayer($players[$i], $rolls);
    $i = ($i == 1 ? 2 : 1);
    $counter += 3;
}

$result = $players[$i]['score'] * $counter;

echo $result.'<br>';
?>