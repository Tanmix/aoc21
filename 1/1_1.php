<?php
$measurements = file('1.txt', FILE_IGNORE_NEW_LINES);
$countInc = 0;
for ($i = 1; $i < count($measurements); $i++) {
    if ((int)$measurements[$i-1] < (int)$measurements[$i]) {
        $countInc++;
    }
}
echo $countInc;
?>