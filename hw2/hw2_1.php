<?php
$plates = 220;
$fairy = 10;

while ( $plates > 0 && $fairy > 0){
    $plates --;
    $fairy -= 0.5;
    echo $fairy." fairy left\n";
}
if ($fairy == 0 && $plates == 0){
    echo "all plates clean and no more fairy\n";
}
elseif ($plates == 0){
    echo $fairy." fairy left and all plates clean\n";
}
else{
    echo $plates." plates left and no more fairy\n";
}