<?php
/**
 * 获取unix时间戳
 */
if (!function_exists('getUnixTimestamp')) {
    function getUnixTimestamp()
    {
        list($s1, $s2) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }
}
/**
 * 获取上个月
 */
if (!function_exists('lastMonth')) {
    function lastMonth()
    {
        $year = date('Y', time());
        $month = (int)date('m', time());
        if ($month == 1) {
            $new_year = $year - 1;
            $new_month = 12;
        } else {
            $new_year = $year;
            $new_month = $month;
        }
        return $new_year . '-' . $new_month;
    }
}

/**
 * 获取月的第一天和最后一天
 */
if (!function_exists('monthFirstAndLast')) {
    function monthFirstAndLast($y = "", $m = "")
    {
        if ($y == "") $y = date("Y");
        if ($m == "") $m = date("m");
        $m = sprintf("%02d", intval($m));
        $y = str_pad(intval($y), 4, "0", STR_PAD_RIGHT);
        $m > 12 || $m < 1 ? $m = 1 : $m = $m;
        $firstday = strtotime($y . $m . "01000000");
        $firstdaystr = date("Y-m-01", $firstday);
        $lastday = strtotime(date('Y-m-d 23:59:59', strtotime("$firstdaystr +1 month -1 day")));
        return [$firstday, $lastday];
    }
}
if (!function_exists('nowYearTime')) {
    function nowYearTime()
    {
        $begin = strtotime(date("Y-1-1"));
        $end = strtotime(date('Y-1-1', strtotime("+1 year"))) - 1;
        return [$begin, $end];
    }
}
/**
 * 获取当天
 */
if (!function_exists('NowDayTime')) {
    function NowDayTime()
    {
        $begin = strtotime(date("Y-m-d"));
        $end = $begin + 24 * 3600 - 1;
        return [$begin, $end];
    }
}
