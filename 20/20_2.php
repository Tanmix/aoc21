<?php
$arr = file('20.txt', FILE_IGNORE_NEW_LINES);
$countArr = count($arr);
$algorithm = str_replace('#', '1', str_replace('.', '0', $arr[0]));
for ($i = 2; $i < $countArr; $i++) {
    $plus = str_repeat('0', 100);
    $arr[$i] = $plus.$arr[$i].$plus;
    $input[] = str_split(str_replace('#', '1', str_replace('.', '0', $arr[$i])),1);
}
$countImpStr = count($input[0]);
$zero = array_fill(0, 100, array_fill(0, $countImpStr, '0'));
$input = array_merge($zero, $input, $zero);
$enhancing = 0;

while ($enhancing < 50) {
    $inputNew = [];
    for ($i = 0; $i < count($input) - 2; $i++) {
        for ($j = 0; $j < count($input[$i]) - 2; $j++) {
            $binary = '';
            for ($k = $i; $k < $i + 3; $k++) {
                for ($n = $j; $n < $j + 3; $n++) {
                    $binary .= $input[$k][$n];
                }
            }
            $binary = bindec($binary);
            $pixel = $algorithm[$binary];
            $inputNew[$i][$j] = $pixel;
        }
    }
    $input = [];
    $input = $inputNew;
    $enhancing++;
}
$lit = 0;
for ($i = 0; $i < count($input); $i++) {
    for ($j = 0; $j < count($input[$i]); $j++) {
    $lit += ($input[$i][$j] === '1') ? 1 : 0;
    }
}

echo $lit.'<br>';
?>