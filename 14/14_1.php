<?php
function newTemplate($arr, $template)
{
    $i = 0;
    $new = $template[0];
    while ($i < strlen($template) - 1) {
        $pair = substr($template, $i, 2);
        if (isset($arr[$pair])){
            $new .= $arr[$pair].$pair[1];
        } else {
            echo 'error';
        }
        $i++;
    }
    return $new;
}

$arr = file('14.txt', FILE_IGNORE_NEW_LINES);
$template = $arr[0];
for ($i = 2; $i < count($arr); $i++) {
    $x = substr($arr[$i], 0, strpos($arr[$i], " "));
    $y = substr($arr[$i], strrpos($arr[$i], " ")+1);
    $rules[$x] = $y;
}
for ($i = 0; $i < 10; $i++){
    $template = newTemplate($rules, $template);
}
$mass = count_chars($template, 1);

echo max($mass) - min($mass);
?>