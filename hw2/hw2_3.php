<?php
$arr = [ 1, 2, 3, 8, 14, 89, 45, 0 ];

for ( $i = 0; $i < count($arr); $i++ ){
    $f = 0;
    for ( $j = 0; $j < count($arr) - $i; $j++ ){
        if ( $arr[$j] > $arr[$j + 1] ){
            $temp = $arr[$j];
            $arr[$j] = $arr[$j + 1];
            $arr[$j + 1] = $temp;
            $f++;
            break;
        }
    }
    if ($f == 0){
        break;
    }
}
echo "bubble sorting \n"
print_r($arr); // вывод человеко-читабельной информации
//for ( $i = 0; $i < count($arr); $i++ ) echo $arr[$i].' ';
//foreach ($arr as $val) echo $val.' ';
//var_dump($arr); // вывод полной подробной информации
//var_export($arr); // вывод для парсеров