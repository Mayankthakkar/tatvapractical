<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Carbon\Carbon;


function getAllDates($startingDate, $endingDate, $interval)
{
    $datesArray = [];
    $startingDate = strtotime($startingDate);
    $endingDate = strtotime($endingDate);
    for ($currentDate = $startingDate; $currentDate <= $endingDate; $currentDate += (86400*$interval)) {
        $date = date('Y-m-d', $currentDate);
        $datesArray[] = $date;
    }
    return $datesArray;
}
   