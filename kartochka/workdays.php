
<?php

function getTotalDaysInCurrentMonth() {
    $month = date('m');
    $year = date('Y');
    return cal_days_in_month(CAL_GREGORIAN, $month, $year);
}