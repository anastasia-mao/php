<?php

function daysInY($y) // функция определяющая кол-во дней в году (весокосный или нет)
{
    if ( $y % 4 == 0 ){
        if ( $y % 400 == 0 ){
            return 365;
        }
        elseif ( $y % 100 == 0){
            return 364;
        }
        return 365;
    }
    return 364;
}

function daysBeforeNY() // функция вычисляющая сколко дней до нового года
{
    $year = date('Y');
    date_default_timezone_set('Europe/Moscow'); //смена часового пояса для определния точной даты
    $day = date("z");

    echo (daysInY($year) - $day) . ' days before ' . ($year + 1);
}

daysBeforeNY();
