<?php

function dateFormat($str)
{
    date_default_timezone_set('Europe/Moscow');

    $cYear = date('Y');
    $cNDay = date('z');

    $monthPlural = [
        "Января",
        "Февраля",
        "Марта",
        "Апреля",
        "Мая",
        "Июня",
        "Июля",
        "Августа",
        "Сентября",
        "Октября",
        "Ноября",
        "Декабря"
    ];

    $dayNTime = explode(" ", $str);

    $year = explode(".", $dayNTime[0])[2];
    $day = explode(".", $dayNTime[0])[0];

    $Nday = date("z", strtotime($dayNTime[0]));

    if ($cYear == $year && $cNDay == $Nday){
        return 'сегодня в '.$dayNTime[1];
    } elseif ($cYear == $year && $cNDay == ($Nday+1)){
        return 'вчера в '.$dayNTime[1];
    } elseif ($cYear == $year && $cNDay == ($Nday-1)) {
        return 'завтра в '.$dayNTime[1];
    } else {
        return $day.' '.$monthPlural[(int)explode(".", $dayNTime[0])[1]-1].' '.$year.' in '.$dayNTime[1];
    }

}

echo dateFormat ('17.01.3017 19:50');