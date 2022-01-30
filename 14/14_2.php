<?php
function chars($template)
{
    $new = array();
    foreach ($template as $key => $value) {
        $n1 = $key[0];
        $n2 = $key[1];
        if (isset($new[$n1])){
            $new[$n1] += $value;
        } else {
            $new[$n1] = $value;
        }
        if (isset($new[$n2])){
            $new[$n2] += $value;
        } else {
            $new[$n2] = $value;
        }
    }
    return $new;
}

function newTemplate($arr, $template)
{
    $new = array();
    foreach ($template as $key => $value) {
        $n1 = $key[0].$arr[$key];
        $n2 = $arr[$key].$key[1];
        if (isset($new[$n1])) {
            $new[$n1] += $value;
        }
        else {
            $new[$n1] = $value;
        }

        if (isset($new[$n2])) {
            $new[$n2] += $value;
        }
        else {
            $new[$n2] = $value;
        }
    }
    return $new;
}

$arr = file('14.txt', FILE_IGNORE_NEW_LINES);

for ($i = 2; $i < count($arr); $i++) {
    $x = substr($arr[$i], 0, strpos($arr[$i], " "));
    $y = substr($arr[$i], strrpos($arr[$i], " ")+1);
    $rules[$x] = $y;
}
$i = 0;
$template = array();
$first = $arr[0][0];
$end = $arr[0][strlen($arr[0]) - 1];
while ($i < strlen($arr[0]) - 1) {
    $pair = substr($arr[0], $i, 2);
    if (isset($template[$pair])){
        $template[$pair] += 1;
    } else {
         $template[$pair] = 1;
    }
    $i++;
}



for ($i = 0; $i < 40; $i++){
    $template = newTemplate($rules, $template);
}
$mass = chars($template);
foreach ($mass as $key => $value){
    if ($key == $first || $key == $end) {
        $mass[$key] = ($value + 1) / 2;
    } else {
        $mass[$key] = $value / 2;
    }
}
echo max($mass) - min($mass);
?>