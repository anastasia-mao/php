<?php

    // Задача 1
    $minute = date('i');
    echo ' Ex 1: ';
    echo $minute%5>2 ? 'Red'."\n" : 'Green'."\n";

    // Задача 2
    $s = 1000; // 10соток
    $sg = 15*25; // грядка
    echo $s>$sg ? ' Ex 2: '.($s%$sg).'sq.m'."\n" : " Ex 2: not enough space\n";

    // Задача 3
    $a = [0,0];
    $b = [10, 0];
    $c = [0, 10];

    $d1 = ($a[0]-$b[0])**2+($a[1]-$b[1])**2;
    $d2 = ($a[0]-$c[0])**2+($a[1]-$c[1])**2;
    $d3 = ($b[0]-$c[0])**2+($b[1]-$c[1])**2;
    echo ' Ex 3: ';
    echo $d1 === $d2+$d3 || $d2 === $d1+$d3 || $d3 === $d1+$d2 ? 'yes'."\n" : 'no'."\n";