<?php

$arr = [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ];
$count = count($arr);

for ($i=0; $i < (int)($count / 2); $i++) {
    //echo 'i:'.$i."\n";
    //echo $arr[$i]." ".$arr[$count -1 - $i]."\n";
    $arr[$i] += $arr[$count - 1 - $i];
    //echo $arr[$i]." ".$arr[$count -1 - $i]."\n";
    $arr[$count -1 - $i] = $arr[$i] - $arr[$count -1 - $i];
    //echo $arr[$i]." ".$arr[$count -1 - $i]."\n";
    $arr[$i] = $arr[$i] - $arr[$count -1 - $i];
    //echo $arr[$i]." ".$arr[$count -1 - $i]."\n";

}

echo "array mirror:\n";
print_r($arr);