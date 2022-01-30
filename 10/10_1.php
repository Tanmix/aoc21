<?php
$arr = file('10.txt', FILE_IGNORE_NEW_LINES);
$score = [')' => 3, ']' => 57, '}' => 1197, '>' => 25137];
$characters = ['(' => ')', '[' => ']', '{' => '}', '<' => '>'];
for ($i = 0; $i < count($arr); $i++) {
    $j = 0;
    $corrupted = false;
    $open = array();
   while ($j < strlen($arr[$i]) && !$corrupted) {
       if (array_key_exists($arr[$i][$j],$characters)) {
           $open[] = $arr[$i][$j];
       } else {
           if ($arr[$i][$j] != $characters[array_pop($open)]) {
               $illegal[] = $arr[$i][$j];
               $corrupted = true;
           }
       }
       $j++;
   }
}

$illegal = array_count_values($illegal);
$sum = 0;
foreach ($illegal as $key => $value){
    $sum += $score[$key] * $value;
}

echo $sum;
?>