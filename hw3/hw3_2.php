<?php
function palindrom($str)
{
    $c = strlen($str); //определить кол-во символов в строке
    for ($i = 0; $i < (int)($c / 2); $i++){
        if ($str[$i] == $str[$c - $i - 1]){
            if ($i == (int)($c / 2) - 1){
                return $str.' - a palindrom';
            }
        }
        else {
            return $str.' - NOT a palindrom';
        }
    }
}

echo palindrom('1331');