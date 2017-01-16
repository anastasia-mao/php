<?php

function dateFormat($str)
{
    date_default_timezone_set('Europe/Moscow');

    // определение текущего года и номера дня с начала года
    $cYear = date('Y');
    $cNDay = date('z');

    // массив для перевода названия месяца на русский
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

    //обработка и рзделение входной информации
    $dayNTime = explode(" ", $str);

    $year = explode(".", $dayNTime[0])[2];
    $day = explode(".", $dayNTime[0])[0];

    $Nday = date("z", strtotime($dayNTime[0]));

    //варианты написания дня и условия их применения
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