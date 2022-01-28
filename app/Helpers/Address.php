<?php
/**
 * 计算坐标
 */
if (!function_exists('squarePoint')) {
    function squarePoint($lon, $lat, $distance = 1, $radius = 6371)
    {
        //lon 经度
        //lat 纬度
        $dlng = 2 * asin(sin($distance / (2 * $radius)) / cos(deg2rad($lat)));
        $dlng = rad2deg($dlng);

        $dlat = $distance / $radius;
        $dlat = rad2deg($dlat);

        return [
            'left_top' => [
                'lat' => $lat + $dlat,
                'lon' => $lon - $dlng
            ],
            'right_top' => [
                'lat' => $lat + $dlat,
                'lon' => $lon + $dlng
            ],
            'left_bottom' => [
                'lat' => $lat - $dlat,
                'lon' => $lon - $dlng
            ],
            'right_bottom' => [
                'lat' => $lat - $dlat,
                'lon' => $lon + $dlng
            ]
        ];
    }
}

if (!function_exists('getDistance')) {
    function getDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371000;
        $lat1 = ($lat1 * pi()) / 180;
        $lng1 = ($lng1 * pi()) / 180;

        $lat2 = ($lat2 * pi()) / 180;
        $lng2 = ($lng2 * pi()) / 180;

        $calcLongitude = $lng2 - $lng1;
        $calcLatitude = $lat2 - $lat1;
        $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
        $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
        $calculatedDistance = $earthRadius * $stepTwo;
        return round($calculatedDistance);
    }
}
/**
 * 地址显示
 */
if (!function_exists('placeDetail')) {
    function placeDetail($data)
    {
        $detail=explode('#',$data);
        if ($detail[0] === $detail[1]) {
            return substr($detail[0], 0, -3) . '~' . substr($detail[2], 0, -3);
        }
        return substr($detail[0], 0, -3) . '~' . substr($detail[1], 0, -3);
    }
}
