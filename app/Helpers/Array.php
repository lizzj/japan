<?php
/**
 * 处理数组,删除空的值
 */
if (!function_exists('ArrayDetail')) {
    function ArrayDetail($array)
    {
        foreach ($array as $key => $value) {
            if (empty($value) && $value != '0') {
                unset($array[$key]);
            }
        }
        return $array;
    }
}
/**
 * 数组转对象
 */
if (!function_exists('ArrayObject')) {
    function ArrayObject($array)
    {
        $array = json_decode(json_encode($array), true);
        $keys_arr = array_keys($array);
        $values_arr = array_values($array);
        $arrays = [];
        for ($i = 0, $iMax = count($array); $i < $iMax; $i++) {
            $arrays[$i]['key'] = $keys_arr[$i];
            $arrays[$i]['name'] = $values_arr[$i];
        }
        return $arrays;
    }
}
/**
 * 处理异常时使用
 */
if (!function_exists('ArrayTransitionObject')) {
    function arrayTransitionObject($array)
    {
        if (is_array($array)) {
            $obj = new class {
            };
            foreach ($array as $key => $val) {
                $obj->$key = $val;
            }
        } else {
            $obj = $array;
        }
        return $obj;
    }
}
/**
 * 处理会议单选想返回时
 */
if (!function_exists('ArrayReturn')) {
    function arrayReturn($array)
    {
        if (count($array) === 0) {
            return null;
        } else {
            return $array[0];
        }
    }
}
//判断区间
if (!function_exists('ArrayBetween')) {
    function ArrayBetween($min, $max, $value)
    {
        if ($value >= $min && $value < $max) {
            return true;
        }
        return false;
    }
}
